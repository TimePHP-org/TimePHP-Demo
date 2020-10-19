<?php

namespace App\Migration;

use TimePHP\Database\AbstractMigration;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class ArticleMigration extends AbstractMigration {

   /**
    * Create the correspondong table in the database
    *
    * @return void
    */
   public function up(): void {
      if (!Capsule::schema()->hasTable("Article")) {
         Capsule::schema()->create("Article", function (Blueprint $table) {
            $table->uuid("uuid")->unique();

            $table->string('title', 255);
            $table->text('content');
            $table->string('userid', 36);
            
            $table->timestamp("createdAt")->default(Capsule::raw("CURRENT_TIMESTAMP"));
            $table->timestamp("updatedAt")->default(Capsule::raw("CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP"));

            $table->primary("uuid");
         });
   
      }
   }

   /**
    * Drop the corresponding table
    *
    * @return void
    */
   public function down(): void {
      Capsule::schema()->dropIfExists("Article");
   }
}