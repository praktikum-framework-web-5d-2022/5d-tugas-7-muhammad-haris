<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index(){
        $dokters = Dokter::get();
        return view('dokter.index', compact('dokters'));
    }

    public function create(){
        return view('dokter.create');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'kode_dokter' => 'required',
            'nama_dokter' => 'required',
            'spesialis' => 'required'
        ]);

        Dokter::create($validate);
        return redirect() -> route('dokter.index') -> with('message', "Data Dokter {$validate['nama_dokter']} berhasil ditambahkan");
    }

    public function destroy(Dokter $dokter){
        $dokter->delete();
        return redirect()->route('dokter.index') -> with('message', "Data Dokter {$dokter->nama_dokter} berhasil dihapus");
    }

    public function edit(Dokter $dokter){
        return view('dokter.edit', compact('dokter'));
    }

    public function update(Request $request, Dokter $dokter){
        $validate = $request->validate([
            'kode_dokter' => 'required',
            'nama_dokter' => 'required',
            'spesialis' => 'required'
        ]);

        $dokter -> update($validate);

        return redirect() -> route('dokter.index') -> with('message', "Data Dokter {$dokter->nama_dokter} berhasil diubah");
    }

    public function show(Dokter $dokter)
    {
        return view('dokter.show', compact('dokter'));
    }
}
