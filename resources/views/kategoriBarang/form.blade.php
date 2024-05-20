<div>
    <form id="form-submit" action="{{ $action }}">
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <x-input label="Kategori Barang" name="nama_kbarang" placeholder="Kategori Barang..."
                        value="{{ isset($row) ? $row->nama_kbarang ?? '' : '' }}" />
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <div class="row justify-content-end">
                <div class="col-sm-12">
                    <x-button-cancel />
                    <x-button-submit />
                </div>
            </div>
        </div>
    </form>
</div>
<script src="{{ asset('js/kategoriBarang/form.js') }}"></script>
