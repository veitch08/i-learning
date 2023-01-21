@extends('layouts.admin')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Tugas
                </div>
                <div class="card-body">
                    <form action="{{ route('tugas.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Materi</label>
                            <select name="id_materi" class="form-control @error('id_materi') is-invalid @enderror">
                                <option selected disabled>Pilih Salah Satu</option>
                                @foreach ($materi as $data)
                                    <option value="{{ $data->id }}">{{ $data->judul }}</option>
                                @endforeach
                            </select>
                            @error('id_materi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Tugas</label>
                            <input type="text" class="form-control  @error('nama_tugas') is-invalid @enderror" name="nama_tugas">
                            @error('nama_tugas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Soal</label>
                            <input id="soal" type="hidden" name="soal[]" class="form-control  @error('soal') is-invalid @enderror">
                            <trix-editor input="soal"></trix-editor>
                            @error('soal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jawaban A</label>
                            <input type="text" class="form-control  @error('jawaban_a') is-invalid @enderror" name="jawaban_a[]">
                            @error('jawaban_a')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jawaban B</label>
                            <input type="text" class="form-control  @error('jawaban_b') is-invalid @enderror" name="jawaban_b[]">
                            @error('jawaban_b')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jawaban C</label>
                            <input type="text" class="form-control  @error('jawaban_c') is-invalid @enderror" name="jawaban_c[]">
                            @error('jawaban_c')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jawaban D</label>
                            <input type="text" class="form-control  @error('jawaban_d') is-invalid @enderror" name="jawaban_d[]">
                            @error('jawaban_d')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jawaban Benar</label>
                            <select name="jawaban_benar[]" class="form-control @error('jawaban_benar') is-invalid @enderror">
                                <option selected disabled>Pilih Jawaban Benar</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                            @error('jawaban_benar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="btns d-flex justify-content-between mt-3">
                            <div>
                                <button class="btn btn-primary btn-sm tambahSoal" type="button">Tambah Soal</button>
                            </div>

                            <div class="d-flex justify-content-end">
                                <div class="me-3">
                                    <button class="btn btn-primary btn-sm" type="submit">Tambah</button>
                                </div>
                                <div class="text-end">
                                    <a href="{{ route('jurusan.index') }}" class="btn btn-danger btn-sm">Batal</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        let index = 2;
        $('.tambahSoal').on('click', function() {
            const soalComponent = document.createElement('div');
            soalComponent.classList.add('mt-4', 'border-bottom');
            soalComponent.innerHTML = `<div class="mb-3">
                                        <label class="form-label">Soal ${index}</label>
                                        <input id="index" type="hidden" name="soal[]" class="form-control">
                                        <trix-editor input="index"></trix-editor>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jawaban A</label>
                                        <input type="text" class="form-control" name="jawaban_a[]">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jawaban B</label>
                                        <input type="text" class="form-control" name="jawaban_b[]">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jawaban C</label>
                                        <input type="text" class="form-control" name="jawaban_c[]">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jawaban D</label>
                                        <input type="text" class="form-control" name="jawaban_d[]">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jawaban Benar</label>
                                        <select name="jawaban_benar[]" class="form-control">
                                            <option selected disabled>Pilih Jawaban Benar</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <button onclick="this.parentElement.parentElement.remove()" class="btn btn-sm btn-danger">Hapus</button>
                                    </div>`;
            $('form .btns').before(soalComponent);
            index += 1;
        });
    </script>
@endsection
