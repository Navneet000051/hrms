@extends('admin.layout.master')
@section('content')
<style>
    .dropify-wrapper {
        height: 120px !important;
    }

    .profile .dropify-wrapper {
        height: 200px !important;
    }

    .btn-check:checked+.btn,
    :not(.btn-check)+.btn:active,
    .btn:first-child:active,
    .btn.active,
    .btn.show {
        color: var(--bs-btn-active-color);
        background-color: var(--bs-btn-active-bg);
        border-color: #fff;
    }

    .bg-success-subtle {
        background-color: #d2f1e8 !important;
    }

    .text-success {
        --bs-text-opacity: 1;
        color: rgba(28, 187, 140, 1) !important;
    }

    .badge {
        font-weight: 400;
        font-size: 12px !important;
    }

    .dropdown-item:hover,
    .dropdown-item:focus,
    .dropdown-item.active {
        background-color: var(--primary-color);
        color: #fff;
        border-radius: 50rem;
    }
</style>
<div id="main-content">
    <div class="container-fluid">

        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Company List</h2>

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
                        <h6 class="card-title">Company List</h6>
                        <ul class="header-dropdown">
                            <li><button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#EmployeeModel">Add New</button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered data-table dt-responsive nowrap" id="yajradb">
                                <thead id="sortable">
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Company Name</th>
                                        <th>Logo</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- <table id="emp_role" class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Company Name</th>
                                    <th>Address</th>
                                    <th>Logo</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                      
                            </tbody>
                        </table> -->
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Add model  Size -->
<div class="modal fade" id="EmployeeModel" tabindex="-1" aria-labelledby="EmployeeModel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Add Company</h6>
            </div>

            <form action="{{ route('admin.addcompany') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="">
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col-12">
                            <label class="form-label">Company Name <small class="text-danger">*</small></label>
                            <input type="text" class="form-control" name="company_name" placeholder="Company Name">
                            @error('company_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Company Address <small class="text-danger">*</small></label>
                            <textarea name="address" cols="30" rows="3" placeholder="Address *" class="form-control no-resize" required=""></textarea>
                            @error('address')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Company Logo <small class="text-danger">*</small></label>
                            <input type="file" id="dropify-event" class="dropify" data-default-file="" name="logo">
                            @error('logo')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" value="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>

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
    $(document).ready(function() {
        $('#emp_role')
            .dataTable({
                responsive: true,
            });
    });
</script>
<script>
    function openEditModal(encryptedId) {
        $.ajax({
            url: '{{ route("admin.editcompany", ["id" => "ENCRYPTED_ID"]) }}'.replace('ENCRYPTED_ID', encryptedId),
            type: 'GET',
            success: function(response) {
                // Assuming the response contains the company data
                if (response.success) {
                    // Populate the modal fields with the response data
                    $('input[name="company_name"]').val(response.data.company_name);
                    $('textarea[name="address"]').val(response.data.address);
                    $('input[name="id"]').val(response.data.id); // Set the hidden ID field
                    
                    // Set the logo preview
                    var logoUrl = '{{ asset("storage/") }}' + '/' + response.data.logo;
                    $('#dropify-event').attr('data-default-file', logoUrl).dropify();

                    // Open the modal
                    $('#EmployeeModel').modal('show');
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }
</script>

<script type="text/javascript">
    $(function() {

        var table = $('#yajradb').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.company') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'company_name',
                    name: 'company_name'
                },

                {
                    data: 'logo',
                    name: 'logo'
                },
                {
                    data: 'address',
                    name: 'address'
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