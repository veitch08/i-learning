@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Data Kelas
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Tingkatan</label>
                            <input type="text" class="form-control" name="tingkatan" value="{{ $kelas->tingkatan }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Jurusan</label>
                            <input type="text" class="form-control" name="tingkatan" value="{{ $kelas->jurusan->nama_jurusan }}" readonly>
                        </div>
                        <div class="mb-2">
                            <div class="">
                                <a href="{{ route('kelas.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
