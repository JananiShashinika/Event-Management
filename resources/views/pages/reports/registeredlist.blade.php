<!-- Layout -->
@extends('layouts.app')
@section('title')
    Student Information Form
@endsection
@push('css')
    <style>
        /* Custom style for the action buttons */
        .action-buttons a {
            margin-right: 5px; /* Adjust margin for better spacing */
        }

        .action-buttons {
            width: 150px; /* Adjust the width as needed */
        }
    </style>
@endpush

@section('content')

    <div class="container">
        <h3 class="text-center mt-3">Registered Students</h3>
        <div class="text-center">
            <!-- File Upload Form -->
            <form action="{{ route('reports.import') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="mt-4">
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" accept=".xls,.xlsx" id="inputGroupFile02" name="file" required>
                        <button type="submit" class="btn btn-primary">Import Data</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Student Information Form -->
        <div class="container mt-5">
            <form method="POST" action="{{ route('reports.store') }}">
                @csrf <!-- CSRF protection for POST requests -->
                <div class="form-group row">
                    <label class="col-sm-3 mt-10 col-form-label " for="name">Students Name:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" placeholder="Enter student's name" required
                               id="name">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="school">School:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="school" placeholder="Enter school name" required
                               id="school">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="contact">Contact No:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="contact" placeholder="Enter contact number"
                               required
                               id="contact">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="email">Email Address:</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" name="email" placeholder="Enter email address" required
                               id="email">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-3"></div> <!-- Empty column for alignment -->
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="reset" class="btn btn-danger">Clear</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Display Registered Student Information -->
        <div class="container mt-5">
            <table id="student-table" class="table">
                <thead>
                <tr>
                    <th>Select</th>
                    <th>Name</th>
                    <th>School</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th class="action-buttons">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                    <tr>
                        <td><input type="checkbox" name="selected_students[]" value="{{ $student->id }}"></td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->school }}</td>
                        <td>{{ $student->contact }}</td>
                        <td>{{ $student->email }}</td>
                        <td class="action-buttons">
                            <a type="reports.delete" class="btn btn-danger">Delete</a>
                            <a href="#" class="btn btn-warning">Update</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#student-table').DataTable({
                "autoWidth": true // Enable auto width adjustment
            });
        });

         $(function () {

         {{--  Delete registered participant from list    --}}

        $(document).on('click','.deleteIcon',function(e){
            e.preventDefault();
            let id = $(this).attr('id');
            let csrf = '{{ csrf_token() }}';
            Swal fire({
                title:'Are you sure you want to delete this participant?',
                text:"You won't be able to revert this participant",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
            }).then(function(result) {
                if(result.isConfirmed){
                    $.ajax({
                        url: '{{ route('reports.delete') }}',
                        method: 'delete',
                        data:{
                            id:id,
                            _token: csrf
                        },
                        success: function(response){
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'Success'
                            )
                             fetchAllEventTypes();
                        }
                    });
                        }
                    })

            });
             fetchAllEventTypes();

            function fetchAllEventTypes() {
                $.ajax({
                    url: '{{ route('reports.fetchAll') }}',
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
