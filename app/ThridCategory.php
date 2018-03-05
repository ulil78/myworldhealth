<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThridCategory extends Model
{
    protected $table='thrid_categories';
    protected $fillable = ['name', 'second_category_id'];

    public function second_category()
    {
        return $this->belongsTo('App\SecondCategory');
    }

    public function four_categories()
    {
      return $this->hasMany('App\FourthCategory');
    }
}
