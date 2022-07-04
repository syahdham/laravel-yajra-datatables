<div class="table-actions btn-group">
{{--    <a href="{{ route($route.'.show', $data) }}" class="table-action btn btn-info" data-toggle="tooltip" title="Show">--}}
{{--            {{ 'Show' }}--}}
{{--    </a>--}}
    <a href="{{ route($route.'.edit',  $data ) }}" class="table-action btn btn-primary" data-toggle="tooltip" title="Ubah">
        {{ 'Edit' }}
    </a>
    <form action={{ route($route.'.destroy',  $data ) }} method="POST">
        @csrf
        @method("DELETE")
        <button type="submit" class="table-action-delete btn btn-danger"
                data-toggle="tooltip" title="Hapus" onclick="return confirm('@php echo 'Apakah anda yakin menghapus ' . $data->nama . '?' @endphp')">
            {{ 'Delete' }}</button>
    </form>
</div>
