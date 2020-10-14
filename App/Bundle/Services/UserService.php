<?php

namespace App\Bundle\Services;

class UserService {

   public static function password(string $password): string {
      return password_hash($password, PASSWORD_BCRYPT);
   }

}

