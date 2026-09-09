<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Destination;
use App\Models\Story;
use App\Models\Program;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalDestinations' => Destination::count(),
            'totalStories' => Story::count(),
            'totalPrograms' => Program::count(),
            'totalTestimonials' => Testimonial::count(),
            'totalMessages' => ContactMessage::count(),
            'unreadMessages' => ContactMessage::where('is_read', false)->count(),
            'recentMessages' => ContactMessage::latest()->take(5)->get(),
            'recentDestinations' => Destination::latest()->take(4)->get(),
        ]);
    }
}