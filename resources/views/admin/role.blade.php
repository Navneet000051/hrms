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
        <!-- Add Role -->
        <div class="row clearfix pb-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                    @if(!empty($editrole))
                    <h6 class="card-title">Edit Role</h6>
                    <ul class="header-dropdown">
                            <li><a href="{{route('admin.role')}}" class="btn btn-primary">Add New</a></li>
                        </ul>
                        
                        @else
                        <h6 class="card-title">Add Role</h6>
                        @endif
                    </div>
                    <div class="card-body">
                        <form id="AddForm" action="{{ route('admin.addrole') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-2">
                             
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="{{ !empty($editrole) ? $editrole->id : '' }}">
                                        <label class="form-label">Role Name <small class="text-danger">*</small></label>
                                        <input type="text" class="form-control" placeholder="Role Name" name="role_name" value="{{ !empty($editrole->role_name) ? $editrole->role_name : old('role_name') }}">
                                        @error('role_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row m-2">
                                    <div class="col-md-12">
                                        <button class="mt-3 btn btn-primary form-btn" id="videoBtn" type="submit">SAVE <i class="fa fa-spin fa-spinner" id="videoSpin" style="display:none;"></i></button>
                                        <a class="text-white mt-3 btn btn-danger form-btn" href="{{ route('admin.role')}}">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">Role List</h6>
                        <ul class="header-dropdown">
                            <li><button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#AddDepartments">Add New</button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                            <table class="table table-bordered data-table dt-responsive nowrap" id="yajradb">
                                <thead id="sortable">
                                <tr>
                                    <th>#</th>
                                    <th>Role Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

    <!---Delet Model--->
    <div class="modal fade" id="delete_modal" tabindex="-1" aria-labelledby="delete_modal" aria-hidden="true">
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
    $(document).ready(function() {
        $('#AddForm').validate({
            ignore: ":hidden:not('.validate-hidden')",
            rules: {
                role_name: {
                    required: true,
                    remote: {
                        url: "{{ route('admin.checkRoleName') }}",
                        type: "post",
                        data: {
                            role_name: function() {
                                return $("input[name='role_name']").val();
                            },
                            id: function() {
                                return $("input[name='id']").val(); // Assuming you have an input field for the role ID in your form
                            },
                            _token: "{{ csrf_token() }}"
                        },
                        dataFilter: function(response) {
                            var data = JSON.parse(response);
                            if (data.isDuplicate) {
                                return JSON.stringify("Role name already exists");
                            } else {
                                return true;
                            }
                        }
                    }
                },
            },
            messages: {
                role_name: {
                    required: "Please enter the role",
                    remote: "Role name already exists"
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('text-danger');
                if (element.attr("name") == "nametype") {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element) {
                $(element).addClass('is-invalid mb-1');
            },
            unhighlight: function(element) {
                $(element).removeClass('is-invalid mb-1');
            }
        });

    });
</script>

<script type="text/javascript">
    $(function() {

        var table = $('#yajradb').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.role') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'role_name',
                    name: 'role_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

    });
</script>
@endsection
