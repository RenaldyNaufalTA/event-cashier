<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('member.store') }}" method="post" id="event_form">
                    @csrf
                    <div class="mb-3">
                        <label for="id_member" class="col-form-label">ID Member</label>
                        <input type="text" class="form-control" name="id_member" id="id_member"
                            value="{{ old('id_member') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="col-form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" maxlength="255"
                            value="{{ old('name') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="poin" class="col-form-label">Poin</label>
                        <input type="number" class="form-control" name="poin" id="poin" min=0
                            value="{{ old('poin', 0) }}" required>
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
