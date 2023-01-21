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
                        <form action="{{ route('jurusan.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama Jurusan</label>
                                <select class = "form-control @error('nama_jurusan') is-invalid @enderror" name= "nama_jurusan" id="">@error('nama_jurusan')
                                         <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="RPL">Rekayasa Perankat Lunak</option>
                                <option value="TKRO">Teknik Kendaran Ringan Otomotif</option>
                                <option value="TBSM">Teknik Bisnis Sepeda Motor</option>
                                </select>
                               
                                <!-- <input type="text" class="form-control  @error('nama_jurusan') is-invalid @enderror" name="nama_jurusan">
                                @error('nama_jurusan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-primary btn-sm" type="submit">Tambah</button>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="{{ route('jurusan.index') }}" class="btn btn-danger btn-sm">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
