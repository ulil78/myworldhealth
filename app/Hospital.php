<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    public function departments()
    {
      return $this->hasMany('App\HospitalDepartment');
    }

    public function images()
    {
      return $this->hasMany('App\HospitalImage');
    }

    public function merchant()
    {
        return $this->belongsTo('App\Merchant');
    }
}
