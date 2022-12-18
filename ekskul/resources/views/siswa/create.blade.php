@extends('master')
@section('title','SMA WAKANDA')
@section('menu','active')

@section('content')
    <style>
        .bg-maroon {
            background-color: deepskyblue;
            color: black;
        }
        .bt-maroon{
            background-color: deepskyblue;
            color: white;
        }
    </style>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12">
                <h2>Tambah Data siswa</h2>
                <p>Silahkan masukkan data dengan benar dan lengkap!</p>
                @if (session()->has('message'))
                    <div class="my-3">
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    </div>
                @endif
                <form action="{{route('siswa.store')}}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="nisn" class="form-label">NISN</label>
                        <input type="text" name="nisn" id="nisn" placeholder="Masukkan NISN siswa" class="form-control" value="{{old('nisn')}}">
                        @error('nisn')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="nama_siswa" class="form-label">Nama siswa</label>
                        <input type="text" name="nama_siswa" id="nama_siswa" placeholder="Masukkan Nama siswa" class="form-control" value="{{old('nama_siswa')}}">
                        @error('nama_siswa')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="kelas" class="form-label">Kelas</label>
                        <select name="kelas" id="kelas" class="form-control">
                            <option selected disabled>Pilih kelas</option>
                            <option value="kelas 10" {{old('kelas') == "kelas 10" ? "selected" : ""}}>10</option>
                            <option value="kelas 11" {{old('kelas') == "kelas 11" ? "selected" : ""}}>11</option>
                            <option value="kelas 12" {{old('kelas') == "kelas 12" ? "selected" : ""}}>12</option>
                        </select>
                        @error('kelas')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn bt-maroon">Tambah</button>
                    <p></p>
                </form>
            </div>
        </div>
    </div>
@endsection
