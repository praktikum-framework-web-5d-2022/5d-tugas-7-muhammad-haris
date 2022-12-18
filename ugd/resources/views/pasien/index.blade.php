@extends('master')
@section('title','Rumah Sakit Unsika')
@section('menu1','active')

@section('content')
    <style>
        .bg-maroon {
            background-color: deepskyblue;
            color: black;
        }
        .text-maroon {
            color: maroon;
            font-weight: bold
        }
    </style>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <h2>Data Pasien</h2>
                    <a href="{{route('pasien.create')}}" class="btn bg-maroon">Tambah</a>
                </div>
                <p>Dibawah ini merupakan semua data Pasien</p>
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
                                <th align="center" class="align-middle" rowspan="2">NIK</th>
                                <th align="center" class="align-middle" rowspan="2">Nama Pasien</th>
                                <th align="center" class="align-middle" rowspan="2">Jenis Kelamin</th>
                                <th align="center" class="align-middle" rowspan="2">Perawatan</th>
                                <th align="center" class="align-middle" rowspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pasiens as $pasien)
                                <tr>
                                    <td align="center">{{$loop->iteration}}</td>
                                    <td align="center">{{$pasien->nik}}</td>
                                    <td align="center">{{$pasien->nama_pasien}}</td>
                                    <td align="center">{{$pasien->jenis_kelamin}}</td>
                                    <td align="center">
                                        @forelse ($pasien->dokters as $item)
                                            <ul>
                                                <li>
                                                    {{$item->spesialis}}
                                                </li>
                                            </ul>
                                        @empty
                                            Tidak ada perawatan
                                        @endforelse
                                    </td>
                                    <td align="center "class="text-center">
                                        <form action="{{ route('pasien.destroy',$pasien->id) }}" method="POST">
                                            <a href="{{ route('pasiens.take',$pasien->id) }}" class="btn btn-info">Perawatan</a>
                                            <a href="{{ route('pasien.edit',$pasien->id) }}" class="btn btn-warning">Edit</a>
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
