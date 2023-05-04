<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category_level_1 extends Model
{
    use HasFactory;
    protected $primaryKey = "category_level_1_id ";
    protected $fillable = [
        'category_level_1',
        'status_id',
    ];
}
