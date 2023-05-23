<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    use HasFactory;
    protected $table = "vehicles";
    protected $primaryKey = "vehicle_id";
    protected $fillable = [
        'vehicle_no',
        'vehicle_name',
        'description',
        'vehicle_type_id',
        'licence_expire_date',
        'insurance_expire_date',
        'remarks',
        'status_id',

    ];
}
