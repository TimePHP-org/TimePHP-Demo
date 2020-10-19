<?php

/**
 * @author Robin Bidanchon <robin.bidanchon@gmail.com>
 */

namespace App\Bundle\Controllers;

use Faker\Factory;
use App\Bundle\Entity\User;
use App\Bundle\Entity\Article;
use TimePHP\Security\CsrfToken;
use App\Bundle\Services\UserService;
use TimePHP\Security\PasswordService;
use App\Bundle\Repository\UserRepository;
use TimePHP\Foundation\AbstractController;
use App\Bundle\Repository\ArticleRepository;

/**
 * @category Controller
 * @package TimePHP
 * @subpackage Bundle\Controller
 */
class UserController extends AbstractController
{
    public function homePage()
    {
        $articles = ArticleRepository::getLastThreeArticles();
        return $this->render('homePage.twig', [
            'articles' => $articles,
        ]);
    }

    public function articlesPage(int $page)
    {
        if ($page < 1) {
            $this->redirectRouteName('articles', [
                'page' => 1,
            ]);
        }
        $articles = ArticleRepository::getListArticle($page);
        if ($page > $articles['totalPages']) {
            $this->redirectRouteName('articles', [
                'page' => $articles['totalPages'],
            ]);
        }
        return $this->render('articlesPage.twig', [
            'currentPage' => $page,
            'totalPages' => $articles['totalPages'],
            'articles' => $articles['articles'],
        ]);
    }

    public function articlePage(string $uuid)
    {
        $article = ArticleRepository::getArticle($uuid);
        $suggestions = ArticleRepository::getArticleSuggestions($uuid);

        return $this->render('articlePage.twig', [
            'article' => $article,
            'suggestions' => $suggestions,
        ]);
    }

    public function loginPage()
    {
        return $this->render('loginPage.twig');
    }

    public function logoutPage()
    {
        $this->closeSession();
        return $this->redirectRouteName('home');
    }

    public function loginPageForm()
    {
        $user = UserRepository::getUserFromUsername($this->request->post('username'));
        if ($user === null) {
            return $this->redirectRouteName('login', [], [
                'error' => 'credentials',
            ]);
        } else {
            if (PasswordService::compare($this->request->post('password'), $user->password)) {
                $this->createSession([
                    'user' => $user,
                    'role' => $user->role,
                ]);
                return $this->redirectRouteName('home');
            } else {
                return $this->redirectRouteName('login', [], [
                    'error' => 'credentials',
                ]);
            }
        }
    }

    public function newArticle()
    {
        if (empty($this->getSession())) {
            return $this->redirectRouteName('home');
        } else {
            return $this->render('newArticle.twig');
        }
    }

    public function newArticleForm()
    {
        if (CsrfToken::compare($_SESSION['csrf_token'], $this->request->post('csrf_token'))) {
            $article = new Article();
            $article->title = $this->request->post('title');
            $article->content = $this->request->post('content');
            $article->userid = $_SESSION['user']->uuid;
            $article->save();
            return $this->redirectRouteName('articles', [
                'page' => 1,
            ]);
        } else {
            return $this->redirectRouteName('home');
        }
    }

    public function deleteArticle()
    {
        ArticleRepository::deleteArticle($this->request->post('uuid'));
        return $this->redirectRouteName('home');
    }

    public function seederDatabase()
    {
        $uuid = [];

        $user = new User();
        $user->username = 'admin';
        $user->password = UserService::password('admin');
        $user->role = 'admin';
        $user->save();

        $user = new User();
        $user->username = 'user1';
        $user->password = UserService::password('user1');
        $user->save();

        $uuid[] = $user->uuid;

        $user = new User();
        $user->username = 'user2';
        $user->password = UserService::password('user2');
        $user->save();

        $uuid[] = $user->uuid;

        $faker = Factory::create();
        for ($i = 0; $i < 50; $i++) {
            $article = new Article();
            $article->title = $faker->sentence(
                $nbWords = 6,
                $variableNbWords = true
            );
            $article->content = $faker->text($maxNbChars = 5000);
            $article->userid = $uuid[random_int(0, 1)];
            $article->save();
        }

        return $this->render('homePage.twig');
    }
}
