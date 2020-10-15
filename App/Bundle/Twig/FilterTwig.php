<?php

namespace App\Bundle\Twig;

use DateTime;

class FilterTwig {

   public function truncate(string $text, int $length){
      return substr($text, 0, $length);
   }


   public function formatDate(DateTime $date, string $format){
      $date = new DateTime($date);
      return $date->format($format);
   }

}