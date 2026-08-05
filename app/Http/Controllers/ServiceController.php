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


    public function show(Service $service)
    {
        $reviews = Review::where('service_id', $service->id)
                         ->latest()
                         ->get();

        $averageRating = round($reviews->avg('rating'), 1);

        return view('service-details', compact(
            'service',
            'reviews',
            'averageRating'
        ));
    }
}