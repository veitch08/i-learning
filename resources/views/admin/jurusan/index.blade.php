@extends('layouts.admin')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('sweetalert::alert')
            <div class="card">
                <div class="card-header">
                    Data Jurusan
                    <a href="{{ route('jurusan.create') }}" class="btn btn-sm btn-primary" style="float: right">
                        <i class="bi bi-plus-circle"></i>&nbsp;&nbsp;Tambah Data
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Jurusan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jurusan as $index => $data)
                                         <td class="text-center">{{ $index + 1 }}</td>
                                   <tr>
                                         <td class="text-center">
                                        <td class="text-center">
                                            <a href="{{ route('jurusan.edit', $data->id) }}" class="btn btn-sm btn-outline-success">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="{{ route('jurusan.show', $data->id) }}" class="btn btn-sm btn-outline-info">
                                                <i class="bi bi-info-circle"></i>
                                            </a>
                                            <form action="{{ route('jurusan.destroy', $data->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data Jurusan {{ $data->nama_jurusan }}?')">
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
