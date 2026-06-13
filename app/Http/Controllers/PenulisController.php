<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenulisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penulis = Penulis::all();
        return view('penulis.index', compact('penulis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penulis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:penulis,email',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('penulis', 'public');
        }

        Penulis::create($data);

        return redirect()->route('penulis.index')
            ->with('success', 'Penulis berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penulis $penulis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penulis $penulis)
    {
        return view('penulis.edit', compact('penulis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penulis $penulis)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:penulis,email,'.$penulis->id,
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            if ($penulis->foto) {
                Storage::disk('public')->delete($penulis->foto);
            }
            $data['foto'] = $request->file('foto')->store('penulis', 'public');
        }

        $penulis->update($data);

        return redirect()->route('penulis.index')
            ->with('success', 'Penulis berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penulis $penulis)
    {
        if ($penulis->foto) {
            Storage::disk('public')->delete($penulis->foto);
        }
        
        $penulis->delete();

        return redirect()->route('penulis.index')
            ->with('success', 'Penulis berhasil dihapus!');
    }
}
