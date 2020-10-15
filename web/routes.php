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
      "url" => "/logout",
      "name" => "logout",
      "controller" => UserController::class,
      "function" => "logoutPage"
   ],
   [
      "method" => "post",
      "url" => "/login",
      "name" => "loginForm",
      "controller" => UserController::class,
      "function" => "loginPageForm"
   ],
   [
      "method" => "get",
      "url" => "/article/new",
      "name" => "newArticle",
      "controller" => UserController::class,
      "function" => "newArticle"
   ],
   [
      "method" => "post",
      "url" => "/article/new",
      "name" => "newArticleForm",
      "controller" => UserController::class,
      "function" => "newArticleForm"
   ],
   [
      "method" => "post",
      "url" => "/delete",
      "name" => "deleteArticle",
      "controller" => UserController::class,
      "function" => "deleteArticle"
   ],
   [
      "method" => "get",
      "url" => "/seeder",
      "name" => "seeder",
      "controller" => UserController::class,
      "function" => "seederDatabase"
   ]
];