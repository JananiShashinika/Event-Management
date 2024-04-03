<!-- Layout -->
@extends('layouts.app')

@section('title')
    Create New Events
@endsection

@section('content')
    <!-- Body Content -->
    <div class="container p-3 mb-3" style="min-height: 80vh;">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Create Space Event</div>
            <div>
                <a href="{{route('space_event.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>

        @if(Session::has('success'))
            <script>
                Swal.fire(
                    'Success!',
                    'Event Created Successfully!',
                    'success'
                );
            </script>
        @endif

        <div class="card border-0">
            <form action="{{route('space_event.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card border-0 shadow-lg p-3">
                    <div class="card-body">

                        @if ($errors->count() > 0)
                            <script>
                                Swal.fire(
                                    'Error!!',
                                    'Please try again later!',
                                    'error'
                                );
                            </script>
                        @endif

                        <div class="mb-3">
                            <label for="sDate" class="form-label">Start Date</label>
                            <input type="date" name="sDate" id="sDate" placeholder="Enter Start Date"
                                   class="form-control @error('sDate') is-invalid @enderror" value="{{ old('sDate') }}">
                            @error('sDate')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="eDate" class="form-label">End Date</label>
                            <input type="date" name="eDate" id="eDate" placeholder="Enter End Date"
                                   class="form-control @error('eDate') is-invalid @enderror" value="{{ old('eDate') }}">
                            @error('eDate')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="coordinatorID" class="form-label">Select Coordinator</label>
                            <div class="form-group">
                                <select name="coordinatorID" class="form-control">
                                    @foreach($employees as $emp)
                                        <option value="{{ $emp->emp_id }}">
                                            {{ $emp -> emp_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="sp_event" class="form-label">Select Event</label>
                            <div class="form-group">
                                <select name="sp_event" class="form-control">
                                    @foreach($space_event_types as $event)
                                        <option value="{{ $event->id }}">
                                            {{ $event -> event_type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary mt-3">Save Space Event</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
@endsection



