<?php

/**
 * @author Robin Bidanchon <robin.bidanchon@gmail.com>
 */

namespace App\Bundle\Controllers;

use TimePHP\Rest\AbstractRestController;
use App\Bundle\Repository\ArticleRepository;

/**
 * @category Controller
 * @package TimePHP
 * @subpackage Bundle\Controller
 */
class ApiController extends AbstractRestController
{
    public function mainFunction()
    {
        $articles = ArticleRepository::getLastThreeArticles();
        return $this->renderJson($articles);
    }
}
