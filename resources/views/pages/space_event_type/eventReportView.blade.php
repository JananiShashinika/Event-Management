<!DOCTYPE html>
@extends('layouts.app')
@section('title', 'Edit Report')
@section('content')

<style>
    .event {
        cursor: pointer;
    }
</style>
    <div class="container">
        <div class="content-container">
            <h3 style="font-family: 'Times New Roman', Times, serif;text-align: center">{{ $eventType->event_type }} Event Organizing by Space Application Division</h3>

            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar">
                        @foreach ($eventname as $event)
                        <a ref="event" class="event" data-no="{{ $event->id }}"  >{{ $event->event_name }}</a><br>
                        @endforeach
                    </div>
                </div>
                 <div class="col-md-9">
                    <div class="content" id="ajaxResults">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function() {
            $('a[ref="event"]').click(function() {
                var id = $(this).attr("data-no");

                $('a[ref="event"]').removeClass('active');
                $(this).addClass('active');
                $.ajax({
                    type: 'get',
                    url: '{{url("/space_event/view/")}}/' + id,
                    data: {},
                    dataType: 'json',
                    success: function(data) {
                        $('#ajaxResults').html(data.html);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText); // Log error response
                    }
                });
            });
            $('a.event:first').click(); // Trigger click on first link initially
        });
    </script>
@endsection

@section('script')
@endsection
