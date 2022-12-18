<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index(){
        $pasiens = Pasien::get();
        return view('pasien.index', compact('pasiens'));
    }

    public function create(){
        return view('pasien.create');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'nik' => 'required|numeric',
            'nama_pasien' => 'required',
            'jenis_kelamin' => 'required'
        ]);

        Pasien::create($validate);
        return redirect() -> route('pasien.index') -> with('message', "Data Pasien {$validate['nama_pasien']} berhasil ditambahkan");
    }

    public function destroy(Pasien $pasien){
        $pasien->delete();
        return redirect()->route('pasien.index') -> with('message', "Data Pasien {$pasien->nama_pasien} berhasil dihapus");
    }

    public function edit(Pasien $pasien){
        return view('pasien.edit', compact('pasien'));
    }

    public function update(Request $request, Pasien $pasien){
        $validate = $request->validate([
            'nik' => 'required|numeric',
            'nama_pasien' => 'required',
            'jenis_kelamin' => 'required'
        ]);

        $pasien -> update($validate);

        return redirect() -> route('pasien.index') -> with('message', "Data Pasien {$pasien->nama_pasien} berhasil diubah");
    }

    public function show(Pasien $pasien)
    {
        return view('pasien.show', compact('pasien'));
    }

    public function take(Pasien $pasien){
        $dokters = Dokter::get();
        return view('pasien.take', compact('pasien', 'dokters'));
    }

    public function takeStore(Request $request, Pasien $pasien){
        $dokters = Dokter::find($request->dokter_id);
        $pasien -> dokters() -> sync($dokters);

        return redirect() -> route('pasien.index') -> with('message', 'Berhasil menambahkan perawatan');
    }
}
