@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="card shadow-sm">
            <img src="{{ asset('img/cover/' . $materi->cover) }}" class="img p-3" style="width: 100%; max-height: 300px; object-fit: cover; object-position: center;" alt="">
            <div class="card-body">
                <h1 class="text-center mb-4">{{ $materi->judul }}</h1>
                <p>{!! $materi->deskripsi !!}</p>
            </div>
            {{-- <div class="row mx-2 mb-4">
                <div class="col-md-6">
                    <a href="{{ url('siswa/tugas-kelas') }}" class="btn btn-primary btn-sm">Tugas</a>
                </div>
            </div> --}}
            <div class="text-end p-4">
                <a href="{{ route('materi-kelas.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </div>
    </div>
@endsection

