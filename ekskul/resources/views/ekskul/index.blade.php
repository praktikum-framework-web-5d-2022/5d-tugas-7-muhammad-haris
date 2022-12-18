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
                    <h2>Data ekskul</h2>
                    <a href="{{route('ekskul.create')}}" class="btn bg-maroon">Tambah</a>
                </div>
                <p>Dibawah ini merupakan semua data ekskul</p>
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
                                <th align="center" class="align-middle" rowspan="2">NIS</th>
                                <th align="center" class="align-middle" rowspan="2">Ekstrakurikuler</th>
                                <th align="center" class="align-middle" rowspan="2">Jenis Kelamin</th>
                                <th align="center" class="align-middle" rowspan="2">Siswa yang Mengambil</th>
                                <th align="center" class="align-middle" rowspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($ekskuls as $ekskul)
                                <tr>
                                    <td align="center">{{$loop->iteration}}</td>
                                    <td align="center">{{$ekskul->nis}}</td>
                                    <td align="center">{{$ekskul->nama_ekskul}}</td>
                                    <td align="center">{{$ekskul->jenis_kelamin}}</td>
                                    <td align="center">
                                        @forelse ($ekskul->siswas as $item)
                                            <ul>
                                                <li>
                                                    {{$item->kelas}}
                                                </li>
                                            </ul>
                                        @empty
                                            Tidak ada siswa yang mengambil
                                        @endforelse
                                    </td>
                                    <td align="center "class="text-center">
                                        <form action="{{ route('ekskul.destroy',$ekskul->id) }}" method="POST">
                                            <a href="{{ route('ekskuls.take',$ekskul->id) }}" class="btn btn-info">Siswa Aksi</a>
                                            <a href="{{ route('ekskul.edit',$ekskul->id) }}" class="btn btn-warning">Edit</a>
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
