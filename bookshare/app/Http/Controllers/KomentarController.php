<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required',
            'isi_komentar' => 'required',
        ]);

        Komentar::create([
            'buku_id' => $request->buku_id,
            'user_id' => auth()->id(),
            'isi_komentar' => $request->isi_komentar,
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Komentar $komentar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Komentar $komentar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Komentar $komentar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Komentar $komentar)
    {
        $komentar->delete();

        return back()->with('success', 'Komentar berhasil dihapus');
    }
}
