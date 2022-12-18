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
                <h2>Tambah Data ekskul</h2>
                <p>Silahkan masukkan data dengan benar dan lengkap!</p>
                @if (session()->has('message'))
                    <div class="my-3">
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    </div>
                @endif
                <form action="{{route('ekskul.store')}}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="nis" class="form-label">NIS</label>
                        <input type="text" name="nis" id="nis" placeholder="Masukkan NIS" class="form-control" value="{{old('nis')}}">
                        @error('nis')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="nama_ekskul" class="form-label">Nama ekskul</label>
                        <input type="text" name="nama_ekskul" id="nama_ekskul" placeholder="Masukkan Nama ekskul" class="form-control" value="{{old('nama_ekskul')}}">
                        @error('nama_ekskul')
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
