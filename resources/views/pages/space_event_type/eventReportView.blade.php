<!DOCTYPE html>
@extends('layouts.app')
@section('title', 'Edit Report')
@section('content')

<style>
    body {
        font-family: 'Times New Roman', Times, serif;
    }
    .event {
        cursor: pointer;
    }

    .documents{
        cursor: pointer;
    }
</style>

<div class="container">
    <div class="content-container">
        <h3 style="text-align: center">{{ $eventType->event_type }} Event Organizing by Space Application Division</h3>

        <div class="row">
            {{-- Event links --}}
            <div class="col-3">
                <div class="content-container">
                    <div class="sidebar">
                    <h3 style="color:midnightblue">Activities</h3>
                        <div>
                        @foreach ($eventname as $event)
                        <a ref="event" class="event" data-no="{{ $event->id }}" style="display: inline-block; padding: 5px; border: 1px solid #3503fc; background-color: #7f7e7e; color: #fdfdfd; text-decoration:none; margin-bottom: 5px; border-radius: 5px;">{{ $event->event_name }}</a><br>
                        @endforeach
                        </div>
                    </div>
                </div>

                <br>
                {{-- Document links --}}
                <div class="documents-column">
                    <h3 style="color:midnightblue">Documents List</h3>
                    @foreach ($docs as $doc)
                    <a ref="documents" class="documents" style="display:inline-block; text-decoration:none; color:rgb(7, 7, 7);" data-no="{{ $event->id }}" style="display: block;">{{ $doc->attachment }}</a><br>
                    @endforeach
                </div>
            </div>

        {{-- AJAX results --}}

            <div class="col-9">
                <div class="content-container">
                <div class="content" id="ajaxResults"></div>
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
{{--  have to call mthod using that emp assigning  --}}

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
            // Click event handler for document links
            $('a[ref="documents"]').click(function() {
                var attachment = $(this).text(); // Get the attachment name
        // Do whatever you want with the attachment name, for example, display it
        {{--  alert('Attachment: ' + attachment);  --}}
        $(this).addClass('view');
    });

            $('a.event:first').click(); // Trigger click on first link initially
        });
    </script>
@endsection

@section('script')
@endsection
