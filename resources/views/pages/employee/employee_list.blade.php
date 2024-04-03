<!-- Layout -->
@extends('layouts.app')

@section('title')
    Employee List
@endsection

@section('content')
    <!-- Body Content -->
    <div class="container p-3 mb-3" style="min-height: 80vh;">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Employees</div>

        </div>
 
        <div class="row">

            {{-- table --}}

            <div class="col-7">
                <div class="" style="height: 50vh;">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body" id="employee">
                        </div>
                    </div>
                </div>
            </div>
            {{-- form --}}

            <div class="col-5">
                <div>
                    <div class="card border-0">
                        <form id="new_employee_adding" action="#" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card border-0 shadow-lg p-3">
                                <div class="card-header">
                                    <h5 class="card-title">
                                        <i class='bx bx-add-to-queue'></i>
                                        Add New Employee
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="emp_id" class="form-label">Employee ID</label>
                                        <input type="text" name="emp_id" id="emp_id" placeholder="Enter Employee ID"
                                               class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="emp_name" class="form-label">Employee Name</label>
                                        <input type="text" name="emp_name" id="emp_name"
                                               placeholder="Enter Employee Name" required class="form-control" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3 float-end"
                                            id="add">Add
                                    </button>
                                    <input type="reset" class="btn btn-primary mt-3 mx-2 float-end">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            {{--            Edit Employee modal--}}
            <div class="modal fade" id="editEmployeeModel" tabindex="-1" aria-labelledby="exampleModalLabel"
                 data-bs-backdrop="static" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="#" method="post" id="edit_employee_form" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body p-4 bg-light">
                                <div class="col-lg">
                                    <label for="edit_employee_id">Employee ID</label>
                                    <input type="text" name="emp_id" id="employee_id" hidden="true">
                                    <input type="text" name="edit_employee_id" id="edit_employee_id"
                                           class="form-control"
                                           placeholder="Enter Employee id" required>
                                </div>
                                <div class="col-lg">
                                    <label for="edit_employee_name">Employee Name</label>
                                    <input type="text" name="edit_employee_name" id="edit_employee_name"
                                           class="form-control" placeholder="Enter Employee name" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" id="edit_employee_btn" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        $(function () {
            // add new employee ajax request
            $("#new_employee_adding").submit(function (e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#add").text('Adding...');
                $.ajax({
                    url: '{{ route('employee.store') }}',
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
                            fetchAllEmployee();
                        } else {
                            Swal.fire(
                                response.title,
                                response.message,
                                response.type
                            )
                        }
                        $("#add").text('Add');
                        $("#new_employee_adding")[0].reset();
                    }
                });
            });

            //edit employee ajax request
            $(document).on('click', '.editIcon', function (e) {
                e.preventDefault();
                let emp_id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('employee.edit') }}',
                    method: 'get',
                    data: {
                        id: emp_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        $("#employee_id").val(response.id);
                        $("#edit_employee_id").val(response.emp_id);
                        $("#edit_employee_name").val(response.emp_name);
                    },
                });
            });

//fetch all employees ajax request
            fetchAllEmployee();

            function fetchAllEmployee() {
                $.ajax({
                    url: '{{ route('employee.fetchAll') }}',
                    method: 'get',
                    success: function (response) {
                        $("#employee").html(response);
                        $("table").DataTable({
                            order: [0, 'asc'],
                            scrollY: '300px',
                            scrollCollapse: true,
                            paging: false,
                            info: false,
                        });
                    }
                });
            }

            // update employee ajax request
            $("#edit_employee_form").submit(function (e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#edit_employee_btn").text('Updating...');
                $.ajax({
                    url: '{{ route('employee.update') }}',
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
                            fetchAllEmployee();
                            $("#edit_employee_form")[0].reset();
                            $("#editEmployeeModel").modal('hide');
                        } else {
                            Swal.fire(
                                response.title,
                                response.message,
                                response.type
                            )
                        }
                        $("#edit_employee_btn").text('Update');
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
                            url: '{{ route('employee.delete') }}',
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
                                fetchAllEmployee();
                            }
                        });
                    }
                })
            });
        });
    </script>

@endpush
