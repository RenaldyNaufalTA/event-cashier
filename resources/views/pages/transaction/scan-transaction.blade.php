@extends('layouts.main')
@section('title', 'Scan ID')
@push('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('transaction.checkin') }}">Check-in</a>
    </li>
    <li class="breadcrumb-item active">Scan ID</li>
@endpush
@section('content')
    <div class="row col-lg-12">
        @if (session()->has('success'))
            <div class="alert alert-success d-flex">
                {{ session('success') }}
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if (session()->has('status'))
            <div class="alert alert-danger d-flex">
                {{ session('status') }}
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-header d-flex">
                <h6 class="me-auto my-auto">Scan ID Member</h6>
            </div>
            <div class="card-body mt-3 d-flex justify-content-center">
                <div class="col-lg-6 mt-4">
                    <div id="reader"></div>
                    <form action="" method="post" id="barcode">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id_member" id="result">
                    </form>
                </div>


            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
        // Scan Barcode
        function onScanSuccess(decodedText, decodedResult) {
            // handle the scanned code as you like, for example:
            // console.log(`Code matched = ${decodedText}`, decodedResult);
            const id_member = decodedText.split(" ", 2)[0];
            var rslt = $("#result").val(id_member);

            $('form#barcode').attr('action', '/transaction/checkin/scan/id');

            $('form#barcode').submit();
            html5QrcodeScanner.clear();
        }

        function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            // for example:
            console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 250
                },
                aspectRatio: 1.0,
                experimentalFeatures: {
                    useBarCodeDetectorIfSupported: true
                }
            },
            /* verbose= */
            false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
@endpush
