<?php

namespace App\Bundle\Twig;

use App\Bundle\Entity\Article;

class FunctionTwig {

   public function generateLinkArticle(Article $article){
      return sprintf("/article/%s", $article->uuid);
   }

   public function getParams(string $param) {
      return isset($_GET[$param]) ? $_GET[$param] : null;
   }

   public function userHasSession() {
      return isset($_SESSION["csrf_token"]);
   }
   public function userIsAdmin() {
      return isset($_SESSION["csrf_token"]) && $_SESSION["role"] === "admin";
   }
   
}