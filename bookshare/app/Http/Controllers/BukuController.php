<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bukus = Buku::all();
        return view('bukus.index', compact('bukus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bukus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'deskripsi' => 'required',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $input = $request->all();

    if ($request->hasFile('cover_image')) {
        $image = $request->file('cover_image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->storeAs('public/covers', $imageName);
        $input['cover_image'] = 'covers/'.$imageName;
        
    }

    Buku::create($input);

    return redirect()->route('bukus.index')
                     ->with('success', 'Buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        $komentars = $buku->komentars()->latest()->get();
        return view('bukus.show', compact('buku', 'komentars'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        return view('bukus.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'deskripsi' => 'required',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $input = $request->all();

    if ($request->hasFile('cover_image')) {
        $image = $request->file('cover_image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->storeAs('public/covers', $imageName);
        $input['cover_image'] = 'covers/'.$imageName;
    }

    $buku->update($input);

    return redirect()->route('bukus.index')
                     ->with('success', 'Buku berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        if ($buku->cover_image) {
            Storage::delete('public/' . $buku->cover_image);
        }

        $buku->delete();

        return redirect()->route('bukus.index')
                         ->with('success', 'Buku berhasil dihapus');
    }
}
