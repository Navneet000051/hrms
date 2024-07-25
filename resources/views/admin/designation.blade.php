@extends('admin.layout.master')
@section('content')

<div id="main-content">
    <div class="container-fluid">

        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Designation List</h2>

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

        <div class="row clearfix pb-4">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                
                @if (!empty($editdesignation))
                        <h6 class="card-title">Edit Designation</h6>
                        <ul class="header-dropdown">
                            <li><a href="{{ route('admin.designation') }}" class="btn btn-primary">Add New</a></li>
                        </ul>
                        @else
                        <h6 class="card-title">Designation</h6>
                @endif
            </div>
            <div class="card-body">
                <form id="addForm" action="{{ route('admin.adddesignation') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ !empty($editdesignation->id) ? $editdesignation->id : '' }}">
                    <div class="row g-2">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Company Name <small class="text-danger">*</small></label>
                                <select id="company_id" class="form-select select2" aria-label="Default select example" name="company_id">
                                    <option value="">Choose Company Name</option>
                                    @foreach($companies as $company)
                                    <option value="{{ $company->id }}" @if(!empty($editdesignation) && $editdesignation->company_id == $company->id) selected @endif> {{ $company->company_name }} </option>
                                    @endforeach()
                                </select>
                                @error('company_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Department Name <small class="text-danger">*</small></label>
                                <select id="department_id" class="form-select select2" aria-label="Default select example" name="department_id">
                                    <option value="">First Choose Company Name</option>
                                </select>
                                @error('department_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Designation Name <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" placeholder="Designation Name" name="designation_name" value="{{ !empty($editdesignation) ? $editdesignation->designation_name : old('designation_name') }}">
                                @error('designation_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row m-2">
                            <div class="col-md-12">
                                <button class="mt-3 btn btn-primary form-btn" id="videoBtn" type="submit">SAVE <i class="fa fa-spin fa-spinner" id="videoSpin" style="display:none;"></i></button>
                                <a class="text-white mt-3 btn btn-danger form-btn" href="{{ route('admin.designation')}}">Cancel</a>
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
                        <h6 class="card-title">Designation List</h6>
                        <!-- <ul class="header-dropdown">
                            <li><button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#AddDepartments">Add New</button></li>
                        </ul> -->
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                            <table class="table table-bordered data-table dt-responsive nowrap" id="yajradb">
                                <thead id="sortable">
                                <tr>
                                    <th>SR. No.</th>
                                    <th>Company Name</th>
                                    <th>Department Name</th>
                                    <th>Designation Name</th>
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
<script type="text/javascript">
    $(document).ready(function() {
    // Form-validation *****************************
    $('.dropify').dropify();
    $('#addForm').validate({
        ignore: 'hidden',
        rules: {
            company_id: {
                required: true
            },
            department_id: {
                required: true
            },
            designation_name: {
                required: true
            },

        },
        messages: {
            company_id: {
                required: "Please choose company name"
            },
            department_id: {
                required: "Please choose department name"
            },
            designation_name: {
                required: "Please choose designation name"
            },

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
$(document).ready(function() {
    var companyId = $('#company_id').val();
    var departmentId = "{{ !empty($editdesignation->department_id) ? $editdesignation->department_id : '' }}";

    if (companyId) {
        loadDepartments(companyId, departmentId);
    }

    $('#company_id').change(function() {
        var companyId = $(this).val();
        loadDepartments(companyId, null);
    });

    function loadDepartments(companyId, selectedDepartmentId) {
        if (companyId) {
            $.ajax({
                url: '{{ route("admin.getDepartments") }}',
                type: 'GET',
                data: { company_id: companyId },
                success: function(data) {
                    $('#department_id').empty();
                    $('#department_id').append('<option value="">Choose Department Name</option>');
                    $.each(data, function(key, value) {
                        $('#department_id').append('<option value="'+ key +'"' + (selectedDepartmentId == key ? ' selected' : '') + '>'+ value +'</option>');
                    });
                }
            });
        } else {
            $('#department_id').empty();
            $('#department_id').append('<option value="">First Choose Company Name</option>');
        }
    }
});

</script>

<script type="text/javascript">
    $(function() {

        var table = $('#yajradb').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.designation') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'company_name',
                    name: 'company_name'
                },

                {
                    data: 'department_name',
                    name: 'department_name'
                },

                {
                    data: 'designation_name',
                    name: 'designation_name'
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
