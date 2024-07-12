@extends('admin.layout.master')
@section('content')

<div id="main-content">
    <div class="container-fluid">

        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Role List</h2>
                    {{-- <ul class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.html">Lucid</a></li>
                        <li class="breadcrumb-item">Employee</li>
                        <li class="breadcrumb-item active">Departments List</li>
                    </ul> --}}
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">Employee List</h6>
                        <ul class="header-dropdown">
                            <li><button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#AddDepartments">Add New</button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <table id="emp_role" class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Department Name</th>
                                    <th>Department Head</th>
                                    <th>Total Employee</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01</td>
                                    <td>
                                        <h6 class="mb-0">Web Development</h6>
                                    </td>
                                    <td>John Smith</td>
                                    <td class="dropdown-toggle after-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                <div class="dropdown">
                                                <button type="button" class="btn mx-2 btn-simple btn-sm btn-danger btn-filter" data-target="blocked">Blocked</button><button class="btn btn-link dropdown-toggle after-none" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></button>
                                                    <ul class="dropdown-menu border-0 shadow p-3">
                                                        <li><a class="dropdown-item py-2 rounded" href="#">Action</a></li>
                                                        <li><a class="dropdown-item py-2 rounded" href="#">Another action</a></li>
                                                        <li><a class="dropdown-item py-2 rounded" href="#">Something else here</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>02</td>
                                    <td>
                                        <h6 class="mb-0">Marketing</h6>
                                    </td>
                                    <td>Maryam Amiri1</td>
                                     <td>
                                                <div class="dropdown">
                                                <button type="button" class="btn btn-simple btn-sm btn-success " data-target="approved">Approved</button><button class="btn btn-link dropdown-toggle after-none" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-angle-down"></i></button>
                                                    <ul class="dropdown-menu border-0 shadow p-3">
                                                        <li><a class="dropdown-item py-2 rounded" href="#">Action</a></li>
                                                        <li><a class="dropdown-item py-2 rounded" href="#">Another action</a></li>
                                                        <li><a class="dropdown-item py-2 rounded" href="#">Something else here</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                   
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>03</td>
                                    <td>
                                        <h6 class="mb-0">App Development</h6>
                                    </td>
                                    <td>Frank Camly</td>
                                    <td><div class='dropdown d-inline-block user-dropdown'>
                            <button type='button' class='btn text-dark waves-effect' id='page-header-user-dropdown' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                <div class='badge bg-success-subtle text-success font-size-12'><i class='fa fa-spin fa-spinner'></i>Active</div>
                                <i class='mdi mdi-chevron-down d-xl-inline-block'></i>
                            </button>
                            <div class='dropdown-menu dropdown-menu-end'>
                                <a class='dropdown-item' style='cursor:pointer;' > Inactive</a> 
                            </div>
                        </div></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>04</td>
                                    <td>
                                        <h6 class="mb-0">Support</h6>
                                    </td>
                                    <td>Gary Camara</td>
                                    <td>45</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>05</td>
                                    <td>
                                        <h6 class="mb-0">Accounts</h6>
                                    </td>
                                    <td>Fidel Tonn</td>
                                    <td>8</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

    <!-- Add model  Size -->
    <div class="modal fade" id="AddDepartments" tabindex="-1" aria-labelledby="AddDepartments" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">Add Role</h6>
                </div>
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col-12">
                            <input type="text" class="form-control" placeholder="Role Name">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!---Delet Model--->
    <div class="modal fade" id="ModalDelete" tabindex="-1" aria-labelledby="ModalDelete" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center pt-4">
                    <i class="fa fa-warning fa-4x text-warning"></i>
                    <p class="fs-3 my-3">Are you sure?</p>
                    <p class="mb-4">You will not be able to recover this imaginary file!</p>
                    <div class="mb-3">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes, delete it!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('externaljs')
<script>
    $(document).ready(function () {
        $('#emp_role')
        .dataTable({
            responsive: true,
        });
    });
</script>
@endsection
