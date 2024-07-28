<?php

namespace App\Services;

use App\Models\RiderLocation;
use Illuminate\Support\Facades\DB;

class RiderService
{
    public static function getRestaurant($restaurant)
    {
        $latitude = $restaurant->latitude;

        $longitude = $restaurant->longitude;

        $currentTime = now();

        $nearestRider = RiderLocation::with('rider:id,name,mobile_no')->
            select('rider_id', DB::raw("
                ( 6371 * acos( cos( radians($latitude) ) *
                cos( radians( latitude ) ) *
                cos( radians( longitude ) - radians($longitude) ) +
                sin( radians($latitude) ) *
                sin( radians( latitude ) ) ) ) AS distance"))
                ->where('capture_time', '>=', $currentTime->subMinutes(5))
                ->orderBy('distance')
                ->first();

        return $nearestRider;
    }
}
