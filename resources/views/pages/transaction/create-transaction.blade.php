<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Form Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="overflow:hidden;">
                <form action="{{ route('pembayaran.store') }}" method="post" id="transaction_form">
                    @csrf
                    <input type="hidden" name="event" id="event">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Name</label>
                        <select class="form-select" name="member_id" id="select2" style="width: 100%" required>
                            <option value="" selected>Pilih member</option>
                            @foreach ($members as $member)
                                <option value="{{ $member->id_member }}">{{ $member->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Event</label>
                        <select class="form-select" name="event_select" id="event_select" style="width: 100%"
                            onchange="setPay()" required>
                            <option value="" selected disabled>Pilih Event</option>
                            @foreach ($events as $event)
                                <option value="{{ $event->slug }}|{{ $event->price }}">{{ $event->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Jenis Pembayaran</label>
                        <select class="form-select" name="pay_method" id="pay_method" style="width: 100%"
                            onchange="setPay()" required>
                            <option selected disabled value="" required>Pilih Jenis Pembayaran
                            </option>
                            <option value="Tunai" @if (old('pembayaran') == 'Tunai') {{ 'selected' }} @endif>
                                Tunai</option>
                            <option value="Non-tunai" @if (old('pembayaran') == 'Non Tunai') {{ 'selected' }} @endif>
                                Non Tunai</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Pay</label>
                        <input type="number" min=0 class="form-control" name="pay" id="pay" required
                            readonly>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">kembali</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
