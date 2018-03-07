<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
class FourthCategoryControllerCategory extends Model
=======
class FourthCategory extends Model
>>>>>>> 335ec19faa67341f8332e47d9289ac838f7d8e8f
{
      protected $table='fourth_categories';
      protected $fillable = ['name', 'thrid_category_id'];

      public function thrid_category()
      {
          return $this->belongsTo('App\ThridCategory');
      }
}
