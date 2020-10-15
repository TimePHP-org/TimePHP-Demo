<?php

use App\Bundle\Twig\FilterTwig;
use App\Bundle\Twig\FunctionTwig;
use App\Bundle\Twig\TwigFunction;

return [
   "types" => [
      [
         "id" => "uuid",
         "regex" => "[a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12}",
      ]
   ],
   "twig" => [
      [
         "name" => "truncate",
         "type" => "filter",
         "class" => FilterTwig::class,
         "function" => "truncate",
      ],
      [
         "name" => "formatDate",
         "type" => "filter",
         "class" => FilterTwig::class,
         "function" => "formatDate",
      ],
      [
         "name" => "generateLinkArticle",
         "type" => "function",
         "class" => FunctionTwig::class,
         "function" => "generateLinkArticle",
      ],
      [
         "name" => "getParams",
         "type" => "function",
         "class" => FunctionTwig::class,
         "function" => "getParams",
      ],
      [
         "name" => "userHasSession",
         "type" => "function",
         "class" => FunctionTwig::class,
         "function" => "userHasSession",
      ],
      [
         "name" => "userIsAdmin",
         "type" => "function",
         "class" => FunctionTwig::class,
         "function" => "userIsAdmin",
      ]
   ],
];