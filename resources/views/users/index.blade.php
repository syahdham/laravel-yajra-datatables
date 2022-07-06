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

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

        function deleteData(data) {
            let table = $('#users-table')

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    let url = '{{ route("users.destroy", ":id") }}'
                    url = url.replace(':id', data.id)

                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: {
                            '_method': 'DELETE',
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function() {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )

                            table.DataTable().ajax.reload()

                        }
                    })

                }
            })
        }

    </script>
@endpush
