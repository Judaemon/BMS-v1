<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blotter extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'incident_type',
        'incident_location',
        'incident_date_time',
        'meeting_schedule_date_time',
        'reported_date_time',
        'incident_narrative',
    ];

    protected $casts = [
        'incident_date_time' => 'datetime:Y-m-d H:i',
        'meeting_schedule_date_time' => 'datetime:Y-m-d H:i',
        'reported_date_time' => 'datetime:Y-m-d H:i',
    ];

    // protected $dates = [
    //     'incident_date_time', 
    //     'meeting_schedule_date_time', 
    //     'reported_date_time', 
    // ];

    public function residents()
    {
        return $this->belongsToMany(Resident::class)
            ->withPivot(['role', 'narrative'])
            ->withTimestamps();
    }
}
