<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(){
        $siswas = Siswa::get();
        return view('siswa.index', compact('siswas'));
    }

    public function create(){
        return view('siswa.create');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'nisn' => 'required',
            'nama_siswa' => 'required',
            'kelas' => 'required'
        ]);

        Siswa::create($validate);
        return redirect() -> route('siswa.index') -> with('message', "Data siswa {$validate['nama_siswa']} berhasil ditambahkan");
    }

    public function destroy(Siswa $siswa){
        $siswa->delete();
        return redirect()->route('siswa.index') -> with('message', "Data siswa {$siswa->nama_siswa} berhasil dihapus");
    }

    public function edit(Siswa $siswa){
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa){
        $validate = $request->validate([
            'nisn' => 'required',
            'nama_siswa' => 'required',
            'kelas' => 'required'
        ]);

        $siswa -> update($validate);

        return redirect() -> route('siswa.index') -> with('message', "Data siswa {$siswa->nama_siswa} berhasil diubah");
    }

    public function show(Siswa $siswa)
    {
        return view('siswa.show', compact('siswa'));
    }
}
