<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Services\RiderService;
use Illuminate\Http\Request;

class SearchRiderController extends Controller
{
    public function getRiderByLocation(Request $request)
    {
        $restaurant = Restaurant::find($request->restaurant_id);

        if (! $restaurant) {

            return errorResponse(null, 'Restaurant not found', 404);
        }

        $nearestRider = RiderService::getRestaurant($restaurant);

        if (! $nearestRider) {

            return errorResponse(null, 'No riders nearby', 404);
        }

        return successResponse([
            'rider' => [
                'name' => $nearestRider->rider->name,
                'mobile_no' => $nearestRider->rider->mobile_no,
            ],
            'distance' => $nearestRider->distance,
        ]);

    }
}
