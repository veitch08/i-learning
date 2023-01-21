@extends('layouts.admin')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('sweetalert::alert')
            <div class="card">
                <div class="card-header">
                    Data Siswa
                    <a href="{{ route('siswa.create') }}" class="btn btn-sm btn-primary" style="float: right">
                        <i class="bi bi-plus-circle"></i>&nbsp;&nbsp;Tambah Data
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle table-hover table-responsive" id="dataTable">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama</th>
                                    <th>NIS</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Kelas</th>
                                    <th>Jurusan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswa as $index => $data)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>{{ $data->user->name }}</td>
                                        <td>{{ $data->nis }}</td>
                                        <td>{{ $data->jenis_kelamin }}</td>
                                        <td>{{ $data->kelas->tingkatan }}</td>
                                        <td>{{ $data->kelas->jurusan->nama_jurusan }}</td>
                                        <td>
                                            <a href="{{ route('siswa.edit', $data->id) }}" class="btn btn-sm btn-outline-success">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="{{ route('siswa.show', $data->id) }}" class="btn btn-sm btn-outline-info">
                                                <i class="bi bi-info-circle"></i>
                                            </a>
                                            <form action="{{ route('siswa.destroy', $data->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data Siwa {{ $data->user->name }}?')">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
