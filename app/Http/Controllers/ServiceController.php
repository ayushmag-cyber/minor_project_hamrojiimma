<?php

namespace App\Http\Controllers;

use App\Models\Service;

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

        return view('service-details', compact('service'));
    }

}