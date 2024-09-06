@extends('admin.layout.master')
@section('content')
<style>
    .dropify-wrapper {
        height: 120px !important;
    }

    .profile .dropify-wrapper {
        height: 200px !important;
    }
</style>
<div id="main-content">
    <div class="container-fluid">

        <div class="block-header py-lg-2 py-2">
            <div class="row g-3">

                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Add Employee</h2>

                </div>

            </div>
        </div>



        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="card-title">Employee List</h6>
                        <ul class="header-dropdown">
                            <li>
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.getemployee')}}" >Add New</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <table id="employee_List" class="table table-hover">
                            <thead class="thead-dark">
                               
                                <tr>

                                    <th>Sr. No.</th>
                                    <th>Name</th>
                                    <th>Employee ID</th>
                                    <th>Phone</th>
                                    <th>Join Date</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                             

                            </thead>
                            <tbody>
                            @forelse ($employees as $employee)
                                <tr>
                                    <td>8</td>
                                    <td>
                                        <h6 class="mb-0">{{$employee->name}}</h6>
                                       
                                    </td>
                                    <td><span>{{$employee->email}}</span></td>
                                    <td><span>{{$employee->mobile}}</span></td>
                                    <td>08 Mar, 2016</td>
                                    <td>Android Developer</td>
                                    <td>
                                        <a href="{{ route('admin.editemployee', ['id' =>encrypt($employee->id)])}}" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger" title="Delete" onclick="deleteData('id', '{{ $employee->id }}', '{{ $tablename }}')"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
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
                        <button type="submit" class="btn btn-danger">Yes, delete it!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('externaljs')

<script>
    $(document).ready(function() {
        $('#employee_List')
            .dataTable({
                responsive: true,
                columnDefs: [{
                    orderable: false,
                    targets: [0]
                }]
            });
    });
</script>
<script>
    $(document).ready(function() {
        $("#addmore").click(function() {
            var newRow = `
                <div class="row g-2 required_inp">
                    <div class="mb-3 col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Role <small class="text-danger">*</small></label>
                            <select class="form-select select3" aria-label="Default select example" name="role_id">
                                <option value="">Document Type</option>
                                <option value="highschool">High School</option>
                                <option value="intermediate">Intermediate</option>
                                <option value="graduation">Graduation</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 col-sm-11 col-lg-5">
                        <div class="form-group">
                            <label class="form-label">Domicile Certificate <small class="text-danger">*</small></label>
                            <input type="file" class="form-control" name="domicile">
                        </div>
                    </div>
                    <div class="mb-3 col-sm-1 col-lg-1 align-self-center">
                        <label class="form-label"></label>
                        <div class="form-group">
                            <a class="btn btn-sm btn-outline-danger inputRemove" title="Remove"><i class="fa fa-minus-circle"></i></a>
                        </div>
                    </div>
                </div>
            `;
            $("#req_input").append(newRow);
        });

        $('body').on('click', '.inputRemove', function() {
            $(this).closest('.required_inp').remove();
        });
    });
</script>


<script>
    $(document).ready(function() {

        $('#same_as_residential').on('change', function() {
            if ($(this).is(':checked')) {
                $('#permanent_country_id').val($('#country_id').val()).trigger('change');
                $('#permanent_state_id').val($('#state_id').val()).trigger('change');
                $('#permanent_city_id').val($('#city_id').val()).trigger('change');
                $('#permanent_pincode').val($('#pincode').val());
                $('#permanent_address').val($('#residential_address').val());
            } else {
                $('#permanent_country_id').val('').trigger('change');
                $('#permanent_state_id').val('').trigger('change');
                $('#permanent_city_id').val('').trigger('change');
                $('#permanent_pincode').val('');
                $('#permanent_address').val('');
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.select1').select2();
    });
    $(document).ready(function() {
        $('.select3').select2();
        $('.select4').select2();
    });
</script>
<!---Get State Data ---->
<script type="text/javascript">
    $(document).ready(function() {
        $('#country_id').change(function() {
            var countryId = $(this).val();
            loadStates(countryId, null); // Load states with the selected country ID
        });

        function loadStates(countryId, selectedStateId) {
            if (countryId) {
                $.ajax({
                    url: '{{ route("admin.getStates") }}',
                    type: 'GET',
                    data: {
                        country_id: countryId
                    },
                    success: function(data) {
                        $('#state_id').empty();
                        $('#state_id').append('<option value="">Choose State Name</option>');
                        $.each(data, function(key, value) {
                            $('#state_id').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('#state_id').empty();
                $('#state_id').append('<option value="">First Choose Country Name</option>');
            }
        }
    });
</script>

<!---Get City Data ---->
<script type="text/javascript">
    $(document).ready(function() {
        var stateId = $('#state_id').val();
        var cityId = "{{ !empty($editemployee->city_id) ? $editemployee->city_id : '' }}";

        if (stateId) {
            loadCities(stateId, cityId);
        }

        $('#state_id').change(function() {
            var stateId = $(this).val();
            loadCities(stateId, null);
        });

        function loadCities(stateId, selectedCityId) {
            if (stateId) {
                $.ajax({
                    url: '{{ route("admin.getCities") }}',
                    type: 'GET',
                    data: {
                        state_id: stateId
                    },
                    success: function(data) {
                        $('#city_id').empty();
                        $('#city_id').append('<option value="">Choose City Name</option>');
                        $.each(data, function(key, value) {
                            $('#city_id').append('<option value="' + key + '"' + (selectedCityId == key ? ' selected' : '') + '>' + value + '</option>');
                        });
                    }
                });
            } else {
                $('#city_id').empty();
                $('#city_id').append('<option value="">First Choose State Name</option>');
            }
        }
    });
</script>
<!---Get Permanent State Data ---->
<script type="text/javascript">
    $(document).ready(function() {
        var countryId = $('#permanent_country_id').val();
        var stateId = "{{ !empty($editemployee->permanent_state_id) ? $editemployee->permanent_state_id : '' }}";

        if (countryId) {
            loadCities(countryId, stateId);
        }

        $('#country_id').change(function() {
            var countryId = $(this).val();
            loadCities(countryId, null);
        });

        function loadCities(countryId, selectedStateId) {
            if (countryId) {
                $.ajax({
                    url: '{{ route("admin.getStates") }}',
                    type: 'GET',
                    data: {
                        country_id: countryId
                    },
                    success: function(data) {
                        $('#permanent_state_id').empty();
                        $('#permanent_state_id').append('<option value="">Choose State Name</option>');
                        $.each(data, function(key, value) {
                            $('#permanent_state_id').append('<option value="' + key + '"' + (selectedStateId == key ? ' selected' : '') + '>' + value + '</option>');
                        });
                    }
                });
            } else {
                $('#permanent_state_id').empty();
                $('#permanent_state_id').append('<option value="">First Choose Country Name</option>');
            }
        }
    });
</script>
<!---Get Permanent City Data ---->
<script type="text/javascript">
    $(document).ready(function() {
        var stateId = $('#state_id').val();
        var cityId = "{{ !empty($editemployee->city_id) ? $editemployee->city_id : '' }}";

        if (stateId) {
            loadCities(stateId, cityId);
        }

        $('#state_id').change(function() {
            var stateId = $(this).val();
            loadCities(stateId, null);
        });

        function loadCities(stateId, selectedCityId) {
            if (stateId) {
                $.ajax({
                    url: '{{ route("admin.getCities") }}',
                    type: 'GET',
                    data: {
                        state_id: stateId
                    },
                    success: function(data) {
                        $('#permanent_city_id').empty();
                        $('#permanent_city_id').append('<option value="">Choose City Name</option>');
                        $.each(data, function(key, value) {
                            $('#permanent_city_id').append('<option value="' + key + '"' + (selectedCityId == key ? ' selected' : '') + '>' + value + '</option>');
                        });
                    }
                });
            } else {
                $('#permanent_city_id').empty();
                $('#permanent_city_id').append('<option value="">First Choose State Name</option>');
            }
        }
    });
</script>
<!---Get Department Data ---->
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
                    data: {
                        company_id: companyId
                    },
                    success: function(data) {
                        $('#department_id').empty();
                        $('#department_id').append('<option value="">Choose Department Name</option>');
                        $.each(data, function(key, value) {
                            $('#department_id').append('<option value="' + key + '"' + (selectedDepartmentId == key ? ' selected' : '') + '>' + value + '</option>');
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
<!---Get Designation Data ---->
<script type="text/javascript">
    $(document).ready(function() {
        var departmentId = $('#department_id').val();
        var designationId = "{{ !empty($editdesignation->designation_id) ? $editdesignation->designation_id : '' }}";

        if (departmentId) {
            loadDesignation(departmentId, designationId);
        }

        $('#department_id').change(function() {
            var departmentId = $(this).val();
            loadDesignation(departmentId, null);
        });

        function loadDesignation(departmentId, selectedDesignationId) {
            if (departmentId) {
                $.ajax({
                    url: '{{ route("admin.getDesignations") }}',
                    type: 'GET',
                    data: {
                        department_id: departmentId
                    },
                    success: function(data) {
                        console.log(data); // Debugging: Check if data is being received
                        $('#designation_id').empty();
                        $('#designation_id').append('<option value="">Choose Designation Name</option>');
                        $.each(data, function(key, value) {
                            $('#designation_id').append('<option value="' + key + '"' + (selectedDesignationId == key ? ' selected' : '') + '>' + value + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', status, error); // Debugging: Log any errors
                    }
                });
            } else {
                $('#designation_id').empty();
                $('#designation_id').append('<option value="">First Choose Department Name</option>');
            }
        }
    });
</script>


@endsection
