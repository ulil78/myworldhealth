<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalProgram extends Model
{
    protected $table='hospital_programs';
    protected $fillable = ['name', 'hospital_department_id'];

    public function department()
    {
        return $this->belongsTo('App\HospitalDepartment');
    }

    public function transfer_arrivals()
    {
      return $this->hasMany('App\TransferArrival');
    }

    public function transfer_returns()
    {
      return $this->hasMany('App\TransferReturn');
    }
}
