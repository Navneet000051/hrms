@extends('admin.layout.master')
@section('content')

<div id="main-content">
    <div class="container-fluid">

        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>
                        Leave Request</h2>

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
        <!----Add Form--->

        <div class="row clearfix pb-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        @if (!empty($editleavequota))
                        <h6 class="card-title">Edit Leave Quota</h6>
                        <ul class="header-dropdown">
                            <li><a href="{{ route('admin.leavequota') }}" class="btn btn-primary">Add New</a></li>
                        </ul>
                        @else
                        <h6 class="card-title">Add Leave Quota</h6>
                        @endif
                    </div>
                    <div class="card-body">
                        <form id="addForm" action="{{ route('admin.addleave') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-2">
                                <input type="hidden" name="id" value="{{ $editleavequota->id ?? '' }}">
                                <div class="col-md-5 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Leave Duration <small class="text-danger">*</small></label>
                                        <select class="form-select select2" aria-label="Default select example" id="duration" name="duration">
                                            <option value="">Choose Duration</option>
                                            <option value="1">Single Day</option>
                                            <option value="2">Multiple Days</option>
                                            <option value="3">Half Day</option>
                                        </select>
                                        @error('duration')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Leave Type <small class="text-danger">*</small></label>
                                        <select class="form-select select2" aria-label="Default select example" id="leavetype" name="leavetype">
                                            <option>Choose Leave Type</option>
                                            @foreach($leavequotas as $leavequota)
                                            <option value="{{ $leavequota->id }}">{{ $leavequota->leavetype }}</option>
                                            @endforeach
                                        </select>
                                        @error('leavetype')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Sandwich Leave <small class="text-danger">*</small></label>
                                        <div class="d-flex">
                                            <div class="form-check">
                                                <input class="form-check-input ps-2" id="flexCheckDefault6" type="checkbox" name="checkbox" required="" data-parsley-errors-container="#error-checkbox">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12" id="fromdate">
                                            <div class="form-group">
                                                <label class="form-label">From <small class="text-danger">*</small></label>
                                                <input type="text" data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="dd/mm/yyyy" data-date-format="dd/mm/yyyy" name="fromdate">
                                                @error('fromdate')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 pt-2 d-none" id="todate">
                                            <div class="form-group">
                                                <label class="form-label">To <small class="text-danger">*</small></label>
                                                <input type="text" data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="dd/mm/yyyy" data-date-format="dd/mm/yyyy" name="todate">
                                                @error('todate')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 pt-2 d-none" id="shift">
                                            <div class="form-group">
                                                <label class="form-label">Shift <small class="text-danger">*</small></label>
                                                <select class="form-select select2" aria-label="Default select example" id="shift" name="shift">
                                                    <option value="">Choose Shift</option>
                                                    <option value="1">Morning Shift</option>
                                                    <option value="2">Evening Shift</option>
                                                </select>
                                                @error('shift')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12" id="reason">
                                    <div class="form-group">
                                        <label class="form-label">Reason <small class="text-danger">*</small></label>
                                        <textarea rows="4" class="form-control no-resize" placeholder="Leave Reason *" name="reason"></textarea>
                                        @error('reason')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12 d-none" id="document">
                                    <div class="form-group">
                                        <label class="form-label">Document <small class="text-danger">*</small></label>
                                        <input type="file" class="dropify" name="document">
                                        @error('document')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row m-2">
                                    <div class="col-md-12">
                                        <button class="mt-3 btn btn-primary form-btn" id="videoBtn" type="submit">SAVE
                                            <i class="fa fa-spin fa-spinner" id="videoSpin" style="display:none;"></i></button>
                                        <a class="text-white mt-3 btn btn-danger form-btn" href="{{ route('admin.leave') }}">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!----Add Form End Here--->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="card-title">Employee List</h6>
                        <ul class="header-dropdown">
                            <li>
                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Leave</button>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <table id="emp_leave" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Employee ID</th>
                                    <th>Leave Type</th>
                                    <th>Date</th>
                                    <th>Reason</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="width45">1</td>
                                    <td>
                                        <h6 class="mb-0">Marshall Nichols</h6>
                                    </td>
                                    <td><span>LA-0215</span></td>
                                    <td><span>Casual Leave</span></td>
                                    <td>24 July, 2021 to 26 July, 2021</td>
                                    <td>Going to Family Function</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-success"><i class="fa fa-check"></i></button>
                                        <button type="button" class="btn btn-sm btn-outline-danger"><i class="fa fa-ban"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="width45">2</td>
                                    <td>
                                        <h6 class="mb-0">Maryam Amiri</h6>
                                    </td>
                                    <td><span>LA-0215</span></td>
                                    <td><span>Casual Leave</span></td>
                                    <td>21 July, 2021 to 26 July, 2021</td>
                                    <td>Attend Birthday party</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-success"><i class="fa fa-check"></i></button>
                                        <button type="button" class="btn btn-sm btn-outline-danger"><i class="fa fa-ban"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="width45">3</td>
                                    <td>
                                        <h6 class="mb-0">Gary Camara</h6>
                                    </td>
                                    <td><span>LA-0218</span></td>
                                    <td><span>Medical Leave</span></td>
                                    <td>20 July, 2021 to 26 July, 2021</td>
                                    <td>Going to Development</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-success"><i class="fa fa-check"></i></button>
                                        <button type="button" class="btn btn-sm btn-outline-danger"><i class="fa fa-ban"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="width45">4</td>
                                    <td>
                                        <h6 class="mb-0">Frank Camly</h6>
                                    </td>
                                    <td><span>LA-0211</span></td>
                                    <td><span>Casual Leave</span></td>
                                    <td>11 Aug, 2021 to 21 Aug, 2021</td>
                                    <td>Going to Holiday</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-success"><i class="fa fa-check"></i></button>
                                        <button type="button" class="btn btn-sm btn-outline-danger"><i class="fa fa-ban"></i></button>
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
<div class="modal fade" id="exampleModal" aria-labelledby="exampleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Add Leave</h6>
            </div>
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col-lg-6 col-sm-12">

                        <label class="form-label">Duration <small class="text-danger">*</small></label>
                        <select class="form-select select2" aria-label="Default select example">
                            <option value="">Choose Duration</option>
                            <option value="1">Single Day</option>
                            <option value="2">Multiple Days</option>
                            <option value="3">Half Day</option>
                        </select>
                    </div>
                    <div class="col-lg-6 col-sm-12">

                        <label class="form-label">Leave Category <small class="text-danger">*</small></label>
                        <select class="form-select select2" aria-label="Default select example">
                            <option>Choose Leave Type</option>
                            <option>Casual Leave (12)</option>
                            <option>Medical Leave</option>
                            <option>Maternity Leave</option>
                        </select>
                    </div>
                    <div class="col-6" id="fromdate">
                        <label class="form-label">From <small class="text-danger">*</small></label>
                        <input type="text" data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="dd/mm/yyyy" data-date-format="dd/mm/yyyy">
                    </div>

                    <div class="col-6 d-none" id="todate">
                        <label class="form-label">To <small class="text-danger">*</small></label>
                        <input type="text" data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="dd/mm/yyyy" data-date-format="dd/mm/yyyy">
                    </div>
                    <div class="col-12" id="reason">
                        <textarea rows="6" class="form-control no-resize" placeholder="Leave Reason *"></textarea>
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
                        <button type="submit" class="btn btn-danger">Yes, delete it!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('externaljs')
<!-- <script>
        $(document).ready(function() {
            $(".form-select").select2({
                dropdownParent: $("#exampleModal")
            });
        });
    </script> -->
<script>
    $(document).ready(function() {
        var extensions = {
            "sFilter": "dataTables_filter custom_filter_class"
        }
        $.extend($.fn.dataTableExt.oStdClasses, extensions);
        $('#emp_leave')
            .dataTable({
                responsive: true,
            });
    });
</script>
<script>
    $(document).ready(function() {
        // Initially hide the fields
        $('#todate').addClass('d-none');
        $('#shift').addClass('d-none');
        $('#document').addClass('d-none');

        // Show/hide fields based on duration selection
        $('#duration').change(function() {
            var duration = $(this).val();
            if (duration == '2') { // Multiple Days
                $('#todate').removeClass('d-none');
                $('#shift').addClass('d-none');
            } else if (duration == '3') { // Half Day
                $('#shift').removeClass('d-none');
                $('#todate').addClass('d-none');
            } else { // Single Day or empty
                $('#todate').addClass('d-none');
                $('#shift').addClass('d-none');
            }
        });

        // Show/hide document field based on leave type selection
        $('#leavetype').change(function() {
            var leaveType = $(this).find('option:selected').text().toLowerCase();
            if (leaveType.includes('medical')) { // Check if the selected leave type includes 'medical'
                $('#document').removeClass('d-none');
            } else {
                $('#document').addClass('d-none');
            }
        });

        // If editing, set the initial state based on the existing data
        var initialDuration = $('#duration').val();
        if (initialDuration == '2') {
            $('#todate').removeClass('d-none');
        } else if (initialDuration == '3') {
            $('#shift').removeClass('d-none');
        }

        var initialLeaveType = $('#leavetype').find('option:selected').text().toLowerCase();
        if (initialLeaveType.includes('medical')) {
            $('#document').removeClass('d-none');
        }
    });
</script>
@endsection