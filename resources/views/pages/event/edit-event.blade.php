@extends('layouts.main')
@section('title', 'Edit Event')

@push('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('event.index') }}">Event</a>
    </li>
    <li class="breadcrumb-item active">Edit Event</li>
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
                <h6 class="me-auto my-auto">Edit Event</h6>
                @include('pages.event.create-event')
            </div>
            <div class="card-body">
                <form action="{{ route('event.update', $event->slug) }}" method="post" id="event_form"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="title" class="col-form-label">Judul</label>
                        <input type="text" class="form-control" name="title" id="titles" maxlength="255"
                            value="{{ old('title', $event->title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="col-form-label">Slug</label>
                        <input type="text" class="form-control" name="slug" id="slugs" maxlength="255"
                            value="{{ old('slug', $event->slug) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="col-form-label">Harga</label>
                        <input type="number" class="form-control" name="price" id="price" min=0
                            value="{{ old('price', $event->price) }}" required>
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="col me-1">
                            <label for="place" class="col-form-label">Tempat</label>
                            <input type="text" class="form-control" name="place" id="place" maxlength="255"
                                value="{{ old('place', $event->place) }}" required>
                        </div>
                        <div class="col">
                            <label for="address" class="col-form-label">Alamat</label>
                            <input type="text" class="form-control" name="address" id="address" maxlength="255"
                                value="{{ old('address', $event->address) }}" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex">

                            <label for="start_date" class="col-form-label col">Mulai</label>
                            <label for="end_date" class="col-form-label col">Akhir</label>
                        </div>
                        <div class="input-group">
                            <input type="datetime-local" class="form-control me-1" name="start_date" id="start_dt"
                                onchange="getStartDt()" required min="{{ Carbon\Carbon::today() }}"
                                value="{{ old('start_date', $event->start_date) }}">
                            <input type="datetime-local" class="form-control" name="end_date" id="end_dt" required
                                value="{{ old('end_date', $event->end_date) }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Gambar</label>
                        <input type="file" accept="image/jpeg, image/png, image/jpg" class="form-control" name="image"
                            id="image"
                            onchange="document.getElementById('image-preview').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                    <div class="mb-3" id="preview-element">
                        <label for="recipient-name" class="col-form-label d-block me-auto">Preview</label>
                        @if ($event->image)
                            <img src="{{ asset('storage/event-images/' . $event->image) }}"
                                class="img-preview img-fluid mb-3 d-block mx-auto" id="image-preview" width="200"
                                height="200">
                        @else
                            <img class="img-preview mx-auto img-fluid mb-3" id="image-preview" width="200"
                                height="200">
                        @endif
                    </div>

            </div>

            <div class="card-footer text-end">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
            </form>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        $('#titles').change(function(e) {
            $.get('{{ url('check_slug') }}', {
                    'title': $(this).val()
                },
                function(data) {
                    $('#slugs').val(data.slug);
                }
            );
        });

        function getStartDt() {
            const start = document.getElementById("start_dt").value;
            const end = document.getElementById("end_dt").min = start;
            // document.getElementById("end_dt").disabled = false;
        }
    </script>
@endpush
