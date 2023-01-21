@extends('layouts.admin')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('sweetalert::alert')
            <div class="card border-secondary">
                <div class="card-header">
                    Data Kelas
                    <a href="{{ route('kelas.create') }}" class="btn btn-sm btn-primary" style="float: right">
                        <i class="bi bi-plus-circle"></i>&nbsp;&nbsp;Tambah Data
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Tingkatan</th>
                                    <th>Nama Jurusan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kelas as $index => $data)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>{{ $data->tingkatan }}</td>
                                        <td>{{ $data->jurusan->nama_jurusan }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('kelas.edit', $data->id) }}" class="btn btn-sm btn-outline-success">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="{{ route('kelas.show', $data->id) }}" class="btn btn-sm btn-outline-info">
                                                <i class="bi bi-info-circle"></i>
                                            </a>
                                            <form action="{{ route('kelas.destroy', $data->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data Kelas {{ $data->tingkatan }} {{ $data->jurusan->nama_jurusan }}?')">
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
