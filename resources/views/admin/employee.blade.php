@extends('admin.layout.master')
@section('content')
<style>
    .dropify-wrapper{
        height:120px !important;
    }
    .profile .dropify-wrapper{
        height:200px !important;
    }
</style>
<div id="main-content">
    <div class="container-fluid">

        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">

                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Employee List</h2>

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
        <div class="row g-3 pb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">Add Employee</h6>

                    </div>
                    <div class="card-body">
                        <form id="wizard_with_validation" method="POST">

                            <h3>Personal Information</h3>
                            <fieldset>
                                <div class="row g-2">
                              
                                    <div class="mb-3 col-sm-12 col-lg-4">
                                        <label class="form-label">Employee ID <small class="text-danger">*</small></label>
                                        <input type="number" name="surname" placeholder="Employee ID *" class="form-control" required="">
                                    </div>
                                    <div class="mb-3 col-sm-12 col-lg-4">
                                        <label class="form-label">First Name <small class="text-danger">*</small></label>
                                        <input type="text" name="name" placeholder="First Name *" class="form-control" required="">
                                    </div>
                                    <div class="mb-3 col-sm-12 col-lg-4">
                                        <label class="form-label">Last Name <small class="text-danger">*</small></label>
                                        <input type="text" name="surname" placeholder="Last Name *" class="form-control" required="">
                                    </div>
                                    <div class="mb-3 col-sm-12 col-lg-4">
                                        <label class="form-label">Email ID <small class="text-danger">*</small></label>
                                        <input type="email" name="email" placeholder="Email ID  *" class="form-control" required="">
                                    </div>
                                    <div class="mb-3  col-sm-12 col-lg-4">
                                        <label class="form-label">Password<small class="text-danger">*</small></label>
                                        <input type="password" class="form-control" placeholder="Password *" name="password" id="password" required="">
                                    </div>
                                    <div class="mb-3  col-sm-12 col-lg-4">
                                        <label class="form-label">Date of Birth <small class="text-danger">*</small></label>
                                        <input type="text" data-provide="datepicker" data-date-autoclose="true"
                                        class="form-control" placeholder="dd/mm/yyyy" data-date-format="dd/mm/yyyy">
                                    </div>
                                    <div class="mb-3 col-sm-12 col-lg-4">
                                        <label class="form-label">Join Date <small class="text-danger">*</small></label>
                                        <input type="text" data-provide="datepicker" data-date-autoclose="true"
                                        class="form-control" placeholder="dd/mm/yyyy" data-date-format="dd/mm/yyyy">
                                    </div>
                                  
                                    <div class="mb-3 col-sm-12 col-lg-4">
                                        <label class="form-label">Role <small class="text-danger">*</small></label>
                                        <input type="number" name="surname" placeholder="Role *" class="form-control" required="">
                                    </div>

                                    <div class="mb-3 col-sm-12 col-lg-4">
                                        <label class="form-label">Designation <small class="text-danger">*</small></label>
                                        <input type="text" name="designation" placeholder="designation *" class="form-control" required="">
                                    </div>


                                </div>
                            </fieldset>
                            <h3>Contact Information</h3>
                            <fieldset>
                                <div class="row g-2">
                                <div class="mb-3 col-sm-12 col-lg-6">
                                        <label class="form-label">Mobile Number <small class="text-danger">*</small></label>
                                        <input type="number" name="name" placeholder="Mobile Number *" class="form-control" required="">
                                    </div>
                                    <div class="mb-3 col-sm-12 col-lg-6">
                                        <label class="form-label">Alternate Number <small class="text-danger">*</small></label>
                                        <input type="number" name="surname" placeholder="Alternate Number *" class="form-control" required="">
                                    </div>
                                    <div class="mb-3 col-sm-12 col-lg-6">
                                        <label class="form-label">Residential Address <small class="text-danger">*</small></label>
                                        <textarea name="address" cols="30" rows="3" placeholder="Address *" class="form-control no-resize" required=""></textarea>
                                    </div>
                                    <div class="mb-3 col-sm-12 col-lg-6">
                                        <label class="form-label">Permanent Address <small class="text-danger">*</small></label>
                                        <textarea name="address" cols="30" rows="3" placeholder="Address *" class="form-control no-resize" required=""></textarea>
                                    </div>
                                </div>
                            </fieldset>
                            <h3>Profile Information</h3>
                            <fieldset>
                       
                            <div class="mb-3 profile">
                                    <input type="file" id="dropify-event">
                                </div>
                            </fieldset>
                          
                            <h3>Account Information</h3>
                            <fieldset>
                                <div class="row g-2">
                                    <div class="mb-3  col-sm-12 col-lg-4">
                                        <label class="form-label">Bank Name <small class="text-danger">*</small></label>
                                        <input type="text" class="form-control" placeholder="Bank Name  *" name="username" required="">
                                    </div>

                                    <div class="mb-3  col-sm-12 col-lg-4">
                                        <label class="form-label">Account Number <small class="text-danger">*</small></label>
                                        <input type="text" class="form-control" placeholder="Account Number*" name="confirm" required="">
                                    </div>
                                    <div class="mb-3  col-sm-12 col-lg-4">
                                        <label class="form-label">IFSC code <small class="text-danger">*</small></label>
                                        <input type="text" class="form-control" placeholder="IFSC code*" name="confirm" required="">
                                    </div>
                                    <div class="mb-3  col-sm-12 col-lg-4">
                                        <label class="form-label">Bank Address <small class="text-danger">*</small></label>
                                        <textarea name="address" placeholder=" Bank Address *" class="form-control no-resize" required="" style="height:120px !important;"></textarea>
                                    </div>
                                    <div class="mb-3  col-sm-12 col-lg-4">
                                        <label class="form-label">Document1 <small class="text-danger">*</small></label>
                                        <input type="file" class="dropify">
                                    </div>
                                    <div class="mb-3  col-sm-12 col-lg-4">
                                        <label class="form-label">Document2 <small class="text-danger">*</small></label>
                                        <input type="file" class="dropify" >
                                    </div>

                                </div>
                            </fieldset>
                      
                        </form>
                    </div>
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
                                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#addEmployee">Add New</button>
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
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <h6 class="mb-0">Marshall Nichols</h6>
                                        <span>marshall-n@gmail.com</span>
                                    </td>
                                    <td><span>LA-0215</span></td>
                                    <td><span>+ 264-625-2583</span></td>
                                    <td>24 Jun, 2015</td>
                                    <td>Web Designer</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <h6 class="mb-0">Susie Willis</h6>
                                        <span>sussie-w@gmail.com</span>
                                    </td>
                                    <td><span>LA-0216</span></td>
                                    <td><span>+ 264-625-2583</span></td>
                                    <td>28 Jun, 2015</td>
                                    <td>Web Developer</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <h6 class="mb-0">Debra Stewart</h6>
                                        <span>debra@gmail.com</span>
                                    </td>
                                    <td><span>LA-0218</span></td>
                                    <td><span>+ 264-625-2583</span></td>
                                    <td>21 July, 2015</td>
                                    <td>Web Developer</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
                                <tr>

                                    <td>4 </td>
                                    <td>
                                        <h6 class="mb-0">Francisco Vasquez</h6>
                                        <span>francis-v@gmail.com</span>
                                    </td>
                                    <td><span>LA-0222</span></td>
                                    <td><span>+ 264-625-2583</span></td>
                                    <td>18 Jan, 2016</td>
                                    <td>Team Leader</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>
                                        <h6 class="mb-0">Jane Hunt</h6>
                                        <span>jane-hunt@gmail.com</span>
                                    </td>
                                    <td><span>LA-0232</span></td>
                                    <td><span>+ 264-625-2583</span></td>
                                    <td>08 Mar, 2016</td>
                                    <td>Android Developer</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6 </td>
                                    <td>
                                        <h6 class="mb-0">Darryl Day</h6>
                                        <span>darryl.day@gmail.com</span>
                                    </td>
                                    <td><span>LA-0233</span></td>
                                    <td><span>+ 264-625-2583</span></td>
                                    <td>13 Nov, 2016</td>
                                    <td>IOS Developer</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>7 </td>
                                    <td>
                                        <h6 class="mb-0">Marshall Nichols</h6>
                                        <span>marshall-n@gmail.com</span>
                                    </td>
                                    <td><span>LA-0215</span></td>
                                    <td><span>+ 264-625-2583</span></td>
                                    <td>24 Jun, 2015</td>
                                    <td>Web Designer</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>
                                        <h6 class="mb-0">Jane Hunt</h6>
                                        <span>jane-hunt@gmail.com</span>
                                    </td>
                                    <td><span>LA-0232</span></td>
                                    <td><span>+ 264-625-2583</span></td>
                                    <td>08 Mar, 2016</td>
                                    <td>Android Developer</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="fa fa-trash-o"></i></button>
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
<div class="modal fade" id="addEmployee" tabindex="-1" aria-labelledby="addEmployee" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Add Contact</h5>
            </div>
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Name">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Email ID">
                    </div>
                    <div class="col-12">
                        <input type="number" class="form-control" placeholder="Phone Number">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Employee ID">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Join Date">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Role">
                    </div>
                    <div class="col-12">
                        <input type="file" class="form-control-file" aria-describedby="fileHelp">
                        <small id="fileHelp" class="form-text text-muted d-block">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                        <hr>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="Facebook">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="Twitter">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="Linkedin">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="instagram">
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
@endsection