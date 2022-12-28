@extends('master')
@section('title','Rumah Sakit Unsika')
@section('menu1','active')

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
                <h2>Edit Data Ekskul</h2>
                <p>Masukkan data Kelurahan dengan lengkap</p>
                @if (session()->has('message'))
                    <div class="my-3">
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    </div>
                @endif
                <form action="{{route('ekskul.update', ['ekskul' => $ekskul->id])}}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="mb-4">
                        <label for="nis" class="form-label">NIS</label>
                        <input type="text" name="nis" id="nis" placeholder="Masukkan NIS" class="form-control" value="{{old('nis') ?? $ekskul->nis}}">
                        @error('nis')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="nama_ekskul" class="form-label">Nama ekskul</label>
                        <input type="text" name="nama_ekskul" id="nama_ekskul" placeholder="Masukkan Nama Ekskul" class="form-control" value="{{old('nama_ekskul') ?? $ekskul->nama_ekskul}}">
                        @error('nama_ekskul')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option selected disabled>Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" {{old('jenis_kelamin') ?? $ekskul->jenis_kelamin == "Laki-laki" ? "selected" : ""}}>Laki-laki</option>
                            <option value="Perempuan" {{old('jenis_kelamin') ?? $ekskul->jenis_kelamin == "Perempuan" ? "selected" : ""}}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
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
