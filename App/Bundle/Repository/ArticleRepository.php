<?php

namespace App\Bundle\Repository;

use App\Bundle\Entity\Article;
use Illuminate\Database\Capsule\Manager;
class ArticleRepository {

   public static function getLastThreeArticles() {
      return Article::orderByDesc('createdAt')->limit(3)->get(); 
   }

   public static function getArticle(string $uuid) {
      return Article::find($uuid); 
   }

   public static function getArticleSuggestions(string $uuid) {
      return Article::where('uuid', '<>', $uuid)->orderByDesc('createdAt')->limit(3)->get();
   }

   public static function getListArticle(int $page) {
      return Article::orderbyDesc('createdAt')->paginate(15);
   }


}