@extends('master')
@section('title','Rumah Sakit Unsika')
@section('menu1','active')

@section('content')
    <style>
        .bg-maroon {
            background-color: deepskyblue;
            color: black;
        }
        .bt-maroon{
            background-color: deepskyblue;
            color: black;
        }
    </style>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12">
                <h2>Tambah Data Pasien</h2>
                <p>Silahkan masukkan data dengan benar dan lengkap!</p>
                @if (session()->has('message'))
                    <div class="my-3">
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    </div>
                @endif
                <form action="{{route('pasien.store')}}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" name="nik" id="nik" placeholder="Masukkan NIK" class="form-control" value="{{old('nik')}}">
                        @error('nik')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="nama_pasien" class="form-label">Nama Pasien</label>
                        <input type="text" name="nama_pasien" id="nama_pasien" placeholder="Masukkan Nama Pasien" class="form-control" value="{{old('nama_pasien')}}">
                        @error('nama_pasien')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option selected disabled>Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" {{old('jenis_kelamin') == "Laki-laki" ? "selected" : ""}}>Laki-laki</option>
                            <option value="Perempuan" {{old('jenis_kelamin') == "Perempuan" ? "selected" : ""}}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
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
