@extends('layouts.app')

@section('title', 'Edit Report')

@section('content')
 {{--  <h1>Event Type: {{ $eventType->event_type }}</h1>  --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                {{--  @foreach ($eventType as $eventType)
                <div class="card-header">{{$eventType->$event_type }}</div>
                @endforeach  --}}

                {{--  <div class="card-body">
                    @foreach ($createdEvent as $event)
                    <p><strong>Event Name:</strong> {{ $event->event_name }}</p>
                    <p><strong>Start Date:</strong> {{ $event->start_date }}</p>
                    <p><strong>End Date:</strong> {{ $event->end_date }}</p>
                    <p><strong>Coordinator:</strong> {{ $event->coordinator }}</p>
                    @endforeach
                </div>  --}}
                    {{--  <p><strong>Coordinator:</strong>
                        @foreach($employee as $emp)
                            {{ $emp->emp_name}}
                        @endforeach
                    </p>  --}}
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                {{--  <div class="card-header">{{ __('Tasks') }}</div>  --}}

                <div class="card-body">
                    <h3>Activity created successfully</h3>
                    {{--  <div class="table-responsive">  --}}


                        {{--  <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Task</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                // Commented
                                 @foreach($tasks as $task)
                                    <tr>
                                        <td>{{ $task->task_name }}</td>
                                        <td contenteditable="true">{{ $task->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>  --}}
                    {{--  </div>  --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
