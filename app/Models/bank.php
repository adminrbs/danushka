<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bank extends Model
{
    use HasFactory;
    protected $table = "banks";
    protected $primaryKey = "bank_id";
    protected $fillable = [
        'bank_code',
        'bank_name',
        'is_active',
       
    ];
}
