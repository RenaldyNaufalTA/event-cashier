@extends('layouts.main')
@section('title', 'Transaksi Proses')
@push('breadcrumb')
    <li class="breadcrumb-item active">Transaksi Proses</li>
@endpush
@section('content')
    <div class="row col-lg-12">
        @if (session()->has('success'))
            <div class="alert alert-success d-flex">
                {{ session('success') }}
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
            </div>
        @endif
        <div class="card">
            <div class="card-header d-flex">
                <h6 class="me-auto my-auto">List Transaksi Proses</h6>
            </div>
            <div class="card-body mt-3">
                <div class="table-responsive">
                    <table class="table display nowrap" cellspacing="0" width="100%" id="myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Event</th>
                                <th>Bayar</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ ($transactions->currentpage() - 1) * $transactions->perpage() + $loop->index + 1 }}
                                    </td>
                                    <td>{{ $transaction->member->name }}</td>
                                    <td>{{ $transaction->event->title }}</td>
                                    <td>Rp. {{ number_format($transaction->pay) }}</td>
                                    <td>{{ $transaction->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <form action="{{ route('transaction.update', $transaction->unique_number) }}"
                                            method="post">
                                            @csrf
                                            @method('put')
                                            <button type="submit" class="btn btn-sm btn-warning"
                                                onclick="return confirm('Verifikasi transaksi ?')">Proses</button>
                                        </form>
                                    </td>
                                    {{-- <td>
                                        <form action="" method="post" class="d-inline-flex">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Yakin ingin menghapus data ?')" type="submit"
                                                class="btn btn-danger px-2 btn-sm rounded text-decoration-none">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $("select#select2").select2({
                dropdownParent: $('#staticBackdrop .modal-content'),
            });

            $('#myTable').DataTable({
                "columnDefs": [{
                    "orderable": false,
                    "targets": 5
                }, ],
            });
        });

        function setPay() {
            const event = document.getElementById("event").value;

            const split = event.split("|", 2)[1];
            document.getElementById("pay").min = parseInt(split);
            document.getElementById("pay").value = parseInt(split);
        }
    </script>
@endpush
