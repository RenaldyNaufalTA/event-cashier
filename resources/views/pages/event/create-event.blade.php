<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('event.store') }}" method="post" id="event_form" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="col-form-label">Judul</label>
                        <input type="text" class="form-control" name="title" id="title" maxlength="255"
                            value="{{ old('title') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="col-form-label">Slug</label>
                        <input type="text" class="form-control" name="slug" id="slug" maxlength="255"
                            value="{{ old('slug') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="col-form-label">Harga</label>
                        <input type="number" class="form-control" name="price" id="price" min=0
                            value="{{ old('price') }}" required>
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="col me-1">
                            <label for="place" class="col-form-label">Tempat</label>
                            <input type="text" class="form-control" name="place" id="place" maxlength="255"
                                value="{{ old('place') }}" required>
                        </div>
                        <div class="col">
                            <label for="address" class="col-form-label">Alamat</label>
                            <input type="text" class="form-control" name="address" id="address" maxlength="255"
                                value="{{ old('address') }}" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex">

                            <label for="start_date" class="col-form-label col">Mulai</label>
                            <label for="end_date" class="col-form-label col">Akhir</label>
                        </div>
                        <div class="input-group">
                            <input type="datetime-local" class="form-control me-1" name="start_date" id="start_date"
                                onchange="getStartDate()" required min="{{ Carbon\Carbon::today() }}">
                            <input type="datetime-local" class="form-control" name="end_date" id="end_date" required
                                disabled>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Gambar</label>
                        <input type="file" accept="image/jpeg, image/png, image/jpg" class="form-control"
                            name="image" id="image" required onchange="previewImage()">
                    </div>
                    <div class="mb-3" id="preview-element">
                        <label for="recipient-name" class="col-form-label">Preview</label>
                        <img class="img-preview img-fluid mx-auto" width="200" height="200">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>
