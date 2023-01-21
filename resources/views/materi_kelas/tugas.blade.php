@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @foreach ($tugas1 as $data)
                        <p class="mt-4">Soal {{ $data["soal_nomor"] }}</p>
                        <p>{!! $data["soal"] !!}</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="{{ $data["soal_nomor"] }}" id="jawaban_a" value="{{ $data["jawaban"][0] }}">
                            <label class="form-check-label" for="jawaban_a">
                                {{ $data["jawaban"][0] }}
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="{{ $data["soal_nomor"] }}" id="exampleRadios2" value="{{ $data["jawaban"][1] }}">
                            <label class="form-check-label" for="exampleRadios2">
                                {{ $data["jawaban"][1] }}
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="{{ $data["soal_nomor"] }}" id="exampleRadios2" value="{{ $data["jawaban"][2] }}">
                            <label class="form-check-label" for="exampleRadios2">
                                {{ $data["jawaban"][2] }}
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="{{ $data["soal_nomor"] }}" id="exampleRadios2" value="{{ $data["jawaban"][3] }}">
                            <label class="form-check-label" for="exampleRadios2">
                                {{ $data["jawaban"][3] }}
                            </label>
                        </div>
                    @endforeach
                    <div class="mt-4 text-end">
                        <button type="submit" class="btn btn-primary btn-sm">Kirim</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
