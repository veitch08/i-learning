@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::user()->role->slug === 'admin')
                        <p>Selamat Datang kembali {{ Auth::user()->name }}</p>
                    @elseif(Auth::user()->role->slug === 'guru')
                        <p>Selamat Datang {{ Auth::user()->name }} Selamat Mengajar</p>
                    @else
                        <p>Selamat Datang {{ Auth::user()->name }} Selamat Belajar</p>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
