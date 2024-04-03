@extends('layouts.app')
    
@section('title')Login @endsection

@section('content')

        <div class="container d-flex justify-content-center align-items-center" style="margin-top: 70px">
            <div class="row border rounded-5 p-3 bg-white shadow box-area">
                <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box">
                    <div class="featured-image mb-3">
                        <img src="{{asset('images/Space_Vector_Art.jpg')}}" class="img-fluid" style="width: 400px; height: 100%">
                    </div>
                </div> 
                    <div class="col-md-6 right-box">
                        <div class="row align-items-center">
                                <div class="header-text mb-4 text-center">
                                    <h3>Event Management System</h3>
                                    <!-- <p class="opacity-75"></p> -->
                                    <cite title="Source Title" style="font-size: 16px; font-weight: 200; color: #808080;">--The Space Applications Division--</cite>
                                </div>
                                <form action="{{ url('login') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control form-control-lg bg-light fs-6" placeholder="Email address" required name="email">
                                    </div>
                                    <div class="input-group mb-1">
                                        <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" required name="password">
                                    </div>
                                    <div class="input-group mb-5 d-flex justify-content-between">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="formCheck" name="remember">
                                            <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
                                        </div>
                                        <div class="forgot">
                                            <small><a href="{{ url('forgot-password')}}">Forgot Password?</a></small>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <button type="submit" class="btn btn-lg btn-primary w-100 fs-6">Login</button>
                                    </div>
                                </form>
                        </div>
                    </div> 
        
            </div>
        </div>


@endsection