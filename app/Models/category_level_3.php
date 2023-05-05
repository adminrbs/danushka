<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category_level_3 extends Model
{
    use HasFactory;

    protected $table = "category_level_3s";
    protected $primaryKey= "category_level_3_id";

    protected $fillable = [
        'category_level_2_id',
        'category_level_3',
        'status_id',
    ];
}
