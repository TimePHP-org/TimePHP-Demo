<?php

namespace App\Bundle\Repository;

use App\Bundle\Entity\Article;
use Illuminate\Database\Capsule\Manager;

class ArticleRepository {

   public static function getLastThreeArticles() {
      return Article::orderByDesc('createdAt')->limit(3)->get(); 
   }


}