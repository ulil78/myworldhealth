<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
<<<<<<< HEAD
    protected $table='city';
=======
    protected $table='cities';
>>>>>>> 335ec19faa67341f8332e47d9289ac838f7d8e8f
    protected $fillable = ['name', 'country_id'];

    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}
