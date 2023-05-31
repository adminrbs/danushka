<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Contracts\Activity;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


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

    protected static $logOnlyDirty = true;
    public function tapActivity(Activity $activity, string $eventName)
    {
        $activity->log_name = "banks";
        $activity->description = $eventName;
        $activity->causer_id = 1;
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*']);
        // Chain fluent methods for configuration options
    }
}
