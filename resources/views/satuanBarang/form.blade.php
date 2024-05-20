<div>
    <form id="form-submit" action="{{ $action }}">
        <div class="modal-body">
            <div class="row mb-2">
                <div class="col-12">
                    <x-select label="Barang" name="barang_id" class="select2Server" />
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-12">
                    <x-input label="Kode Barang" name="kode_sbarang" placeholder="Kode Barang..."
                        value="{{ isset($row) ? $row->kode_sbarang ?? '' : '' }}" />
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-12">
                    <x-select label="Status" name="status_sbarang" class="select2Side" :data="$array_status_sbarang"
                        value="{{ isset($row) ? $row->status_sbarang ?? '' : '' }}" />
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
<script src="{{ asset('js/satuanBarang/form.js') }}"></script>
