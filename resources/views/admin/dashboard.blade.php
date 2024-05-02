@extends('layouts.app')

{{--  <style>
    .container {
        background-color: #f0f0f0; /* Set your desired background color */
    }

    .card {
        background-color: #ffffff; /* Set your desired background color */
    }
</style>  --}}

@section('title')
    Dashboard
@endsection

@section('content')

<style>
    .container {
        padding: 10px;
    }
    body {
        font-family: 'Times New Roman', Times, serif;
        background-image: url('{{ asset('images/ligghtblue.jpg') }}');
        background-size: cover;
    }
    .card {
        background-color: #f0f969;

    }
    .upcoming-events-label {
        font-family: 'Times New Roman', Times, serif;
        color: #f60606; /* Set your desired font color */
        text-align: center;
        padding: 5px;

    }
    {{--  .carousel-inner .carousel-item img {
        width: 100%;
        height: 100%;
    }  --}}
    .font-style{
        font-family: 'Times New Roman', Times, serif;
    }
    .equal-size {
        height: 220px;

    }

</style>
<div style="background-image: url('{{ asset('images/ligghtblue.jpg') }}');">

    <div class="container">
        <div class="row">
            <h1  class = "font-style" style="text-align: center; padding: 20px; color:midnightblue;"> Event Management System of The Space Applications Division</h1>
            <div class="col-5">
                <div class="container mt-6">
                    <p class = "font-style h5">The system treamlining event organization effortlessly.
                        Upcoming events and associated tasks are presented with ease, facilitating coordination.
                       <br> Employees are assigned tasks seamlessly, actions logged for monitoring. Productivity and collaboration are enhanced.
                         Welcome to a smoother event management experience.</p>

                         <label class="h3 upcoming-events-label">Upcoming Events</label>
                </div>
                {{-- <form action="{{url('search')}}" method="get" role="search" class="searchbar">
                    <div class="input-group form-content">
                        <input type="search" name="search" class="form-control" placeholder="Search" aria-label="Search"
                               aria-describedby="search-addon"/>
                        <button type="button" class="btn btn-outline-primary">search</button>
                    </div>
                </form> --}}

                {{--upcoming events table--}}
                <div class="container" id="upcoming_tbl">
                    <div id="card" class="card border-1 shadow-lg background-y b" style="width: 100%;">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Activity</th>
                                    <th>Starting Date</th>
                                    {{--  <th>End Date</th>  --}}
                                    {{--  <th>Coordinator Name</th>
                                    <th>Activity ID</th>  --}}
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($upcomingEvents->isNotEmpty())
                                    @foreach ($upcomingEvents as $upcomingEvent)
                                        <tr>
                                            <td>{{ $upcomingEvent->event_name }}</td>
                                            <td>{{ $upcomingEvent->start_date }}</td>
                                            {{--  <td>{{ $upcomingEvent->end_date }}</td>  --}}
                                            {{--  <td>{{ $upcomingEvent->coordinator_id }}</td>  --}}
                                            {{--  <td>{{ $upcomingEvent->event__id }}</td>  --}}
                                            {{--  <td><a href="{{ route('upcoming_event.view', $upcomingEvent->id) }}" class="btn btn-primary">View</a></td>  --}}
                                            <td><a href="{{ route('space_event.index1') }}">View</td>
                                        </tr>
                                    @endforeach

                                @else
                                    <tr>
                                        <td colspan="3">Record Not Found</td>
                                    </tr>
                                @endif
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
<div class="align-content-center">

    {{--  <x-calendar/>  --}}

</div>
            </div>

                {{-- Add Searchbar Component --}}
{{--                <form action="{{url('search')}}" method="get" role="search" class="searchbar">--}}
{{--                    <div class="input-group form-content">--}}
{{--                        <input type="search" name="search" class="form-control" placeholder="Search Events..."--}}
{{--                               aria-label="Search"--}}
{{--                               aria-describedby="search-addon"/>--}}
{{--                        <button type="button" class="btn btn-outline-primary">Search</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
                {{-- Add Calendar Components --}}
                {{--  <x-calendar/>  --}}

                <div class="col-7 mt-6"> <!-- Set padding to 0 -->
                    <!-- Add your home image or carousel component here -->
                    <!-- Example: -->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ asset('images/image1.jpeg') }}" class="img-fluid equal-size" alt="Image 1">
                            </div>
                            <div class="col-md-6">
                                <img src="{{ asset('images/image2.jpg') }}" class="img-fluid equal-size" alt="Image 2">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <img src="{{ asset('images/image3.jpg') }}" class="img-fluid equal-size" alt="Image 3">
                            </div>
                            <div class="col-md-6">
                                <img src="{{ asset('images/image6.jpg') }}" class="img-fluid equal-size" alt="Image 4">
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>


            </div>

    </div>
</div>
@endsection

{{--styles for only dashboard page--}}
@push('css')
    <style>
        /*styles for animate data on table*/
        #upcoming_tblard tr {
            opacity: 1;
            transform: translateY(100px);
            transition: opacity 0.3s, transform 0.5s;
        }

        #upcoming_tbl.animate {
            animation: slideUp 0.5s linear forwards;
        }

        /*animation for table animate*/
        @keyframes slideUp {
            0% {
                opacity: 1;
                transform: translateY(100px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endpush

{{-- script for only dashboard page--}}
@push('js')
    <script>
        function animateTableCard() {
            var card = document.querySelector('#upcoming_tbl');
            card.classList.add('animate');
        }

        function animateTableRows(id) {
            var tableRows = document.querySelectorAll('#' +id+ ' tr');
            var delay = 200;

            tableRows.forEach(function (row, index) {
                setTimeout(function () {
                    row.classList.add('animate');
                }, delay * index);
            });
        }

        function handleVisibilityChange(id) {
            if (document.visibilityState === 'visible') {
                console.log(document.visibilityState);
                animateTableRows(id);
            } else if (document.visibilityState === 'hidden') {
                console.log(document.visibilityState);
                //document.title = document.visibilityState;

                var tableRows = document.querySelectorAll('#' +id+ ' tr');
                tableRows.forEach(function (row) {
                    row.classList.remove('animate');
                });
            }
        }

        document.addEventListener('visibilitychange', handleVisibilityChange);
        //window.addEventListener('load', [animateTableRows('card'), animateTableCard]);

    </script>
@endpush
