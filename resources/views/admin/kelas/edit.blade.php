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
                        <form action="{{ route('kelas.update', $kelas->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">Tingkatan</label>
                                <input type="text" class="form-control  @error('tingkatan') is-invalid @enderror" name="tingkatan" value="{{ $kelas->tingkatan }}">
                                @error('tingkatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Jurusan</label>
                                <select name="id_jurusan" class="form-control @error('id_jurusan') is-invalid @enderror">
                                    @foreach ($jurusan as $data)
                                        <option value="{{ $data->id }}" {{ $kelas->id_jurusan === $data->id ? 'selected' : '' }}>
                                            {{ $data->nama_jurusan }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_jurusan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-primary btn-sm" type="submit">Edit</button>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="{{ route('kelas.index') }}" class="btn btn-danger btn-sm">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
