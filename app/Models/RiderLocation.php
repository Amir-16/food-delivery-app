<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiderLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'rider_id',
        'latitude',
        'longitude',
        'capture_time',
    ];

    public function rider()
    {
        return $this->belongsTo(Rider::class);
    }
}
