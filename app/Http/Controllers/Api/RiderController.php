<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RiderLocationRequest;
use App\Models\RiderLocation;
use Exception;
use Illuminate\Support\Facades\Log;

class RiderController extends Controller
{
    public function storeLocation(RiderLocationRequest $request)
    {
        try {

            $captureTime = now();

            $existLocation = RiderLocation::where('rider_id', $request->rider_id)
                ->where('capture_time', '>=', $captureTime->subMinute())
                ->first();

            if ($existLocation) {
                return errorResponse(null, 'Location entry for this rider at the same time already exists');
            }

            $location = RiderLocation::create([
                'rider_id' => $request->rider_id,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'capture_time' => now(),
            ]);

            return successResponse(null, 'Rider Location Successfully Added');
        } catch (Exception $e) {

            Log::error('Error storing rider location: '.$e->getMessage());

            return errorResponse(null, 'Error storing rider location');

        }

    }
}
