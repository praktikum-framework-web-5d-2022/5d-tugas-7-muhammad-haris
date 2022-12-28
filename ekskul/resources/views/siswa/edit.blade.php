@extends('master')
@section('title','SMA WAKANDA')
@section('menu','active')

@section('content')
    <style>
        .bg-maroon {
            background-color: deepskyblue;
            color: black;
        }
    </style>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Data siswa</h2>
                <p>Masukkan data Kelurahan dengan lengkap</p>
                @if (session()->has('message'))
                    <div class="my-3">
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    </div>
                @endif
                <form action="{{route('siswa.update', ['siswa' => $siswa->id])}}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="mb-4">
                        <label for="nisn" class="form-label">NISN</label>
                        <input type="text" name="nisn" id="nisn" placeholder="Masukkan NISN siswa" class="form-control" value="{{old('nisn') ?? $siswa->nisn}}">
                        @error('nisn')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="nama_siswa" class="form-label">Nama siswa</label>
                        <input type="text" name="nama_siswa" id="nama_siswa" placeholder="Masukkan Nama siswa" class="form-control" value="{{old('nama_siswa') ?? $siswa->nama_siswa}}">
                        @error('nama_siswa')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="kelas" class="form-label">kelas</label>
                        <select name="kelas" id="kelas" class="form-control">
                            <option selected disabled>Pilih kelas</option>
                            <option value="kelas 10" {{old('kelas') ?? $siswa->kelas == "kelas 10" ? "selected" : ""}}>kelas 10</option>
                            <option value="kelas 11" {{old('kelas') ?? $siswa->kelas == "kelas 11" ? "selected" : ""}}>kelas 11</option>
                            <option value="kelas 12" {{old('kelas') ?? $siswa->kelas == "kelas 12" ? "selected" : ""}}>kelas 12</option>
                        </select>
                        @error('kelas')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn bg-maroon">Edit</button>
                    <p></p>
                </form>
            </div>
        </div>
    </div>
@endsection
