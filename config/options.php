<?php

use App\Bundle\Twig\FilterTwig;
use App\Bundle\Twig\FunctionTwig;

return [
   "types" => [
      [
         "id" => "uuid",
         "regex" => "[a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12}",
      ]
   ],
   "twig" => [
      [
         "name" => "generateLinkArticle",
         "type" => "function",
         "class" => FunctionTwig::class,
         "function" => "generateLinkArticle",
      ]
   ],
];