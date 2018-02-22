<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransferArrivalType extends Model
{
    protected $table='transfer_arrival_types';
    protected $fillable = ['name', 'transfer_arrival_id'];

    public function transfer_arrival()
    {
        return $this->belongsTo('App\TransferArrival');
    }
}
