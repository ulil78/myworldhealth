<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalImage extends Model
{
    protected $table='hospital_images';
    protected $fillable = ['name', 'hospital_id'];

    public function hospital()
    {
        return $this->belongsTo('App\Hospital');
    }
}
