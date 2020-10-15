<?php

namespace App\Bundle\Repository;

use App\Bundle\Entity\User;
use Illuminate\Database\Capsule\Manager;

class UserRepository {

   public static function getUserFromUsername(string $username) {
      $user = User::where("username", "=", $username)->first();
      return $user;
   }

}