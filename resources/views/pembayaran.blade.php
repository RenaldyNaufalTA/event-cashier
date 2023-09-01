@extends('layouts.app')
@section('title', 'Pembayaran')
@section('content')
    <div class="page payment-page">
        <section class="payment-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2>Pembayaran</h2>
                </div>
                <form action="{{ route('pembayaran.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="event" value="{{ $event->slug }}">
                    <div class="products">
                        <h3 class="title">Event</h3>

                        <div class="item">
                            <img class="img-fluid img-preview d-block mb-3 mx-auto" width="200" height="200"
                                src="{{ asset('storage/event-images/' . $event->image) }}" alt="event">
                            <span class="price">Rp. {{ number_format($event->price) }}</span>
                            <p class="item-name">{{ $event->title }}</p>
                            {{-- <p class="item-description">Lorem ipsum dolor sit amet</p> --}}
                        </div>
                        <div class="total"></div>
                    </div>

                    @if (session()->has('status'))
                        <div class="alert alert-danger d-flex mx-5 py-2 my-2">
                            {{ session('status') }}
                            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    <div class="card-details">
                        <h3 class="title">Masukkan Data</h3>
                        <div class="row">

                            <div class="form-group mb-3">
                                <label for="member_id">ID member</label>
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person-vcard"></i></span>
                                        <input name="member_id" id="member_id" type="text" class="form-control"
                                            placeholder="ID member" value="{{ old('member_id') }}">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="pay_method">Jenis Pembayaran</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-wallet"></i></span>
                                        <select class="form-select" name="pay_method" id="pay_method" required>
                                            <option selected disabled value="" required>Pilih Jenis Pembayaran
                                            </option>
                                            <option value="Tunai"
                                                @if (old('pembayaran') == 'Tunai') {{ 'selected' }} @endif>
                                                Tunai</option>
                                            <option value="Non-tunai"
                                                @if (old('pembayaran') == 'Non Tunai') {{ 'selected' }} @endif>
                                                Non Tunai</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Proses</button>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </section>
    </div>

@endsection
