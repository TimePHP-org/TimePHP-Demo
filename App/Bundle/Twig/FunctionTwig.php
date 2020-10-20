<?php

namespace App\Bundle\Twig;

use App\Bundle\Entity\Article;

class FunctionTwig {

   public function generateLinkArticle(Article $article){
      return sprintf("/article/%s", $article->uuid);
   }
   
}