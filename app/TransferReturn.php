<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransferReturn extends Model
{
    protected $table='transfer_returns';
    protected $fillable = ['name', 'hospital_program_id'];

    public function hospital_program()
    {
        return $this->belongsTo('App\HospitalProgram');
    }

    public function return_types()
    {
      return $this->hasMany('App\TransferReturnTypes');
    }
}
