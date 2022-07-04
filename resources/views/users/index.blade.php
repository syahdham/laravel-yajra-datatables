@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-4">
            <select class="form-select" id="select">
                <option selected>{{ 'Choose Role' }}</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            <button id="reset" class="btn btn-secondary">Reset</button>
        </div>
        <div class="card-body">
            {{$dataTable->table()}}
        </div>
    </div>
@endsection

@push('scripts')
    {{$dataTable->scripts()}}

    <script>
        $(document).ready(function () {

            let table = $('#users-table')

            $('#select').on('change', function () {
                tableFilter($('#select').val())
                table.DataTable().ajax.reload()
            })

            $('#reset').on('click', function () {
                tableFilter(null)
                table.DataTable().ajax.reload()
            })

            function tableFilter(value) {
                table.on('preXhr.dt', function ( e, settings, data ) {
                    data.role_id = value;
                })
            }
        })

    </script>
@endpush
