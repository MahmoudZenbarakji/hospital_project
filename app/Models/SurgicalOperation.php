<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surgery extends Model
{
    use HasFactory;

    protected $fillable = ['operation_name', 'doctor_id', 'scheduled_time'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
