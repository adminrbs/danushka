<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    use HasFactory;
    protected $table = "towns";
    protected $primaryKey = "town_id";

    protected $fillable = [
        'district_id',
        'town_name',
        'status_id',
    ];
}