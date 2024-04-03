<!-- Layout -->
@extends('layouts.app')

@section('title')
    Event List
@endsection

@section('content')
    <!-- Body Content -->
    <div class="container">
        <div style="color: red; align-content: center">Under developing...</div>
        <div class="row">
            <div class="col-8">
                <div class="container p-3 mb-3" style="min-height: 80vh;">
                    <div class="d-flex justify-content-between py-3">
                        <div class="h5">Annual Space Events</div>
                    </div>

                    <div class="card border-0 shadow-lg">
                        <div class="card-body">
                            <table class="table table-striped">
                                <tr>
                                    <th>#</th>
                                    <th>Event Name</th>
                                    <th>Event Type</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Coordinator Name</th>
                                    <th>Action</th>
                                </tr>

                                @if($spnew_event->isNotEmpty())
                                    @foreach ($spnew_event as $key=> $annual_event)
                                        <tr valign="middle">
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $annual_event->event_name }}</td>
                                            <td>{{ $annual_event->event_type_id }}</td>
                                            <td>{{ $annual_event->start_date }}</td>
                                            <td>{{ $annual_event->end_date }}</td>
                                            <td>{{ $annual_event->coordinator_id }}</td>
                                            <td>
                                                {{--                                                <a href="{{ route('space_event.edit',$sp_event->event_id) }}"--}}
                                                {{--                                                   class="btn btn-outline-success btn-sm">--}}
                                                <i class="bx bx-task" style="font-size: 20px"></i>
                                                {{--                                                </a>--}}
                                                {{--                                                <a href="{{ route('space_event.edit',$sp_event->event_id) }}"--}}
                                                {{--                                                   class="btn btn-primary btn-sm">--}}
                                                <i class='bx bx-edit' style="font-size: 20px"></i>
                                                {{--                                                </a>--}}
                                                {{--                                                <a href="#" onclick="deleteEvent({{ $sp_event->event_id }})"--}}
                                                {{--                                                   class="btn btn-danger btn-sm">--}}
                                                <i class='bx bxs-trash' style="font-size: 20px"></i>
                                                {{--                                                </a>--}}
                                                {{--                                                <form id="event-delete-action-{{ $sp_event->event_id }}"--}}
                                                {{--                                                      action="{{ route('space_event.delete',$sp_event->event_id) }}"--}}
                                                {{--                                                      method="post">--}}
                                                {{--                                                    @csrf--}}
                                                {{--                                                    @method('delete')--}}
                                                {{--                                                </form>--}}
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
            </div>
            <div class="col col-4">
                <div class="container p-3 mb-3" style="min-height: 80vh;">
                    <div class="d-flex justify-content-between py-3">
                        <div class="h5">Create New Event</div>
                    </div>

                    <div class="card border-0">
                        <form action="{{route('space_event.store')}}" method="post" enctype="multipart/form-data"
                              class="needs-validation" novalidate>
                            @csrf
                            <div class="card border-0 shadow-lg p-3">
                                <div class="card-body">

                                    <div class="mb-3">
                                        <label for="eventName" class="form-label">Event Name</label>
                                        <input type="text" name="eventName" id="eventName" class="form-control"
                                               placeholder="Enter Event Name" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>

                                    </div>

                                    <div class="mb-3">
                                        <label for="event_type" class="form-label form-input">Select Event Type</label>
                                        <div class="form-group">
                                            <select name="event_type" id="event_type" class="form-select" required>
                                                <option value="" selected>--Select Event Type--</option>
                                                @foreach($event_types['data'] as $event_type)
                                                    <option value="{{ $event_type->id }}">
                                                        {{ $event_type -> event_type }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="sDate" class="form-label">Start Date</label>
                                        <input type="date" name="sDate" id="sDate" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="eDate" class="form-label">End Date</label>
                                        <input type="date" name="eDate" id="eDate" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="coordinator" class="form-label form-input">Select
                                            Coordinator</label>
                                        <div class="form-group">
                                            <select name="coordinator" id="coordinator" class="form-select">
                                                <option value="0" selected>--Select Coordinator--</option>
                                                @foreach($coordinators['data'] as $coordinator)
                                                    <option value="{{ $coordinator->emp_id }}">
                                                        {{ $coordinator -> emp_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary mt-3 mx-1 float-end" type="submit">Save</button>
                                    <button class="btn btn-primary mt-3 mx-1 float-start" type="reset">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('css')
    <style>
        .form-label {
            font-weight: 500
        }
    </style>
@endpush



