@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Data Guru
                </div>
                <div class="card-body">
                    <form action="{{ route('guru.update', $guru->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $guru->user->name }}">
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NIK</label>
                            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ $guru->nik }}">
                            @error('nik')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <div class="form-check">
                                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror"
                                    type="radio" name="jenis_kelamin" value="Laki-laki"
                                    @if ($guru->jenis_kelamin == 'Laki-laki') checked @endif>
                                <label class="form-check-label">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror"
                                    type="radio" name="jenis_kelamin" value="Perempuan"
                                    @if ($guru->jenis_kelamin == 'Perempuan') checked @endif>
                                <label class="form-check-label">
                                    Perempuan
                                </label>
                            </div>
                            @error('jenis_kelamin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <div class="mb-3">
                                <img src="{{ asset('img/guru/' . $guru->foto) }}" class="rounded img-responsive" style="width: 100px; height:100px;" alt="">
                            </div>
                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror  @error('foto') is-invalid @enderror" name="foto" value="{{ $guru->foto }}">
                            @error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Guru Kelas</label>
                            <select name="id_kelas" class="form-control @error('id_kelas') is-invalid @enderror @error('id_kelas') is-invalid @enderror">
                                @foreach ($kelas as $data)
                                    <option value="{{ $data->id }}" {{ $guru->id_kelas === $data->id ? 'selected' : '' }}>{{ $data->tingkatan }} {{ $data->jurusan->nama_jurusan }}</option>
                                @endforeach
                            </select>
                            @error('id_kelas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ $guru->user->email }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group input-group-merge">
                                <input
                                type="password"
                                id="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password"
                                placeholder="Ubah Password ?"
                                aria-describedby="password"
                                />
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-primary btn-sm" type="submit">Edit</button>
                            </div>
                            <div class="col-6 text-end">
                                <a href="{{ route('guru.index') }}" class="btn btn-danger btn-sm">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
