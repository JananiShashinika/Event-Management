@extends('layouts.app')

@section('title')
    Tasks
@endsection

@section('content')
    <!-- Body Content -->
    <div class="container">
        <div class="mt-4 mb-4">
            <div class=" h5 d-inline"> Tasks</div>
            <div class="d-inline float-end btn btn-primary" data-bs-toggle="modal" data-bs-target="#newTaskModel">
                Add new task
            </div>
        </div>


        <div class="row">

            {{--table --}}
            <div class="">
                <div class="" style="height: 50vh;">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body" id="tasks">
                        </div>
                    </div>
                </div>
            </div>

            {{--form model--}}
            <div class="modal fade" id="newTaskModel" tabindex="-1" aria-labelledby="exampleModalLabel"
                 data-bs-backdrop="static" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Task</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="new_task" action="#" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card border-0 shadow-lg p-3">
                                <div class="card-header">
                                    <h5 class="card-title">
                                        <i class='bx bx-add-to-queue'></i>
                                        Create New Task
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="event_type" class="form-label">Event Type</label>
                                        <select name="event_type" id="event_type" class="form-control" required>
                                            <option value="" hidden="" selected>Select Event Type</option>
                                            @foreach ($event_types as $event_type)
                                                <option value="{{$event_type->id}}">{{$event_type->event_type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="task_name" class="form-label">Task</label>
                                        <input type="text" name="task_name" id="task_name"
                                               placeholder="Enter task" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-3"
                                               for="attachment">Attachment</label>
                                        <div>
                                            <div class="input-group control-group add-more mt-2">
                                                <input type="file" name="attachment" class="form-control">
                                                {{--                                                <input type="file" name="attachments[]" class="form-control"--}}
                                                {{--                                                       multiple accept="application/*">--}}
                                            </div>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3 float-end" id="save">Add</button>
                                    <input type="reset" class="btn btn-primary mt-3 mx-2 float-end">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{--add more attachments--}}
            {{--            <div class="copy" hidden="true">--}}
            {{--                <div class="input-group control-group mt-2">--}}
            {{--                    <input type="file" name="attachment[]" class="form-control"--}}
            {{--                           accept="application/*" placeholder="Choose file">--}}
            {{--                    <div class="input-group-btn">--}}
            {{--                        <div class="btn btn-danger remove ms-2 mt-1">--}}
            {{--                            <svg--}}
            {{--                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"--}}
            {{--                                fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">--}}
            {{--                                <path--}}
            {{--                                    d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>--}}
            {{--                            </svg>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            {{--Edit task modal--}}
            <div class="modal fade" id="editTaskModel" tabindex="-1" aria-labelledby="exampleModalLabel"
                 data-bs-backdrop="static" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Task</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="#" method="post" id="edit_task_form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="task_id_EF" id="task_id_EF">
                            <div class="modal-body p-4 bg-light">
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label for="event_type" class="form-label">Event Type</label>
                                                <select name="event_type_EF" id="event_type_EF" class="form-control"
                                                        required>
                                                    @foreach ($event_types as $event_type)
                                                        <option
                                                            value="{{$event_type->id}}">{{$event_type->event_type}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="edit_task" class="form-label">Task</label>
                                                <input type="text" name="edit_task" id="edit_task"
                                                       placeholder="Enter task" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Old Attachment</label>
                                                <iframe id="view_iframe_EF" src="" style="width:100%;"></iframe>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label"
                                                       for="attachment">New Attachment</label>
                                                <div>
                                                    <div class="input-group control-group add-more mt-2">
                                                        <input type="file" name="attachment_EF" id="attachment_EF"
                                                               class="form-control">
                                                        {{--                                                <input type="file" name="attachments[]" class="form-control"--}}
                                                        {{--                                                       multiple accept="application/*">--}}
                                                    </div>
                                                </div>
                                            </div>

                                            {{--                                                <div class="col-md-8 col-sm-8 col-xs-8">--}}
                                            {{--                                                    <div class="input-group control-group after-add-more mt-2">--}}
                                            {{--                                                        <input type="file" name="edit_attachment" id="edit_attachment"--}}
                                            {{--                                                               class="form-control" placeholder="Enter Description">--}}
                                            {{--                                                        <div class="input-group-btn">--}}
                                            {{--                                                            <button class="btn btn-success add-more ms-2 mt-1"--}}
                                            {{--                                                                    type="button">--}}
                                            {{--                                                                <svg xmlns="http://www.w3.org/2000/svg"--}}
                                            {{--                                                                     width="16" height="16" fill="currentColor"--}}
                                            {{--                                                                     class="bi bi-plus-lg" viewBox="0 0 16 16">--}}
                                            {{--                                                                    <path fill-rule="evenodd"--}}
                                            {{--                                                                          d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>--}}
                                            {{--                                                                </svg>--}}
                                            {{--                                                            </button>--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            <div class="copy hide">--}}
                                            {{--                                                <div class="control-group input-group" style="margin-top:10px">--}}
                                            {{--                                                    <input type="file" name="addmore[]" class="form-control"--}}
                                            {{--                                                           placeholder="Enter Other Description">--}}
                                            {{--                                                    <div class="input-group-btn">--}}
                                            {{--                                                        <button class="btn btn-danger remove ms-2 mt-1"--}}
                                            {{--                                                                type="button">--}}
                                            {{--                                                            <svg xmlns="http://www.w3.org/2000/svg"--}}
                                            {{--                                                                 width="16" height="16" fill="currentColor"--}}
                                            {{--                                                                 class="bi bi-x-lg" viewBox="0 0 16 16">--}}
                                            {{--                                                                <path--}}
                                            {{--                                                                    d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>--}}
                                            {{--                                                            </svg>--}}
                                            {{--                                                        </button>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
                                <button type="submit" id="edit_task_btn" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- attachment view modal -->
    <div class="modal fade" id="view_atch_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Attachment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe id="view_iframe" src="" style="width:100%;height:50vh;"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        $(function () {

            // add new task ajax request
            $("#new_task").submit(function (e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#save").text('Adding...');

                $.ajax({
                    url: '{{ route('task.store') }}',
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
                            fetchAllTasks();
                        } else {
                            Swal.fire(
                                response.title,
                                response.message,
                                response.type
                            )
                        }
                        $("#save").text('Add');
                        $("#new_task")[0].reset();
                    }
                });
            });

            // view attachment
            $(document).on('click', '.viewIcon', function (e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('task.view') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        $("#view_iframe").attr('src', '/attachments/' + response.path);
                    }
                });
            });

            /* reset view attachment modal when close*/
            const attachment_modal = document.getElementById('view_atch_modal')
            attachment_modal.addEventListener('hidden.bs.modal', event => {
                $("#view_iframe").attr('src', '');
            })

            // edit task ajax request
            $(document).on('click', '.editIcon', function (e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('task.edit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        $("#task_id_EF").val(response.id);
                        $("#edit_task").val(response.task_name);
                        $('#event_type_EF').val(response.event_type_id);
                        $("#view_iframe_EF").attr('src', '/attachments/' + response.path);
                    }
                });
            });

            /* reset edit modal when close*/
            const edit_modal = document.getElementById('editTaskModel')
            edit_modal.addEventListener('hidden.bs.modal', event => {
                $("#view_iframe_EF").attr('src', '');
            })

            // update task ajax request
            $("#edit_task_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#edit_task_btn").text('Updating...');
                $.ajax({
                    url: '{{ route('task.update') }}',
                    method: 'post',
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire(
                                response.title,
                                response.message,
                                response.type,
                            )
                            fetchAllTasks();
                            $("#edit_task_form")[0].reset();
                            $("#editTaskModel").modal('hide');
                        } else {
                            Swal.fire(
                                response.title,
                                response.message,
                                response.type
                            )
                        }
                        $("#edit_task_btn").text('Update');
                    }
                });
            });

            // delete task ajax request
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
                            url: '{{ route('task.delete') }}',
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
                                fetchAllTasks();
                            }
                        });
                    }
                })
            });

            // fetch all tasks ajax request
            fetchAllTasks();

            function fetchAllTasks() {
                $.ajax({
                    url: '{{ route('task.fetchAll') }}',
                    method: 'get',
                    success: function (response) {
                        $("#tasks").html(response);
                        // $("table").DataTable({
                        //     order: [0, 'asc'],
                        //     scrollY: '400px',
                        //     scrollCollapse: true,
                        //     paging: false,
                        //     info: false,
                        // });
                    }
                });
            }

        });

        // $(document).ready(function () {
        //     $(".add-more-btn").click(function () {
        //         var html = $(".copy").html();
        //         console.log(html);
        //         $(".add-more").after(html);
        //     });
        //     $("body").on("click", ".remove", function () {
        //         $(this).parents(".control-group").remove();
        //     });
        // });

        // function showFile(event){
        //     var input = event.target;
        //     var reader = new FileReader();
        //     reader.onload = function(){
        //         var dataURL = reader.result;
        //         var output = document.getElementById('file-preview');
        //         output.src = dataURL;
        //     };
        //     reader.readAsDataURL(input.files[0]);
        // }
    </script>
@endpush

@push('css')
    <style>
        label {
            font-weight: 500;
        }
    </style>
@endpush
