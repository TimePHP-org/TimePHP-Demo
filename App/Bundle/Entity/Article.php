<?php

namespace App\Bundle\Entity;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {


   /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = "Article";
   
   /**
    * The primary key associated with the table.
    *
    * @var string
    */
   protected $primaryKey = "uuid";

   /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
   public $incrementing = false;

   /**
    * The "type" of the auto-incrementing ID.
    *
    * @var string
    */
   protected $keyType = "string";

   /**
    * Indicates if the model should be timestamped.
    *
    * @var bool
    */
   public $timestamps = true;

   const CREATED_AT = 'createdAt';
   const UPDATED_AT = 'updatedAt';

   /**
    * Indicates fillable properties
    *
    * @var array
    */
   protected $fillable = ['title', 'content', 'userid'];


   public static function boot(){
      parent::boot();
      static::creating(function ($model) {
         if (! $model->getKey()) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
         }
      });
   }

   public function author() {
      return $this->belongsTo("App\Bundle\Entity\User", "uuid", "userid");
   }
}