@extends('layouts.main')
@section('title', 'Member')
@push('breadcrumb')
    <li class="breadcrumb-item active">Member</li>
@endpush

@section('content')
    <div class="row col-lg-12">
        @if (session()->has('status'))
            <div class="alert alert-success d-flex">
                {{ session('status') }}
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if (session()->has('success'))
            <div class="alert alert-success d-flex">
                {{ session('success') }}
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger d-flex">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
            </div>
        @endif
        <div class="card">
            <div class="card-header d-flex">
                <h6 class="me-auto my-auto">List Member</h6>
                <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="ms-auto btn btn-sm btn-primary"
                    style="border-radius: 50%"><i class="bi bi-plus"></i>
                </a>
                @include('pages.member.create-member')
            </div>
            <div class="card-body mt-3">

                <div class="table-responsive">

                    <table class="table display nowrap" cellspacing="0" width="100%" id="myTable">
                        <thead>
                            <tr>

                                <th>ID Member</th>
                                <th>Nama</th>
                                <th>Poin</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $member)
                                <tr>
                                    <td>{{ $member->id_member }}</td>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->poin }}</td>
                                    <td>
                                        <a href="{{ route('member.edit', $member->id_member) }}"
                                            class="btn btn-success px-2 btn-sm rounded text-decoration-none">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        {{-- <form action="{{ route('member.destroy', $member->id) }}" method="post"
                                            class="d-inline-flex">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Yakin ingin menghapus data ?')" type="submit"
                                                class="btn btn-danger px-2 btn-sm rounded text-decoration-none">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form> --}}
                                    </td>
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
            $('#myTable').DataTable({
                "columnDefs": [{
                    "orderable": false,
                    "targets": 3
                }, ],
            });
        });
    </script>
@endpush
