<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category_level_3 extends Model
{
    use HasFactory;

    protected $table = "item_category_level_3s";
    protected $primaryKey= "Item_category_level_3_id";

    protected $fillable = [
        'Item_category_level_2_id',
        'category_level_3',
        'status_id',
    ];
}
