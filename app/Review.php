<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table='reviews';
    protected $fillable = ['name', 'hospital_id', 'user_id'];

    public function hospital()
    {
        return $this->belongsTo('App\Hospital', 'hospital_id');
    }

    public function users()
    {
        return $this->hasMany('App\User', 'user_id');
    }
}
