<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::orderBy('order')->latest()->paginate(15);
        return view('admin.destinations.index', compact('destinations'));
    }

    public function create()
    {
        return view('admin.destinations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|in:budaya,ekologi,pangan,bahari',
            'badge' => 'nullable|string|max:100',
            'location' => 'required|string|max:255',
            'lead' => 'nullable|string|max:1000',
            'description' => 'nullable|string',
            'research_focus' => 'nullable|string',
            'module_name' => 'nullable|string|max:255',
            'capacity' => 'nullable|string|max:100',
            'image' => 'nullable|image|max:3072',
            'order' => 'nullable|integer',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['name']) . '-' . rand(100, 999);
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active'] = $request->boolean('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('destinations', 'public');
            $validated['image_path'] = $path;
        }

        Destination::create($validated);

        return redirect()->route('admin.destinations.index')->with('success', 'Destinasi berhasil ditambahkan!');
    }

    public function edit(Destination $destination)
    {
        return view('admin.destinations.edit', compact('destination'));
    }

    public function update(Request $request, Destination $destination)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|in:budaya,ekologi,pangan,bahari',
            'badge' => 'nullable|string|max:100',
            'location' => 'required|string|max:255',
            'lead' => 'nullable|string|max:1000',
            'description' => 'nullable|string',
            'research_focus' => 'nullable|string',
            'module_name' => 'nullable|string|max:255',
            'capacity' => 'nullable|string|max:100',
            'image' => 'nullable|image|max:3072',
            'order' => 'nullable|integer',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active'] = $request->boolean('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('destinations', 'public');
            $validated['image_path'] = $path;
        }

        $destination->update($validated);

        return redirect()->route('admin.destinations.index')->with('success', 'Destinasi berhasil diperbarui!');
    }

    public function destroy(Destination $destination)
    {
        $destination->delete();
        return redirect()->route('admin.destinations.index')->with('success', 'Destinasi berhasil dihapus!');
    }
}