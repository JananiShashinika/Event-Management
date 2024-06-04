<!-- Layout -->


@extends('layouts.app')

@section('title')
    Create New Events
@endsection


@section('content')
<style>
    .column-header {
        text-decoration: underline;
        border: 0px;
        padding: 10px;
    }
</style>

    <!-- Body Content -->
    <div style="text-align: center; font-size: 1.2em;">

        <h2 style="font-family: 'Times New Roman', Times, serif;text-align: center">Space Application - List of Event Activities</h2>

        <table style="width: 60%; margin: 0 auto; border-collapse: collapse;">
            <thead>
                <tr>
                    <th class="column-header">Event Types</th>
                    <th class="column-header">View </th>
                    <th class="column-header">Create </th>

                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                <tr>
                    <td style="border: 0px; padding: 10px;">{{ $event->event_type }}</td>

                    <td style="border: 0px; padding: 10px;">

                        <form action="{{ route('space_event.view') }}">
                            @csrf
                            <input type="hidden" name="event_id" value="{{ $event->id }}">
                            <button type="submit" style="padding: 5px 10px; background-color: #0aa17d; color: white; border: none; border-radius: 4px; cursor: pointer;">View Activities</button>
                        </form>

                    </td>

                    <td style="border: 0px; padding: 10px;">
                        <form  action="{{ route('space_event.create') }}" method="GET">
                            @csrf
                            <input type="hidden" name="event_id" value="{{ $event->id }}">

                            <button type="submit" style="padding: 5px 10px; background-color: #190575; color: white; border: none; border-radius: 4px; cursor: pointer;">Create New</button>
                        </form>
                    </td>



                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('.view-events-btn').click(function(){
            {{--  var eventId = $(this).data('event-id');  --}}
            console.log('kjh');
            $.ajax({
                url: '/space_events/' + eventId,
                type: 'GET',
                success: function(response) {
                   
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>

@endsection
