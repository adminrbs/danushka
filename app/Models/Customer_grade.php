<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_grade extends Model
{
    use HasFactory;
    protected $table = "customer_grades";
    protected $primaryKey = "customer_grade_id";
}
