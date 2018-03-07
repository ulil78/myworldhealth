<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransferArrival extends Model
{
    protected $table='transfer_arrivals';
    protected $fillable = ['name', 'hospital_program_id'];

    public function hospital_program()
    {
        return $this->belongsTo('App\HospitalProgram');
    }

    public function arrival_types()
    {
      return $this->hasMany('App\TransferArrivalTypes');
    }
}
