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
                        <th style="width: 30%;">Task</th>
                        <th></th>
                        <th style="width: 30%;">Employee</th>
                        <th style="width: 20%;">Assign</th>
                        <th style="width: 20%;">Status</th>
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
                                <select style="width: 60%;" name="employee_id"> <!-- Updated name attribute -->
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->emp_id }}">{{ $employee->emp_name }}</option>
                                    @endforeach
                                </select>
                            </td>

                            <td>
                                <button type="button" class="btn btn-dark mt-2  add-task">Assign</button>
                            </td>

                            <td>
                                <button type="button" class="btn btn-warning mt-2 status" >Done</button>
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

            // Function to update dropdown options
    function updateDropdownOptions() {
        $.ajax({
            url: '{{ route('get.employees') }}', // Endpoint to fetch updated employee data
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                // Clear existing options in the dropdown
                $('select[name=employee_id]').empty();

                // Append new options to the dropdown
                $.each(response.employees, function(index, employee) {
                    $('select[name=employee_id]').append('<option value="' + employee.emp_id + '">' + employee.emp_name + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert("An error occurred while fetching employee data.");
            }
        });
    }

    // Retrieve the selected option from local storage
    var selectedEmployee = localStorage.getItem('selectedEmployee');
    // Set the dropdown's selected option if a value is found in local storage
    if(selectedEmployee){
        $('select[name=employee_id]').val(selectedEmployee);
    }

    // Add change event listener to the dropdown
    $('select[name=employee_id]').change(function(){
        //Store selected employee to the local storage
        localStorage.setItem('selectedEmployee',$(this).val());
    });

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
    </script>
</body>

</html>
