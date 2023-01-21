@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3 shadow-sm">
                <div class="row g-0">
                    <div class="col-md-5 p-3">
                        <img src="{{ asset('img/guru/' . $guru->foto) }}" class="rounded img-responsive" style="width: 215px; height:215px;" alt="">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title">Data Guru</h5>
                            <table>
                                <tr>
                                    <td>Nama</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $guru->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $guru->nik }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $guru->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <td>Guru Kelas</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $guru->kelas->tingkatan }}</td>
                                </tr><tr>
                                    <td>Guru Jurusan</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $guru->kelas->jurusan->nama_jurusan }}</td>
                                </tr>
                            </table>
                            <div class="mt-3">
                                <a href="{{ route('guru.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

