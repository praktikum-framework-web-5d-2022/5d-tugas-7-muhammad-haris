@extends('master')
@section('title','Rumah Sakit Unsika')
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
                <h2>Edit Data Dokter</h2>
                <p>Masukkan data Kelurahan dengan lengkap</p>
                @if (session()->has('message'))
                    <div class="my-3">
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    </div>
                @endif
                <form action="{{route('dokter.update', ['dokter' => $dokter->id])}}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="mb-4">
                        <label for="kode_dokter" class="form-label">Kode Dokter</label>
                        <input type="text" name="kode_dokter" id="kode_dokter" placeholder="Masukkan Kode Dokter" class="form-control" value="{{old('kode_dokter') ?? $dokter->kode_dokter}}">
                        @error('kode_dokter')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="nama_dokter" class="form-label">Nama Dokter</label>
                        <input type="text" name="nama_dokter" id="nama_dokter" placeholder="Masukkan Nama Dokter" class="form-control" value="{{old('nama_dokter') ?? $dokter->nama_dokter}}">
                        @error('nama_dokter')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="spesialis" class="form-label">Spesialis</label>
                        <select name="spesialis" id="spesialis" class="form-control">
                            <option selected disabled>Pilih Spesialis</option>
                            <option value="Spesialis Penyakit Dalam" {{old('spesialis') ?? $dokter->spesialis == "Spesialis Penyakit Dalam" ? "selected" : ""}}>Spesialis Penyakit Dalam</option>
                            <option value="Spesialis Anak" {{old('spesialis') ?? $dokter->spesialis == "Spesialis Anak" ? "selected" : ""}}>Spesialis Anak</option>
                            <option value="Spesialis Saraf" {{old('spesialis') ?? $dokter->spesialis == "Spesialis Saraf" ? "selected" : ""}}>Spesialis Saraf</option>
                            <option value="Spesialis Kandungan" {{old('spesialis') ?? $dokter->spesialis == "Spesialis Kandungan" ? "selected" : ""}}>Spesialis Kandungan</option>
                            <option value="Spesialis Bedah" {{old('spesialis') ?? $dokter->spesialis == "Spesialis Bedah" ? "selected" : ""}}>Spesialis Bedah</option>
                        </select>
                        @error('spesialis')
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
