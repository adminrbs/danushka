<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee_Status extends Model
{
    use HasFactory;

    protected $primaryKey = "employee_status_id";
    protected $table = "employee_statuses";

    protected $fillable = [
        'employee_status',
        'locked',
        'status_id',
    ];
}
