<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Review;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return view('services', compact('services'));
    }


    public function show($id)
{
    $service = Service::findOrFail($id);

    $reviews = Review::where('service_id', $id)
                    ->latest()
                    ->get();

    $averageRating = round($reviews->avg('rating'), 1);

    $reviewCount = $reviews->count();

    return view('service-details', compact(
        'service',
        'reviews',
        'averageRating',
        'reviewCount'
    ));
}
}