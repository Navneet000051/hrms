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
            <form id="addForm" action="{{ route('admin.addcompany') }}" method="post" enctype="multipart/form-data">
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
<!-- Edit model  Size -->
<div class="modal fade" id="EditEmployeeModel" tabindex="-1" aria-labelledby="EditEmployeeModel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Edit Company</h6>
            </div>
            <form id="editForm" action="{{ route('admin.addcompany') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="">
                <div class="modal-body">
                    
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
<div class="modal fade" id="delete_modal" tabindex="-1" aria-labelledby="delete_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center pt-4">
                <i class="fa fa-warning fa-4x text-warning"></i>
                <h3>Delete Data</h3>
                <p>Are you sure want to delete?</p>
                <div class="mb-3">
                <form action="{{route('admin.DeleteData')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="Id" id="delId" />
                                            <input type="hidden" name="column" id="delColumn" />
                                            <input type="hidden" name="table" id="delTable" />
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
                    <button type="submit" class="btn btn-danger" >Yes, delete it!</button>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
@section('externaljs')

<script>
		function showEdit(id) {
			$('#EditEmployeeModel').modal("show");
			$('#EditEmployeeModel .modal-body').html("<center><i class= 'fa fa-2x fa-spin fa-spinner text-warning'></i></center>");

			// Use proper concatenation to include the id in the route
			$('#EditEmployeeModel .modal-body').load("{{ route('admin.editcompany', ':id') }}".replace(':id', id));
            
		}
	</script>
<script>
    $(document).ready(function() {
        $('#emp_role')
            .dataTable({
                responsive: true,
            });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
    // Form-validation *****************************
    $('.dropify').dropify();

    // Check if default file is set for thumbnail input
    var defaultlogo = $('.dropify').data('default-file');
    $('#addForm').validate({
        ignore: 'hidden',
        rules: {
            company_name: {
                required: true
            },
            address: {
                required: true
            },

            logo: { // Add validation rules for thumbnail
                required: !defaultlogo, // Make it required
            }
        },
        messages: {
            company_name: {
                required: "Please choose company name"
            },
            address: {
                required: "Please enter address"
            },

            logo: {
                required: "Please select logo",

            }
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            if (element.attr("name") == "userid" || "month") {
                error.addClass('text-danger');
                error.insertAfter(element.parent());
            } else {
                error.addClass('text-danger');
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
    // Custom validation for Summernote description

});
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