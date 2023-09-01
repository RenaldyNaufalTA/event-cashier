@extends('layouts.main')
@section('title', 'Dashboard')
@push('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endpush

@section('content')
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <!-- User Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Member</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $members }}</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End User Card -->
                    {{-- Event Card --}}
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card customers-card">

                            <div class="card-body">
                                <h5 class="card-title">Event</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-calendar-event"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $events }}</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Event Card -->
                    {{-- Pending Card --}}
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card">

                            <div class="card-body">
                                <h5 class="card-title">Transaksi Proses</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                        style="background: rgba(255, 255, 0, 0.295)">
                                        <i class="bi bi-cart-dash text-warning"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $transactionPending }}</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Pending Card -->
                    {{-- Done Card --}}
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card">

                            <div class="card-body">
                                <h5 class="card-title">Transaksi Selesai</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                        style="background: rgba(7, 206, 0, 0.295)">
                                        <i class="bi bi-cart-check text-success "></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $transactionDone }}</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Done Card -->
                </div>
            </div>
        </div>
    </section>
@endsection
