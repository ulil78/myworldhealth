<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FirstCategory extends Model
{
    public function second_categories()
    {
      return $this->hasMany('App\SecondCategory');
    }
}
