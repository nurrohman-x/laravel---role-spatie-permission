@extends('auth.app')

@section('content')
<h4 class="mb-2">Confirm Password! 👋</h4>
<p class="mb-4">Please confirm your password before continuing.</p>
<form id="formAuthentication" class="mb-3" action="{{ route('password.confirm') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password" required autocomplete="current-password" autofocus />
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="mb-3">
        <div class="d-flex justify-content-end">
            <a href="{{ route('password.request') }}">
                <small>Forgot Password?</small>
            </a>
        </div>

        <button class="btn btn-primary d-grid w-100" type="submit">Confirm Password</button>
    </div>
</form>
@endsection

@push('style')
<link rel="stylesheet" href="{{ url('/') }}/assets/vendor/css/pages/page-auth.css" />
@endpush