@extends('layouts.main')
@section('title', 'Edit Member')
@push('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('member.index') }}">Member</a>
    </li>
    <li class="breadcrumb-item active">Edit Member</li>
@endpush
@section('content')
    <div class="row justify-content-center mb-3">
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
                <h6 class="me-auto my-auto">Edit Member</h6>
                @include('pages.member.create-member')
            </div>
            <div class="card-body">
                <form action="{{ route('member.update', $member->id_member) }}" method="post" id="member_form">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="id_member" class="col-form-label">ID Member</label>
                        <input type="text" class="form-control" name="id_member" id="id_member"
                            value="{{ old('id_member', $member->id_member) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="col-form-label">Nama</label>
                        <input type="text" class="form-control" name="name" id="name" maxlength="255"
                            value="{{ old('name', $member->name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="poin" class="col-form-label">Poin</label>
                        <input type="number" class="form-control" name="poin" id="poin" min=0
                            value="{{ old('poin', $member->poin) }}" required>
                    </div>

            </div>

            <div class="card-footer text-end">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
            </form>
        </div>
    </div>
@endsection
