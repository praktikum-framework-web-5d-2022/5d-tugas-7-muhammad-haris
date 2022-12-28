@extends('master')
@section('title','Rumah Sakit Unsika')
@section('menu','active')

@section('content')
<div class="container pt-4 bg-white">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <h3 class="fw-bold">Ambil Dari Data Siswa</h3>
                <div class="card-body">
                    <form action="{{route('ekskuls.takeStore',['ekskul' => $ekskul->id])}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="siswa_id" class="form-label">Pilih Siswa</label>
                            <div class="form-group">
                                @foreach ($siswas as $item)
                                <div class="form-check
                                form-check-inline">
                                    <input type="checkbox" name="siswa_id[]" id="{{$item->id}}" class="form-check-input" value="{{$item->id}}">
                                    <label for="{{$item->id}}" class="form-check-label">{{$item->nama_siswa}} - {{$item->kelas}}</label>
                                </div>
                                @endforeach
                            </div>
                            <p></p>
                            <button type="submit" class="btn btn-info">Ambil Jadwal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
