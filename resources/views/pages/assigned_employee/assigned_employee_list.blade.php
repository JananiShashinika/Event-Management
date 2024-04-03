@extends('layouts.app')

  @section('title')Assigned Employee List @endsection

@section('content')

        <!-- Body Content -->
        <div class="container p-3 mb-3" style="min-height: 80vh;">
            <div class="d-flex justify-content-between py-3">
                <div class="h4">Assigned Employee List</div>
                <div>
                    <a href="" class="btn btn-primary">Create</a>
                </div>
            </div>

            @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif

            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Employee List</th>
                            <th>Event Name</th>
                            <th>Employee ID</th>
                            <th>Assigned Task</th>
                        </tr>

                        @if($employee->isNotEmpty())
                        @foreach ($employee as $emp)
                        <tr valign="middle">
                            <td>{{ $emp->emp_name }}</td>
                            <td>{{ $emp->event_id }}</td>
                            <td>{{ $emp->emp_id }}</td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm">
                                    Edit
                                </a>
                                <a href="#" onclick="" class="btn btn-danger btn-sm">
                                    Delete
                                </a>
                                <form id="" action="" method="post">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>

                        </tr>
                        @endforeach

                        @else
                        <tr>
                            <td colspan="6">Record Not Found</td>
                        </tr>
                        @endif

                    </table>
                </div>
            </div>
        </div>


@endsection

{{--  -------------------------
@extends('layouts.app')

  @section('title')Assigned Employee List @endsection

@section('content')

        <!-- Body Content -->
        <div class="container p-3 mb-3" style="min-height: 80vh;">
            <div class="d-flex justify-content-between py-3">
                <div class="h4">Assigned Employee List</div>
                <div>
                    <a href="" class="btn btn-primary">Create</a>
                </div>
            </div>

            @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif

            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Employee List</th>
                            <th>Event Name</th>
                            <th>Employee ID</th>
                            <th>Assigned Task</th>
                        </tr>

                        @if($employee->isNotEmpty())
                        @foreach ($employee as $emp)
                        @foreach ($event as $event )

                        <tr valign="middle">
                            <td>{{ $emp->emp_name }}</td>
                            <td>{{ $event->event_name }}</td>
                            <td>{{ $emp->emp_id }}</td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm">
                                    Edit
                                </a>
                                <a href="#" onclick="" class="btn btn-danger btn-sm">
                                    Delete
                                </a>
                                <form id="" action="" method="post">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>

                        </tr>
                        @endforeach
                        @endforeach

                        @else
                        <tr>
                            <td colspan="6">Record Not Found</td>
                        </tr>
                        @endif

                    </table>
                </div>
            </div>
        </div>


@endsection  --}}
