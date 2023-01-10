@extends('auth.app')

@section('content')
<h4 class="mb-2">Welcome to Sneat! 🔒</h4>
<p class="mb-4">Please verify your account and start the adventure</p>

@if (session('resent'))
<div class="alert alert-success" role="alert">
    {{ __('A fresh verification link has been sent to your email address.') }}
</div>
@endif

{{ __('Before proceeding, please check your email for a verification link.') }}
{{ __('If you did not receive the email') }},
<form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
    @csrf
    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
</form>
@endsection

@push('style')
<link rel="stylesheet" href="{{ url('/') }}/assets/vendor/css/pages/page-auth.css" />
@endpush