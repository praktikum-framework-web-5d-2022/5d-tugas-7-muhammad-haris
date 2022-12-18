@extends('master')
@section('title','Rumah Sakit Unsika')
@section('menu','active')

@section('content')
    <style>
        .bg-maroon {
            background-color: deepskyblue;
            color: black;
        }
        .text-maroon {
            color: deepskyblue;
            font-weight: bold
        }
    </style>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <h2>Data Dokter</h2>
                    <a href="{{route('dokter.create')}}" class="btn bg-maroon">Tambah</a>
                </div>
                <p>Dibawah ini merupakan semua data Dokter</p>
                @if (session()->has('message'))
                    <div class="my-3">
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" align="center">
                        <thead>
                            <tr align="center">
                                <th align="center" class="align-middle" rowspan="2">#</th>
                                <th align="center" class="align-middle" rowspan="2">Kode Dokter</th>
                                <th align="center" class="align-middle" rowspan="2">Nama Dokter</th>
                                <th align="center" class="align-middle" rowspan="2">Spesialis</th>
                                <th align="center" class="align-middle" rowspan="2">Pasien</th>
                                <th align="center" class="align-middle" rowspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dokters as $dokter)
                                <tr>
                                    <td align="center">{{$loop->iteration}}</td>
                                    <td align="center">{{$dokter->kode_dokter}}</td>
                                    <td align="center">{{$dokter->nama_dokter}}</td>
                                    <td align="center">{{$dokter->spesialis}}</td>
                                    <td align="center">
                                        @forelse ($dokter->pasiens as $item)
                                            <ul>
                                                <li>
                                                    {{$item->nama_pasien}}
                                                </li>
                                            </ul>
                                        @empty
                                            Tidak ada pasien
                                        @endforelse
                                    </td>
                                    <td align="center "class="text-center">
                                        <form action="{{ route('dokter.destroy',$dokter->id) }}" method="POST">
                                            <a href="{{ route('dokter.edit',$dokter->id) }}" class="btn btn-warning">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="11">Tidak ada data...</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
