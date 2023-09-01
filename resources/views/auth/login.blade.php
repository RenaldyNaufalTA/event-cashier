@extends('layouts.app')
@section('title', 'Login')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 py-4">
                <div class="card login shadow-lg">
                    <div class="card-body">
                        <div class="d-flex mt-0 mb-3 justify-content-center border-bottom">
                            {{-- <a href="/">
                                <i class="bi bi-arrow-left-circle fs-3 text-dark"></i>
                            </a> --}}
                            <p class="fs-2 mx-auto form-title">Login</p>
                            {{-- <a href="/" class="invisible">
                                <i class="bi bi-arrow-left-circle fs-3 text-light"></i>
                            </a> --}}
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-lg-4 col-form-label text-lg-end">{{ __('Email Address') }}</label>

                                <div class="col-lg-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-lg-4 col-form-label text-lg-end">{{ __('Password') }}</label>

                                <div class="col-lg-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0 d-flex">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mb-0 mt-2 ">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
