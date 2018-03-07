<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecondCategory extends Model
{
      protected $table='second_categories';
      protected $fillable = ['name', 'first_category_id'];


      public function first_category()
      {
          return $this->belongsTo('App\FirstCategory');
      }


      public function thrid_categories()
      {
        return $this->hasMany('App\ThridCategory');
      }
}
