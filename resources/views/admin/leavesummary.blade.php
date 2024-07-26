@extends('admin.layout.master')
@section('content')

<div id="main-content">
    <div class="container-fluid">

        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Holidays</h2>
                    <!-- <ul class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.html">Lucid</a></li>
                        <li class="breadcrumb-item active">Holidays</li>
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

        <div class="row clearfix">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header">Holidays List</div>
                    <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered data-table dt-responsive nowrap" id="yajradb">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Leave</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Namrata Rai</td>
                                    <td>CL- 0/12 &emsp;  EL- 0/6  &emsp;  Medical- 0/6 &emsp; LWP- 0 &emsp; Marrige-0</td>
                                </tr>
                               
                            
                            </tbody>
                            </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
@section('externaljs')
<script>
    $(document).ready(function() {
        $('#holidays_list')
            .dataTable({
                responsive: true,
                columnDefs: [{
                    targets: [-1, -3],
                }]
            });
    });
</script>
@endsection