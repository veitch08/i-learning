@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="card shadow-sm">
            <img src="{{ asset('img/cover/' . $materi->cover) }}" class="img p-3" style="width: 100%; max-height: 300px; object-fit: cover; object-position: center;" alt="">
            <div class="card-body">
                <h1 class="text-center mb-4">{{ $materi->judul }}</h1>
                <p>{!! $materi->deskripsi !!}</p>
            </div>
            <div class="px-4 mb-3 text-end">
                <a href="{{ route('materi.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </div>
    </div>
@endsection

