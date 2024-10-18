<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public function operations()
    {
        return $this->hasMany(SurgicalOperation::class);
    }
}


