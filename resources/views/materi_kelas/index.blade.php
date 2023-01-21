@extends('layouts.admin')
@section('content')
<div class="row">
    @foreach ($materi as $data)
        <div class="col-md-4">
            <div class="card mb-4" style="width: 19rem;">
                <img src="{{ asset('img/cover/' . $data->cover) }}" class="img p-2" style="width: 100%; max-height: 300px; object-fit: cover; object-position: center; border-radius: 15px;" alt="">
                <div class="card-body">
                <p class="card-text"><a href="{{ route('materi-kelas.show', $data->id) }}" class="link-dark">{{ $data->judul }}</a></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
