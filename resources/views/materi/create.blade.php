@extends('layouts.admin')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Materi
                </div>
                <div class="card-body">
                    <form action="{{ route('materi.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Cover</label>
                            <input type="file" class="form-control  @error('cover') is-invalid @enderror" name="cover">
                            @error('cover')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" class="form-control  @error('judul') is-invalid @enderror" name="judul" placeholder="Masukan Judul">
                            @error('judul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <input id="deskripsi" type="hidden" name="deskripsi" class="form-control  @error('judul') is-invalid @enderror">
                            <trix-editor input="deskripsi"></trix-editor>
                            @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-primary btn-sm" type="submit">Tambah</button>
                            </div>
                            <div class="col-6 text-end">
                                <a href="{{ route('materi.index') }}" class="btn btn-danger btn-sm">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
