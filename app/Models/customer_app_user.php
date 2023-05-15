<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer_app_user extends Model
{
    use HasFactory;

    protected $table = "customer_app_users";
    protected $primaryKey= "customer_app_user_id";

    protected $fillable = [
        'customer_id',
        'email',
        'mobile',
        'password',
        'status_id',
    ];



   
}
