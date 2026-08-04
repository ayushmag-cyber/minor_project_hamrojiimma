<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{

    public function index()
    {
        $reviews = Review::latest()->get();

        return view('reviews', compact('reviews'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name'=>'required',
        'review'=>'required',
        'rating'=>'required',
        'image'=>'nullable|image'
    ]);

    $image = null;

    if($request->hasFile('image')){
        $image = $request->file('image')
                         ->store('reviews','public');
    }
    Review::create([
        'name'=>$request->name,
        'review'=>$request->review,
        'rating'=>$request->rating,
        'image'=>$image
    ]);

    return back()->with('success','Review added successfully');
}
}