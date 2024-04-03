@extends('layouts.app')

@section('title')
    Create New Event
@endsection

@section('content')
    <h1 style="text-align: center;">Create New Activity</h1>

    <!-- Your form HTML code goes here -->
    <form id="createEventForm" style="width: 50%; margin: 0 auto; border-collapse: collapse;"
        action="{{ route('space_event.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation"
        novalidate>
        @csrf
        <div class="card border-0 shadow-lg p-3">
            <div class="card-body">
                <div class="mb-3">
                    <label for="eventName" class="form-label">Event Name</label>
                    <input type="text" name="event_name" id="event_name" class="form-control"
                        placeholder="Enter Event Name" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Event ID</label>
                    <input type="text" name="event_id" class="form-control" value="{{ $id }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="sDate" class="form-label">Start Date</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="eDate" class="form-label">End Date</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="coordinator" class="form-label form-input">Select Coordinator</label>
                    <div class="form-group">
                        <select name="coordinator" id="coordinator" class="form-select">
                            <option value="0" selected>--Select Coordinator--</option>
                            @foreach ($coordinators as $coordinator)
                                <option value="{{ $coordinator->emp_id }}">
                                    {{ $coordinator->emp_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="eDate" class="form-label">
                        Tasks
                    </label>
                    <br />
                    @foreach ($tasklist as $task)
                        <div class="">
                            <input type="checkbox" id="" name="tasknames[]" value="{{ $task->task_name }}" class="">
                            <label for="">{{ $task->task_name }}</label><br>
                        </div>
                    @endforeach


                </div>

                <button class="btn btn-primary mt-3 mx-1 float-end" type="submit">Save</button>
                <button class="btn btn-primary mt-3 mx-1 float-start" type="reset">Reset</button>

            </div>
        </div>
    </form>

    <!-- JavaScript code to submit the form -->
    {{--  <script>
        function submitForm() {
            // Submit the form
            document.getElementById('createEventForm').submit();
        }
    </script>  --}}
@endsection
