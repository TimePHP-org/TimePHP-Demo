<?php

/**
 * @author Robin Bidanchon <robin.bidanchon@gmail.com>
 */

namespace App\Bundle\Controllers;

use \Faker\Factory;
use App\Bundle\Entity\User;
use App\Bundle\Entity\Article;
use App\Bundle\Services\UserService;
use TimePHP\Foundation\AbstractController;
use App\Bundle\Repository\ArticleRepository;

/**
 * @category Controller
 * @package TimePHP
 * @subpackage Bundle\Controller
 */
class UserController extends AbstractController
{

    public function homePage(){
        $articles = ArticleRepository::getLastThreeArticles();
        return $this->render('homePage.twig', [
            "articles" => $articles
        ]);
    }

    public function articlesPage(int $page){
        $articles = ArticleRepository::getListArticle($page);
        dd($articles);
        return $this->render('articlesPage.twig', [
            "page" => $page
        ]);
    }

    public function articlePage(string $uuid){

        $article = ArticleRepository::getArticle($uuid);
        $suggestions = ArticleRepository::getArticleSuggestions($uuid);

        return $this->render('articlePage.twig', [
            "article" => $article,
            "suggestions" => $suggestions
        ]);
    }

    public function loginPage(){
        return $this->render('loginPage.twig');
    }

    public function seederDatabase() {

        $uuid = [];

        $user = new User();
        $user->username = "admin";
        $user->password = UserService::password("admin");
        $user->role = "admin";
        $user->save();

        $user = new User();
        $user->username = "user1";
        $user->password = UserService::password("user1");
        $user->save();

        $uuid[] = $user->uuid;

        $user = new User();
        $user->username = "user2";
        $user->password = UserService::password("user2");
        $user->save();

        $uuid[] = $user->uuid;

        $faker = Factory::create();
        for ($i=0; $i < 50; $i++) { 
            $article = new Article();
            $article->title = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $article->content = $faker->text($maxNbChars = 5000) ;
            $article->userid = $uuid[random_int(0, 1)];
            $article->save();
        }

        return $this->render('homePage.twig');
    }
 
}