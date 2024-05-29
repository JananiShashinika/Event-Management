<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Blade Template</title>
    <style>
        .taskname {
            border: none !important;
            background: transparent !important;
        }
        .status.Done {
            background-color: #4CAF50; /* Green for "done" state */
        }

    </style>

    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Include CSRF token -->
</head>

<body>
    <div style="font-family: 'Times New Roman', Times, serif; align-content: center">
        <div>
            @foreach ($eventData as $event)
                <h3 style="text-align: center; color:darkblue; font-weight: bold;">{{ $event['event_name'] }}</h3>
            @endforeach

            <h4 style="font-weight: bold; text-decoration: underline;">Event Organizing Details</h4>

            @foreach ($eventData as $event)
                <p><strong>New Event Id:</strong> {{ $event['id'] }}</p>
                <p><strong>Event Name:</strong> {{ $event['event_name'] }}</p>
                <p><strong>Start Date:</strong> {{ $event['start_date'] }}</p>
                <p><strong>End Date:</strong> {{ $event['end_date'] }}</p>
                <p><strong>Coordinator:</strong> {{ $event['coordinator'] }}</p>
            @endforeach
        </div>

        <div>
            <h4 style="font-weight: bold; text-decoration: underline; ">Task List</h4>
            <table style="width: 100%;">
                <thead>
                    <tr>
                        <th style="width: 20%;">Task</th>
                        <th></th>
                        <th style="width: 25cm;">Employee</th>
                        {{--  <th style="width: 20%;">Assign Employee</th>  --}}
                        <th style="width: 30%;">Assigned</th>
                        <th style="width: 25%;">Status</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>
                                <input class="taskname" name="taskname" type="text" value="{{ $task->tasks }}"
                                    readonly>
                            </td>

                            <td>
                                <input class="neweventid" name="neweventid" type="hidden" value="{{ $event['id'] }}"
                                    readonly>
                            </td>

                            <td>
                                <select style="width: 60%;" name="employee_id">
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->emp_id }}">{{ $employee->emp_name }}</option>
                                    @endforeach
                                </select>
                            {{--  </td>

                            <td>  --}}
                                <button type="button" class="btn btn-dark mt-2  add-task">Assign</button>
                            </td>

                            <td>
                                <span class="employee_assigned" name="employee_assigned" >
                                    {{ $task->emp_name}}
                                </span>
                            </td>

                            <td>
                                {{--  <button type="button" id="statusButton{{ $task->id }}" class="btn btn-warning mt-2 status">{{ $task->status ?? 'Todo' }}</button>  --}}
                                <button type="button" class="btn btn-warning status-button" data-task-id="{{ $task->id }}">{{ $task->status == 1 ? 'Done' : 'To do' }}</button>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>


    $(document).ready(function() {

            // Add task AJAX request
            $(".add-task").click(function() {
                var taskRow = $(this).closest("tr");
                var taskName = taskRow.find(".taskname").val();
                var neweventid = taskRow.find(".neweventid").val();
                var selectedEmployee = taskRow.find("select[name=employee_id]").val(); // Updated selector

                $.ajax({
                    url: '{{ route('assign.employee') }}',
                    method: 'post',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'), // Include CSRF token
                        new_event_id: neweventid,
                        event_name: taskName,
                        employee_id: selectedEmployee
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        if (response.success) {
                            alert("Employee assigned successfully.");

                        } else {
                            alert("Error: " + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert("An error occurred. Please try again.");
                    }
                });
            });
        });

        // Update task status
        $('.status-button').click(function() {
            const button = $(this);
            const taskId = button.data('task_id');

            $.ajax({
                url: '{{ route('update.task.status') }}',
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    task_id: taskId,
                },
                success: function(response) {
                    if (response.success) {
                        button.text('Done');
                    } else {
                        alert('An error occurred. Please try again.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('An error occurred. Please try again.');
                }

            });
          });


    </script>
</body>

</html>
