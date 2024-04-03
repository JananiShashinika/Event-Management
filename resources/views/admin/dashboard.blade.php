@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-9">
                <div class="container mt-4 mb-">
                    <label class="h5">Upcoming Events</label>
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
                    <div id="card" class="card border-0 shadow-lg" style="width: 100%;">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Event Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Coordinator Name</th>
                                    <th>Activity ID</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($upcomingEvents->isNotEmpty())
                                    @foreach ($upcomingEvents as $upcomingEvent)
                                        <tr>
                                            <td>{{ $upcomingEvent->event_name }}</td>
                                            <td>{{ $upcomingEvent->start_date }}</td>
                                            <td>{{ $upcomingEvent->end_date }}</td>
                                            <td>{{ $upcomingEvent->coordinator_id }}</td>
                                            <td>{{ $upcomingEvent->event__id }}</td>
                                            {{--  <td><a href="{{ route('upcoming_event.view', $upcomingEvent->id) }}" class="btn btn-primary">View</a></td>  --}}
                                            <td><a href="{{ route('space_event.index1') }}">View</td>
                                        </tr>
                                    @endforeach

                                @else
                                    <tr>
                                        <td colspan="6">Record Not Found</td>
                                    </tr>
                                @endif
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-3 mt-5">
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
                <x-calendar/>

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
