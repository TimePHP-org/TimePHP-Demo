<?php

use App\Bundle\Controllers\UserController;

return [
   [
      "method" => "get",
      "url" => "/",
      "name" => "home",
      "controller" => UserController::class,
      "function" => "homePage"
   ],
   [
      "method" => "get",
      "url" => "/articles/[i:page]",
      "name" => "articles",
      "controller" => UserController::class,
      "function" => "articlesPage"
   ],
   [
      "method" => "get",
      "url" => "/article/[uuid:uuid]",
      "name" => "article",
      "controller" => UserController::class,
      "function" => "articlePage"
   ],
   [
      "method" => "get",
      "url" => "/login",
      "name" => "login",
      "controller" => UserController::class,
      "function" => "loginPage"
   ],
   [
      "method" => "get",
      "url" => "/seeder",
      "name" => "seeder",
      "controller" => UserController::class,
      "function" => "seederDatabase"
   ]
];