@extends('layouts.app')
@section('title', 'Pembayaran')
@section('content')
    <div class="page payment-page">
        <section class="payment-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2>Detail Pembayaran</h2>
                </div>
                <form>
                    <div class="products">
                        <h3 class="title">Data Member</h3>

                        <div class="item pb-4">
                            <div class="form-group mb-3">
                                <label for="member_id">ID member</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person-vcard"></i></span>
                                    <input name="member_id" id="member_id" type="text" class="form-control"
                                        value="{{ $transaksi->member->id_member }}" readonly>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="name">Nama</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    <input name="name" id="name" type="text" class="form-control"
                                        value="{{ $transaksi->member->name }}" readonly>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="event">Event yang diikuti</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-calendar4-event"></i></span>
                                    <input name="event" id="event" type="text" class="form-control"
                                        value="{{ $transaksi->event->title }}" readonly>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="harga">Jenis Pembayaran</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-wallet"></i></span>
                                    <input name="harga" id="harga" type="text" class="form-control"
                                        value="{{ $transaksi->pay_method }}" readonly>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="harga">Harga yg harus dibayar</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input name="harga" id="harga" type="text" class="form-control"
                                        value="{{ number_format($transaksi->pay) }}" readonly>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="d-flex">

                                    <label for="start_date" class="col-form-label col">Jam</label>
                                    <label for="end_date" class="col-form-label col ms-2">Tanggal</label>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                    <input name="jam" id="jam" type="text" class="form-control"
                                        value="{{ $transaksi->created_at->translatedFormat('H:i') }}" readonly>
                                    <span class="input-group-text ms-2"><i class="bi bi-clock"></i></span>
                                    <input name="tanggal" id="tanggal" type="text" class="form-control"
                                        value="{{ $transaksi->created_at->translatedFormat('d/m/Y') }}" readonly>
                                </div>
                            </div>
                            @if ($transaksi->status == 0)
                                <div class="form-groupmb-3">
                                    <label for="status">Status Pembayaran</label>
                                    <input name="status" id="status" type="text"
                                        class="form-control border border-warning" value="Belum terverifikasi" readonly>

                                </div>
                            @else
                                <div class="form-group mb-3">
                                    <label for="status">Status Pembayaran</label>
                                    <input name="status" id="status" type="text"
                                        class="form-control border border-success" value="Terverifikasi" readonly>
                                </div>
                            @endif

                            {{-- <p class="item-description">Lorem ipsum dolor sit amet</p> --}}
                        </div>

                    </div>

                    @if ($transaksi->pay_method != 'Tunai')
                        <div class="card-details">
                            <h3 class="title">Kartu Rekening</h3>
                            <div class="row">

                                <div class="form-group mb-3">
                                    <label for="no-rek">No. Rekening</label>
                                    <div class="input-group">

                                        <span class="input-group-text"><i class="bi bi-credit-card"></i></span>
                                        <input name="no-rek" id="no-rek" type="text" class="form-control"
                                            value="220983818283" readonly>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="pembayaran" class="text-center">Kirim Bukti Pembayaran</label>
                                    <div class="row gx-4 gx-lg-5 justify-content-center mb-3 mt-4">
                                        <div class="col-md-10 col-lg-8 col-xl-7">
                                            <ul class="list-inline text-center">
                                                <li class="list-inline-item">
                                                    <a href="#!">
                                                        <span class="fa-stack fa-lg">
                                                            <i class="fas fa-circle fa-stack-2x"
                                                                style="color: rgb(0, 233, 0)"></i>
                                                            <i class="fab fa-whatsapp fa-stack-1x fa-inverse"></i>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#!">
                                                        <span class="fa-stack fa-lg">
                                                            <i class="fas fa-circle fa-stack-2x"></i>
                                                            <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#!">
                                                        <span class="fa-stack fa-lg">
                                                            <i class="fas fa-circle fa-stack-2x"
                                                                style="color:#517fa4"></i>
                                                            <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </form>
            </div>
        </section>
    </div>

@endsection
{{-- @section('background', asset('storage/event-images/' . $event->image)) --}}
