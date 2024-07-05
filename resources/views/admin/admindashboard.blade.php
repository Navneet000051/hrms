@extends('admin.layout.master')
@section('content')
        <div id="main-content">
            <div class="container-fluid">

                <div class="block-header py-lg-4 py-3">
                    <div class="row g-3">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Admin Dashboard</h2>
                            <!-- <ul class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="index.html">Lucid</a></li>
                                <li class="breadcrumb-item">File Manager</li>
                                <li class="breadcrumb-item active">Dashboard</li>
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

                <div class="row g-2 mb-2">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <a class="card p-lg-4 p-3 folder text-muted" href="javascript:void(0);">
                            <h6 class="mb-0"><i class="fa fa-folder me-2"></i>Lucid Project</h6>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <a class="card p-lg-4 p-3 folder text-primary" href="javascript:void(0);">
                            <h6 class="mb-0"><i class="fa fa-folder me-2"></i>Themeforest</h6>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <a class="card p-lg-4 p-3 folder text-muted" href="javascript:void(0);">
                            <h6 class="mb-0"><i class="fa fa-folder me-2"></i>New Website</h6>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <a class="card p-lg-4 p-3 folder text-danger" href="javascript:void(0);">
                            <h6 class="mb-0"><i class="fa fa-folder me-2"></i>My Folder</h6>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-5 col-sm-12">
                        <div class="card mb-2">
                            <div class="card-body">
                                <h4>1TB <i class="fa fa-server float-end"></i></h4>
                                <p class="mb-0">Storage <small class="text-muted float-end">of 1Tb</small></p>
                                <div class="progress mb-0">
                                    <div class="progress-bar progress-bar-striped bg-warning" data-transitiongoal="43" aria-valuenow="43" style="width: 43%;">43%</div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-body">
                                <h6>2GB</h6>
                                <p class="mb-0">Documents <small class="text-muted float-end">of 1Tb</small></p>
                            </div>
                            <div class="progress mb-0" style="height: 5px;">
                                <div class="progress-bar bg-info" data-transitiongoal="18" aria-valuenow="18" style="width: 18%;"></div>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-body">
                                <h6>10GB</h6>
                                <p class="mb-0">Media <small class="text-muted float-end">of 1Tb</small></p>
                            </div>
                            <div class="progress mb-0" style="height: 5px;">
                                <div class="progress-bar bg-primary" data-transitiongoal="34" aria-valuenow="34" style="width: 34%;"></div>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-body">
                                <h6>20GB</h6>
                                <p class="mb-0">Images <small class="text-muted float-end">of 1Tb</small></p>
                            </div>
                            <div class="progress mb-0" style="height: 5px;">
                                <div class="progress-bar bg-success" data-transitiongoal="47" aria-valuenow="47" style="width: 47%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-7 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title">File Reports</h6>
                            </div>
                            <div class="card-body">
                                <div id="file_reports"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endsection
     