@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3 shadow-sm">
                <div class="row g-0">
                    <div class="col-md-5 p-3">
                        <img src="{{ asset('img/siswa/' . $siswa->foto) }}" class="rounded img-responsive" style="width: 215px; height:215px;" alt="">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title">Data Siswa</h5>
                            <table>
                                <tr>
                                    <td>Nama</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $siswa->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>NIS</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $siswa->nis }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $siswa->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <td>Siswa Kelas</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $siswa->kelas->tingkatan }}</td>
                                </tr><tr>
                                    <td>Siswa Jurusan</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{ $siswa->kelas->jurusan->nama_jurusan }}</td>
                                </tr>
                            </table>
                            <div class="mt-3">
                                <a href="{{ route('siswa.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

