<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee_designation extends Model
{
    use HasFactory;
    protected $primaryKey = "employee_designation_id";
    protected $table = "employee_designations";

    protected $fillable = [
        'employee_designation',
        'locked',
        'status_id',
    ];
}
