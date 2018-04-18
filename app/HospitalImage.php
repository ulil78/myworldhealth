<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalImage extends Model
{
    protected $table='hospital_images';
    protected $fillable = ['hospital_id', 'path', 'filename', 'description', 'status'];

    public function hospital()
    {
        return $this->belongsTo('App\Hospital');
    }
}
