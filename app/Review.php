<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table='reviews';
    protected $fillable = ['name', 'hospital_id'];

    public function hospital()
    {
        return $this->belongsTo('App\Hospital');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
