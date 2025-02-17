<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kompetensi;

class KompetensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $kompetensis = Kompetensi::all();
        return view('admin.kompetensi.index', compact('kompetensis'));
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kompetensi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kompetensi_kelas' => 'required|string|max:255',
        ]);


        Kompetensi::create($validated);

        return redirect()->route('kompetensi')->with('success', 'Kompetensi created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_kompetensi)
    {
        $kompetensi = Kompetensi::findOrFail($id_kompetensi);

        $validated = $request->validate([
            'kompetensi_kelas' => 'required|string|max:255',
        ]);

        $kompetensi->update($validated);

        return redirect()->route('kompetensi')->with('success', 'Kompetensi updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_kompetensi)
    {
        $kompetensi = Kompetensi::findOrFail($id_kompetensi);
        $kompetensi->delete();

        return redirect()->route('kompetensi')->with('success', 'Kompetensi deleted successfully');
    }
}
