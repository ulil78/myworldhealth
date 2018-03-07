<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FourthCategoryControllerCategory extends Model
{
      protected $table='fourth_categories';
      protected $fillable = ['name', 'thrid_category_id'];

      public function thrid_category()
      {
          return $this->belongsTo('App\ThridCategory');
      }
}
