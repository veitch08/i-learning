@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Data Jurusan
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Jurusan</label>
                            <input type="text" class="form-control" name="nama_jurusan" value="{{ $jurusan->nama_jurusan }}" readonly>
                        </div>
                        <div class="mb-3">
                            <div class="">
                                <a href="{{ route('jurusan.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
