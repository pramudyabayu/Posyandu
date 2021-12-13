@extends('auth.layout.app')
@section('title' , 'Login | Posyandu Klaten')
@section('content')

<h1>Login</h1>
<p>Silahkan login menggunakan<br>email dan password</p>
@if (session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="form mt-5">
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" required value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div> 
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="password" required>
        </div>
        <div>
            <center>
                <button class="btn btn-primary" type="submit">
                    <span class="btn-text">Login</span>
                </button>
            </center>
        </div>
        <p class="switch">Belum punya akun? <a class="link" href="{{ route('register') }}">Daftar disini</a> </p>
    </form>
</div>

@endsection
