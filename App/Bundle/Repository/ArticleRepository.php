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
      $limit = 15;
      $offset = ($page - 1) * $limit;
      $totalPage = (int) ceil(count(Article::all()->toArray()) / $limit);
      return [
         "articles" => Article::orderbyDesc('createdAt')->offset($offset)->limit($limit)->get(),
         "totalPages" => $totalPage
      ];
   }

   public static function deleteArticle(string $uuid) {
      $article = Article::find($uuid);
      $article->delete();
   }

}