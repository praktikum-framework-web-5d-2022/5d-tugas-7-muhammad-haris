<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Ekskul;
use Illuminate\Http\Request;

class EkskulController extends Controller
{
    public function index(){
        $ekskuls = Ekskul::get();
        return view('ekskul.index', compact('ekskuls'));
    }

    public function create(){
        return view('ekskul.create');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'nis' => 'required|numeric',
            'nama_ekskul' => 'required',
            'jenis_kelamin' => 'required'
        ]);

        Ekskul::create($validate);
        return redirect() -> route('ekskul.index') -> with('message', "Data ekskul {$validate['nama_ekskul']} berhasil ditambahkan");
    }

    public function destroy(Ekskul $ekskul){
        $ekskul->delete();
        return redirect()->route('ekskul.index') -> with('message', "Data ekskul {$ekskul->nama_ekskul} berhasil dihapus");
    }

    public function edit(Ekskul $ekskul){
        return view('ekskul.edit', compact('ekskul'));
    }

    public function update(Request $request, Ekskul $ekskul){
        $validate = $request->validate([
            'nis' => 'required|numeric',
            'nama_ekskul' => 'required',
            'jenis_kelamin' => 'required'
        ]);

        $ekskul -> update($validate);

        return redirect() -> route('ekskul.index') -> with('message', "Data ekskul {$ekskul->nama_ekskul} berhasil diubah");
    }

    public function show(Ekskul $ekskul)
    {
        return view('ekskul.show', compact('ekskul'));
    }

    public function take(Ekskul $ekskul){
        $siswas = Siswa::get();
        return view('ekskul.take', compact('ekskul', 'siswas'));
    }

    public function takeStore(Request $request, Ekskul $ekskul){
        $siswas = Siswa::find($request->siswa_id);
        $ekskul -> siswas() -> sync($siswas);

        return redirect() -> route('ekskul.index') -> with('message', 'Berhasil menambahkan ekstrakurikuler');
    }
}
