<div>
    <form id="form-submit" action="{{ $action }}">
        <div class="modal-body">
            <div class="row mb-2">
                <div class="col-12">
                    <x-select label="Kategori Barang" name="kategori_barang_id" class="select2Server" />
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-12">
                    <x-input label="Nama Barang" name="nama_barang" placeholder="Nama Barang..."
                        value="{{ isset($row) ? $row->nama_barang ?? '' : '' }}" />
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <x-input label="Merk Barang" name="merk_barang" placeholder="Merk Barang..."
                        value="{{ isset($row) ? $row->merk_barang ?? '' : '' }}" />
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
<script class="baseurl" data-value="{{ url('/') }}"></script>
<script class="isedit" data-value="{{ isset($row) ? true ?? false : false }}"></script>
<script class="rowData" data-value="{{ isset($row) ? $row ?? '' : '' }}"></script>
<script src="{{ asset('js/barang/form.js') }}"></script>
