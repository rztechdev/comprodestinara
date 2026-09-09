<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index(Request $request)
    {
        $query = Destination::active();

        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        if ($request->filled('q')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->q . '%')
                  ->orWhere('location', 'like', '%' . $request->q . '%')
                  ->orWhere('badge', 'like', '%' . $request->q . '%');
            });
        }

        $destinations = $query->get();
        $totalActive = Destination::where('is_active', true)->count();

        return view('destinasi.index', compact('destinations', 'totalActive'));
    }

    public function show(string $slug)
    {
        $destination = Destination::where('slug', $slug)->firstOrFail();
        $related = Destination::active()->where('id', '!=', $destination->id)->take(3)->get();
        return view('destinasi.show', compact('destination', 'related'));
    }
}