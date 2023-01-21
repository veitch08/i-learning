@extends('layouts.admin')
@section('content')
{{-- {{ dd($detail_tugas) }} --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="mb-4">
                        <tr>
                            <td>Nama Materi</td>
                            <td>&nbsp;:&nbsp;</td>
                            <td>{{ $materi[0]->judul }}</td>
                        </tr>
                        <tr>
                            <td>Nama Tugas</td>
                            <td>&nbsp;:&nbsp;</td>
                            <td>{{ $tugas->nama_tugas }}</td>
                        </tr>
                    </table>
                    <table>
                        @foreach ($tugas1 as $data)
                            <tr>
                                <td>Soal {{ $data["soal_nomor"] }}</td>
                            </tr>
                            <tr>
                                <td>{!! $data["soal"] !!}</td>
                            </tr>
                            <tr>
                                <td>A. {{ $data["jawaban"][0] }}</td>
                            </tr>
                            <tr>
                                <td>B. {{ $data["jawaban"][1] }}</td>
                            </tr>
                            <tr>
                                <td>C. {{ $data["jawaban"][2] }}</td>
                            </tr>
                            <tr>
                                <td>D. {{ $data["jawaban"][3] }}</td>
                            </tr>
                            {{-- <tr>
                                <td><b>Jawaban Benar : {{ $data[] }}</b></td>
                            </tr> --}}
                        @endforeach
                    </table>
                    <div class="mt-3 text-end">
                        <a href="{{ route('tugas.index') }}" class="btn btn-primary btn-sm">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
