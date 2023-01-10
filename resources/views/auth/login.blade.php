@extends('auth.app')

@section('content')
<h4 class="mb-2">Welcome to Sneat! 👋</h4>
<p class="mb-4">Please sign-in to your account and start the adventure</p>
@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email or Username</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email or username" value="{{ old('email') }}" required autocomplete="email" autofocus />
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="mb-3 form-password-toggle">
        <div class="d-flex justify-content-between">
            <label class="form-label" for="password">Password</label>
            <a href="{{ route('password.request') }}">
                <small>Forgot Password?</small>
            </a>
        </div>
        <div class="input-group input-group-merge">
            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
            <label class="form-check-label" for="remember"> Remember Me </label>
        </div>
    </div>
    <div class="mb-3">
        <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
    </div>
</form>
<p class="text-center">
    <span>New on our platform?</span>
    <a href="{{ route('register') }}">
        <span>Create an account</span>
    </a>
</p>

@endsection

@push('style')
<link rel="stylesheet" href="{{ url('/') }}/assets/vendor/css/pages/page-auth.css" />
@endpush