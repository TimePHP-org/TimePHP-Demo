<?php

namespace App\Bundle\Twig;

class FunctionTwig {

   public function generateLinkArticle(string $uuid){
      return sprintf("/article/%s", $uuid);
   }

}