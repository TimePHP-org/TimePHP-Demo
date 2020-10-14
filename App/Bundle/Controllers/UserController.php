<?php

/**
 * @author Robin Bidanchon <robin.bidanchon@gmail.com>
 */

namespace App\Bundle\Controllers;

use App\Bundle\Entity\User;
use TimePHP\Foundation\Router;
use TimePHP\Exception\SessionException;
use App\Bundle\Repository\UserRepository;
use TimePHP\Foundation\AbstractController;

/**
 * @category Controller
 * @package TimePHP
 * @subpackage Bundle\Controller
 */
class UserController extends AbstractController
{

    /**
     * Main controller function
     *
     * @return void
     */
    public function home(){

        return $this->render('home.twig');
    }
 
}