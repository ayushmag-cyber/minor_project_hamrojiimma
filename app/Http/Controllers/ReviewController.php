<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Models\Service;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['service', 'user'])
                         ->latest()
                         ->get();

        $services = Service::all();

        return view('reviews', compact('reviews', 'services'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'review' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create([
    'user_id'    => Auth::id(),
    'name'       => Auth::user()->name,
    'service_id' => $request->service_id,
    'review'     => $request->review,
    'rating'     => $request->rating,
]);

        return back()->with('success','Review added successfully.');
    }


    public function edit(Review $review)
    {
        if ($review->user_id != Auth::id()) {
            abort(403);
        }

        $services = Service::all();

        return view('edit-review', compact('review','services'));
    }


    public function update(Request $request, Review $review)
    {
        if ($review->user_id != Auth::id()) {
            abort(403);
        }

        $request->validate([
            'service_id' => 'required|exists:services,id',
            'review' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $review->update([
            'service_id' => $request->service_id,
            'review' => $request->review,
            'rating' => $request->rating,
        ]);

        return redirect('/reviews')
               ->with('success','Review updated successfully.');
    }


    public function destroy(Review $review)
    {
        if ($review->user_id != Auth::id()) {
            abort(403);
        }

        $review->delete();

        return back()->with('success','Review deleted successfully.');
    }
}