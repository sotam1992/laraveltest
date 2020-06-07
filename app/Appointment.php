<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;
use Auth;
use App\Appointment;

class Appointment extends Model
{
    use SoftDeletes;

    public $table = 'appointments';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'doctor_id',
        'slug',
        'appointment_date',
        'appointment_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
