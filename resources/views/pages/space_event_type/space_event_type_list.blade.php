<!-- Layout -->
@extends('layouts.app')

@section('title')
    Events
@endsection

@section('content')
    <!-- Body Content -->
    <div class="container">
        <div class="h5 mt-4 mb-4">Event Types</div>

        <div class="row">

            {{--table--}}
            <div class="col-7">
                <div class="" style="height: 50vh;">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body" id="event_types">
                            {{--event types table is load here--}}
                        </div>
                    </div>
                </div>
            </div>

            {{--form--}}
            <div class="col-5">
                <div>
                    <div class="card border-0">
                        <form id="new_event_type_form" action="#" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card border-0 shadow-lg p-3">
                                <div class="card-header">
                                    <h5 class="card-title">
                                        <i class='bx bx-add-to-queue'></i>
                                        Create New Event Type
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="event_type" class="form-label">Event Type Name</label>
                                        <input type="text" name="event_type" id="event_type"
                                               placeholder="Enter Event Type"
                                               class="form-control" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3 float-end" id="save">Add</button>
                                    <input type="reset" class="btn btn-primary mt-3 mx-2 float-end">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

{{--            Edit event_type modal--}}
            <div class="modal fade" id="editEventTypeModel" tabindex="-1" aria-labelledby="exampleModalLabel"
                 data-bs-backdrop="static" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Event Type</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="#" method="post" id="edit_event_type_form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="event_id" id="event_type_id">
                            <div class="modal-body p-4 bg-light">
                                <div class="row">
                                    <div class="col-lg">
                                        <label for="edit_event_type">Event Type</label>
                                        <input type="text" name="edit_event_type" id="edit_event_type" class="form-control" placeholder="Enter Event Type" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" id="edit_event_type_btn" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@push('js')
    <script>
        $(function () {

            // add new event_type ajax request
            $("#new_event_type_form").submit(function (e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#save").text('Adding...');

                $.ajax({
                    url: '{{ route('event_type.store') }}',
                    method: 'post',
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            Swal.fire(
                                response.title,
                                response.message,
                                response.type
                            )
                            fetchAllEventTypes();
                        } else {
                            Swal.fire(
                                response.title,
                                response.message,
                                response.type
                            )
                        }
                        $("#save").text('Add');
                        $("#new_event_type_form")[0].reset();
                    }
                });
            });

            // edit event_type ajax request
            $(document).on('click', '.editIcon', function (e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('event_type.edit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        $("#event_type_id").val(response.id);
                        $("#edit_event_type").val(response.event_type);
                    }
                });
            });

            // update event type ajax request
            $("#edit_event_type_form").submit(function (e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#edit_event_type_btn").text('Updating...');
                $.ajax({
                    url: '{{ route('event_type.update') }}',
                    method: 'post',
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            Swal.fire(
                                response.title,
                                response.message,
                                response.type,
                            )
                            fetchAllEventTypes();
                            $("#edit_event_type_form")[0].reset();
                            $("#editEventTypeModel").modal('hide');
                        } else {
                            Swal.fire(
                                response.title,
                                response.message,
                                response.type
                            )
                        }
                        $("#edit_event_type_btn").text('Update');
                    }
                });
            });

            // delete event type ajax request
            $(document).on('click', '.deleteIcon', function (e) {
                e.preventDefault();
                let id = $(this).attr('id');
                let csrf = '{{ csrf_token() }}';
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
                        $.ajax({
                            url: '{{ route('event_type.delete') }}',
                            method: 'delete',
                            data: {
                                id: id,
                                _token: csrf
                            },
                            success: function (response) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                                fetchAllEventTypes();
                            }
                        });
                    }
                })
            });

            // fetch all event types ajax request
            fetchAllEventTypes();

            function fetchAllEventTypes() {
                $.ajax({
                    url: '{{ route('event_type.fetchAll') }}',
                    method: 'get',
                    success: function (response) {
                        $("#event_types").html(response);
                        $("table").DataTable({
                            order: [0, 'asc'],
                            scrollY: '50vh',
                            scrollCollapse: true,
                            paging: false,
                            info: false,
                        });
                    }
                });
            }

        });

    </script>
@endpush

@push('css')
    <style>
        label {
            font-weight: 500;
        }
    </style>
@endpush


