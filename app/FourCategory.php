<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FourCategory extends Model
{
      protected $table='four_categories';
      protected $fillable = ['name', 'thrid_category_id'];

      public function thrid_category()
      {
          return $this->belongsTo('App\ThridCategory');
      }
}
