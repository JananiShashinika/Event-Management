@extends('layouts.app')

@section('title')Profile @endsection

@section('content')
    <div class="profile-container container">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col">
            <div class="card card-registration my-4">
              <div class="row g-0">
                <div class="col-xl-4 d-none d-xl-block border-right">
                      <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                          <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                          <span class="font-weight-bold h5">Admin</span>
                          <span class="text-black-50">admin@gmail.com</span>
                      </div>
                </div>
                <div class="col-xl-8">
                  <div class="card-body p-md-5 text-black">
                    <h3 class="mb-5">Profile</h3>

                    <div class="row">
                      <div class="col-md-6 mb-4">
                        <div class="form-outline">
                          <label class="form-label">First name</label>
                          <input type="text" id="firstname" class="form-control form-control-sm" placeholder="Enter first name" value="" />
                        </div>
                      </div>
                      <div class="col-md-6 mb-4">
                        <div class="form-outline">
                          <label class="form-label">Last name</label>
                          <input type="text" id="lastname" class="form-control form-control-sm" placeholder="Enter last name" value="" />
                        </div>
                      </div>
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label">Email</label>
                      <input type="email" id="email" class="form-control form-control-sm" placeholder="Enter your email"/>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-4">
                        <label class="form-label">Division</label>
                        <select class="select form-control form-control-sm">
                          <option value="1">- -</option>
                          <option value="2">Option 2</option>
                          <option value="3">Option 3</option>
                          <option value="4">Option 4</option>
                        </select>

                      </div>
                      <div class="col-md-6 mb-4">

                        <label class="form-label">Position</label>
                        <select class="select form-control form-control-sm">
                          <option value="1">- -</option>
                          <option value="2">Option 2</option>
                          <option value="3">Option 3</option>
                          <option value="4">Option 4</option>
                        </select>

                      </div>
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label">Mobile Number</label>
                      <input type="text" id="mobile_no" class="form-control form-control-sm" placeholder="Enter your mobile number"/>
                    </div>

                    <div class="d-flex justify-content-end pt-3">
                      <button type="button" class="btn btn-primary btn-sm">Save Changes</button>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endpush
