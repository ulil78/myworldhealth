<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransferReturnType extends Model
{
    protected $table='transfer_return_types';
    protected $fillable = ['name', 'transfer_return_id'];

    public function transfer_return()
    {
        return $this->belongsTo('App\TransferReturn');
    }
}
