<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier_item_code extends Model
{
    use HasFactory;
    protected $table = "supplier_item_codes";
    protected $primaryKey = "supplier_item_code_id";
    protected $fillable = [
        'supplier_id',
        'item_id',
        'supplier_item_code',
       
    ];

}
