<div class="table-actions btn-group">
{{--    <a href="{{ route($route.'.show', $data) }}" class="table-action btn btn-info" data-toggle="tooltip" title="Show">--}}
{{--            {{ 'Show' }}--}}
{{--    </a>--}}
    <a href="{{ route($route.'.edit',  $data ) }}" class="table-action btn btn-primary" data-toggle="tooltip" title="Ubah">
        {{ 'Edit' }}
    </a>
    <button class="table-action-delete btn btn-danger"
            data-toggle="tooltip" title="Hapus" onclick="deleteData({{ $data }})">
        {{ 'Delete' }}</button>
</div>
