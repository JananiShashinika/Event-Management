@extends('layouts.app')

@section('title', 'Upcoming Event Details')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Latest Upcoming Event Details</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Event Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Coordinator Name</th>
                            <th>Event Type</th>
                        </tr>
                    </thead>
                    <tbody>

                            <tr>
                                <td>Water Rocket 2024</td>
                                <td>2024-03-04</td>
                                <td>2024-03-04</td>
				<th>Mr. Sanath Karunarathne - Research Scientist</th>
                            	<th>Water Rocket</th>

                            </tr>
                    </tbody>
                </table>

<!-- Task list -->
                <h3>Tasks to be Compeleted for the Event</h3>
                <table class="table">
                    <thead>
                        <tr>

                            <th>Event Type</th>
                            <th>Task</th>
                            <th>Attachment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dummy data -->
                        <tr>
                            <td>Water Rocket</td>
                            <td>Select Location and request by a letter</td>
                            <td><a href="#">Location Requesting Letter.docx</a></td>
                            <td>
                                <!-- Checkbox or tick mark for task completion -->
                                <input type="checkbox" id="task1" name="task1">
                            </td>
                        </tr>
                        <tr>
                            <td> </td>
                            <td>Collect equipments</td>
                            <td><a href="#">Equipment List for Water Rocket Event.docx</a></td>
                            <td>
                                <input type="checkbox" id="task2" name="task2">
                            </td>
                        </tr>
                        <tr>
                            <td> </td>
                            <td>Prepare refreshments</td>
                            <td></td> <!-- No attachment -->
                            <td>
                                <input type="checkbox" id="task3" name="task3">
                            </td>
                        </tr>
                        <tr>
                            <td> </td>
                            <td>Decorations</td>
                            <td></td> <!-- No attachment -->
                            <td>
                                <input type="checkbox" id="task4" name="task4">
                            </td>
                        </tr>
                        <!-- Add more rows for other tasks -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
