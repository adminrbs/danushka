<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bank_branch extends Model
{
    use HasFactory;
    protected $table = "bank_branches";
    protected $primaryKey = "bank_branch_id";
    protected $fillable = [
        'bank_id',
        'bank_branch_code',
        'bank_branch_name',
        'is_active',

    ];
}
