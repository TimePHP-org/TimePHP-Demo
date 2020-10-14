<?php

use App\Bundle\Controllers\UserController;

return [
   [
      "method" => "get",
      "url" => "/",
      "name" => "home",
      "controller" => UserController::class,
      "function" => "home"
   ]
];