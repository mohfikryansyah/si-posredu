<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Gallery.index', [
            'galleries' => Gallery::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Ambil data title
        $title = $request->input('title');
    
        // Upload multiple images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('images', 'public');
                
                // Simpan setiap gambar ke dalam database
                Gallery::create([
                    'title' => $title,
                    'path' => $imagePath // Hanya simpan path gambar
                ]);
            }
        }
    
        return redirect()->route('gallery.index')->with('success', 'Images uploaded successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        //
    }
}
