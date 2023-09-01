@extends('layouts.main')
@section('title', 'Event')
@push('breadcrumb')
    <li class="breadcrumb-item active">Event</li>
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
                <h6 class="me-auto my-auto">List Event</h6>
                <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="ms-auto btn btn-sm btn-primary"
                    style="border-radius: 50%"><i class="bi bi-plus"></i></a>
                @include('pages.event.create-event')
            </div>
            <div class="card-body mt-3">
                <div class="table-responsive">
                    <table class="table display responsive nowrap" cellspacing="0" id="myTable" width="100%">
                        <thead>
                            <tr>

                                <th>No</th>
                                <th data-priority="1">Title</th>
                                <th>Place</th>
                                {{-- <th>Addres</th> --}}
                                {{-- <th>Price</th> --}}
                                <th>Start</th>
                                {{-- <th>Finish</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $event->title }}</td>
                                    <td>{{ $event->place }}</td>
                                    {{-- <td>{{ $event->address }}</td> --}}
                                    {{-- <td>Rp. {{ number_format($event->price) }}</td> --}}
                                    <td>{{ $event->start_date->translatedFormat('d M H:i') }}</td>
                                    {{-- <td>{{ $event->end_date->format('d/m/Y h:i') }}</td> --}}
                                    <td>
                                        <a href="{{ url('event/edit', $event->slug) }}"
                                            class="btn btn-success px-2 btn-sm rounded text-decoration-none">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('event.destroy', $event->slug) }}" method="post"
                                            class="d-inline-flex">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Yakin ingin menghapus data ?')" type="submit"
                                                class="btn btn-danger px-2 btn-sm rounded text-decoration-none">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
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
                        "targets": 4
                    }, {
                        "width": "5%",
                        "targets": 0
                    },
                    {
                        "responsivePriority": 1,
                        "targets": 0
                    }
                ],
                responsive: {
                    details: true
                },
                processing: true,
            });
        });

        function getStartDate() {
            const start = document.getElementById("start_date").value;
            const end = document.getElementById("end_date").min = start;
            document.getElementById("end_date").disabled = false;
        }
        $('#title').change(function(e) {
            $.get('{{ url('check_slug') }}', {
                    'title': $(this).val()
                },
                function(data) {
                    $('#slug').val(data.slug);
                }
            );
        });

        //Preview
        document.getElementById("preview-element").style.display = 'none';

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            document.getElementById("preview-element").style.display = 'block';
            imgPreview.style.display = 'block'

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);


            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endpush
