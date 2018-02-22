<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalDepartment extends Model
{
    protected $table='hospital_departments';
    protected $fillable = ['name', 'hospital_id'];

    public function hospital()
    {
        return $this->belongsTo('App\Hospital');
    }

    public function programs()
    {
      return $this->hasMany('App\HospitalProgram');
    }

}
