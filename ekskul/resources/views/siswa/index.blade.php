@extends('master')
@section('title','SMA WAKANDA')
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
                    <h2>Data siswa</h2>
                    <a href="{{route('siswa.create')}}" class="btn bg-maroon">Tambah</a>
                </div>
                <p>Dibawah ini merupakan semua data siswa</p>
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
                                <th align="center" class="align-middle" rowspan="2">NISN</th>
                                <th align="center" class="align-middle" rowspan="2">Nama Siswa</th>
                                <th align="center" class="align-middle" rowspan="2">Kelas</th>
                                <th align="center" class="align-middle" rowspan="2">Ekstrakurikuler</th>
                                <th align="center" class="align-middle" rowspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($siswas as $siswa)
                                <tr>
                                    <td align="center">{{$loop->iteration}}</td>
                                    <td align="center">{{$siswa->nisn}}</td>
                                    <td align="center">{{$siswa->nama_siswa}}</td>
                                    <td align="center">{{$siswa->kelas}}</td>
                                    <td align="center">
                                        @forelse ($siswa->ekskuls as $item)
                                            <ul>
                                                <li>
                                                    {{$item->nama_ekskul}}
                                                </li>
                                            </ul>
                                        @empty
                                            Tidak ada ekskul
                                        @endforelse
                                    </td>
                                    <td align="center "class="text-center">
                                        <form action="{{ route('siswa.destroy',$siswa->id) }}" method="POST">
                                            <a href="{{ route('siswa.edit',$siswa->id) }}" class="btn btn-warning">Edit</a>
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
