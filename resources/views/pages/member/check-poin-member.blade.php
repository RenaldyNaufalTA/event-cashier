@extends('layouts.app')
@section('title', 'Cek Poin')
@section('content')
    <div class="page payment-page">
        <section class="payment-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2>Cek Poin Member</h2>
                </div>
                @if (session()->has('status'))
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="alert alert-danger d-flex mx-5 py-2 my-2">
                                {{ session('status') }}
                                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
                            </div>
                        </div>
                    </div>
                @endif
                <form action="{{ route('checkPoinForm') }}" method="get">

                    @if (request('search') && $member != '')
                        <div class="products">
                            <h3 class="title">Data Member</h3>
                            <div class="row">
                                <div class="col-lg-4 offset-lg-1">

                                    <h1>{{ $member->poin }} Poin</h1>
                                </div>
                                <div class="col-lg-6">
                                    <ul>
                                        <li>ID : {{ $member->id_member }}</li>
                                        <li>Nama : {{ $member->name }}</li>
                                    </ul>
                                </div>

                            </div>

                            <div class="total"></div>
                        </div>
                    @endif

                    <div class="card-details">
                        <h3 class="title">Masukkan Data</h3>
                        <div class="row">

                            <div class="form-group mb-3">
                                <label for="member_id">Cari Member</label>
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person-vcard"></i></span>
                                        <input name="search" id="search" type="text" class="form-control"
                                            placeholder="Masukkan ID atau Nama Member"
                                            value="{{ old('search', request('search')) }}" autofocus>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Cari...</button>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </section>
    </div>

@endsection
