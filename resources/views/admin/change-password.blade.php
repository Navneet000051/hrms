@extends('admin.layout.master')
@section('content')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    b {
        font-weight: 500 !important;
    }
    .card-header {
        padding: 1rem 1.35rem;
        margin-bottom: 0;
        background-color: rgba(33, 40, 50, 0.03) !important;
        border-bottom: 1px solid rgba(33, 40, 50, 0.125) !important;
    }
</style>
<div id="main-content" class="profilepage_2 blog-page">
    <div class="container-fluid">

        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Change Password</h2>
                    <!-- <ul class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="index.html">Lucid</a></li>
                                <li class="breadcrumb-item">Pages</li>
                                <li class="breadcrumb-item active">User Profile v2</li>
                            </ul> -->
                </div>
                <div class="col-md-6 col-sm-12 text-md-end">
                    <div class="d-inline-flex text-start">
                        <div class="me-2">
                            <h6 class="mb-0"><i class="fa fa-user"></i> 1,784</h6>
                            <small>Visitors</small>
                        </div>
                        <span id="bh_visitors"></span>
                    </div>
                    <div class="d-inline-flex text-start ms-lg-3 me-lg-3 ms-1 me-1">
                        <div class="me-2">
                            <h6 class="mb-0"><i class="fa fa-globe"></i> 325</h6>
                            <small>Visits</small>
                        </div>
                        <span id="bh_visits"></span>
                    </div>
                    <div class="d-inline-flex text-start">
                        <div class="me-2">
                            <h6 class="mb-0"><i class="fa fa-comments"></i> 13</h6>
                            <small>Chats</small>
                        </div>
                        <span id="bh_chats"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3">
        <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="card">
                    <div class="card-header text-center">  <h5 class="card-title">Change Password</h5></div>
                        <div class="card-body">
                          
                            <form action="{{route('admin.changePassworddata')}}" method="post">
							@csrf
							@method('PUT')

                                <div class="row">
                                  
                                            <div class="col-sm-12">
                                                <label>Current Password *</label>
                                                <input class="form-control" type="password" name="current-password" value="{{old('current-password')}}">
                                                <!-- <input type="text" class="form-control" name="current_password"> -->
                                                @error('current-password')
								<span class="text-danger">{{ $message }}</span>
								@enderror
                                            </div>
                                            <div class="col-sm-12">
                                                <label>New Password *</label>
                                                <input class="form-control" type="password" name="new-password" value="{{old('new-password')}}">
								@error('new-password')
								<span class="text-danger">{{ $message }}</span>
								@enderror
                                            </div>
                                            <div class="col-sm-12">
                                                <label>Confirm Password *</label>
                                                <input class="form-control" type="password" name="password_confirmation" value="{{old('password_confirmation')}}">
								@error('password_confirmation')
								<span class="text-danger">{{ $message }}</span>
								@enderror
                                            </div>

                                </div>
                                <div class="row m-2">
                                    <div class="col-md-12">
                                        <button class="mt-3 btn btn-primary  p-2 form-btn" id="videoBtn">SAVE <i
                                                class="fa fa-spin fa-spinner" id="videoSpin"
                                                style="display:none;"></i></button>
                                        <button class="mt-3 btn btn-danger  p-2 form-btn" id=""><a class="text-white"
                                                href="">Cancel</a></button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3"></div>

        </div>

    </div>
</div>
@endsection
@section('externaljs')
<script src="{{asset('assets/js/pages/profile.js')}}"></script>
@endsection