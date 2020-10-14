<?php

namespace App\Bundle\Twig;

class FilterTwig {

   public function truncate(string $text, int $length){
      return substr($text, 0, $length);
   }

}