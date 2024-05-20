<div>
    <form id="form-submit" action="{{ $action }}">
        <div class="modal-body">
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
<script src="{{ asset('js/satuanBarang/changeStatus.js') }}"></script>
