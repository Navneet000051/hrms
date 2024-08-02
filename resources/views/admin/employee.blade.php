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
                                        <div class="form-group">
                                            <label class="form-label">Employee ID <small class="text-danger">*</small></label>
                                            <input type="number" name="emp_id" placeholder="Employee ID *" class="form-control" required="">
                                            @error('emp_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">First Name <small class="text-danger">*</small></label>
                                            <input type="text" name="name" placeholder="First Name *" class="form-control" required="">
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="mb-3 col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Last Name <small class="text-danger">*</small></label>
                                            <input type="text" name="lastname" placeholder="Last Name *" class="form-control" required="">
                                            @error('lastname')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Email ID <small class="text-danger">*</small></label>
                                            <input type="email" name="email" placeholder="Email ID  *" class="form-control" required="">
                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3  col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Password<small class="text-danger">*</small></label>
                                            <input type="password" class="form-control" placeholder="Password *" name="password" id="password" required="">
                                            @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3  col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Date of Birth <small class="text-danger">*</small></label>
                                            <input type="text" data-provide="datepicker" data-date-autoclose="true" class="form-control" name="dob" placeholder="dd/mm/yyyy" data-date-format="dd/mm/yyyy">

                                            @error('dob')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 col-sm-12 col-lg-4">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label">State <small class="text-danger">*</small></label>
                                                    <select class="form-select select1" aria-label="Default select example" name="gender">
                                                        <option selected>Choose Gender</option>

                                                        <option value="m">Male</option>
                                                        <option value="f">Female</option>
                                                        <option value="o">Other</option>

                                                    </select>
                                                    @error('gender')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">State <small class="text-danger">*</small></label>
                                                    <select class="form-select select1" aria-label="Default select example" name="maritalstatus">
                                                        <option selected>Marital Status</option>

                                                        <option value="">Married</option>
                                                        <option value="">Unarried</option>

                                                    </select>
                                                    @error('maritalstatus')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-sm-12 col-lg-4">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label">Mobile Number <small class="text-danger">*</small></label>
                                                    <input type="number" name="mobile" placeholder="Mobile Number *" class="form-control" required="">
                                                    @error('mobile')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">Alternate Number <small class="text-danger">*</small></label>
                                                    <input type="number" name="alternatemobile" placeholder="Alternate Number *" class="form-control" required="">

                                                    @error('alternatemobile')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Profile <small class="text-danger">*</small></label>
                                            <input type="file" id="dropify-event" class="dropify" name="icon">
                                            @error('icon')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                </div>
                            </fieldset>
                            <h3>Address Information</h3>
                            <fieldset>
    <div class="row g-2">
        <h6 class="card-title">Residential Address</h6>
        <div class="mb-3 col-sm-12 col-lg-3">
            <div class="form-group">
                <label class="form-label">Country <small class="text-danger">*</small></label>
                <select class="form-select select1" aria-label="Default select example" name="country" id="country_id">
                    <option selected>Choose Country</option>
                    @foreach($countries as $country)
                    <option value="{{ $country->id }}" @if(!empty($editemployee) && $editemployee->country_id == $country->id) selected @endif>{{ $country->name }}</option>
                    @endforeach
                </select>
                @error('country')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 col-sm-12 col-lg-3">
            <div class="form-group">
                <label class="form-label">State <small class="text-danger">*</small></label>
                <select class="form-select select1" aria-label="Default select example" name="state" id="state_id">
                    <option selected>Choose Country First</option>
                </select>
                @error('state')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 col-sm-12 col-lg-3">
            <div class="form-group">
                <label class="form-label">City <small class="text-danger">*</small></label>
                <select class="form-select select1" aria-label="Default select example" name="city" id="city_id">
                    <option selected>Choose State First</option>
                </select>
                @error('city')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 col-sm-12 col-lg-3">
            <div class="form-group">
                <label class="form-label">Pincode <small class="text-danger">*</small></label>
                <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pincode">
                @error('pincode')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 col-sm-12 col-lg-12">
            <div class="form-group">
                <label class="form-label">Residential Address <small class="text-danger">*</small></label>
                <textarea name="address" id="residential_address" cols="30" rows="3" placeholder="Address *" class="form-control no-resize" required></textarea>
            </div>
        </div>
        <h6 class="card-title">Permanent Address</h6>
        <div class="col-sm-12">
            <div class="form-group">
                <div class="d-flex">
                    <div class="form-check">
                        <input class="form-check-input ps-2" id="same_as_residential" type="checkbox" name="checkbox" data-parsley-errors-container="#error-checkbox">
                        <label class="form-label">Same as residential address <small class="text-danger">*</small></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3 col-sm-12 col-lg-3">
            <div class="form-group">
                <label class="form-label">Country <small class="text-danger">*</small></label>
                <select class="form-select select1" aria-label="Default select example" name="permanent_country" id="permanent_country_id">
                    <option selected>Choose Country</option>
                    @foreach($countries as $country)
                    <option value="{{ $country->id }}" @if(!empty($editemployee) && $editemployee->country_id == $country->id) selected @endif>{{ $country->name }}</option>
                    @endforeach
                </select>
                @error('permanent_country')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 col-sm-12 col-lg-3">
            <div class="form-group">
                <label class="form-label">State <small class="text-danger">*</small></label>
                <select class="form-select select1" aria-label="Default select example" name="permanent_state" id="permanent_state_id">
                    <option selected>Choose Country First</option>
                </select>
                @error('permanent_state')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 col-sm-12 col-lg-3">
            <div class="form-group">
                <label class="form-label">City <small class="text-danger">*</small></label>
                <select class="form-select select1" aria-label="Default select example" name="permanent_city" id="permanent_city_id">
                    <option selected>Choose State First</option>
                </select>
                @error('permanent_city')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 col-sm-12 col-lg-3">
            <div class="form-group">
                <label class="form-label">Pincode <small class="text-danger">*</small></label>
                <input type="text" class="form-control" name="permanent_pincode" id="permanent_pincode" placeholder="Pincode">
                @error('permanent_pincode')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 col-sm-12 col-lg-12">
            <div class="form-group">
                <label class="form-label">Permanent Address <small class="text-danger">*</small></label>
                <textarea name="permanent_address" id="permanent_address" cols="30" rows="3" placeholder="Address *" class="form-control no-resize" required></textarea>
            </div>
        </div>
    </div>
</fieldset>
                            <h3>Company Information</h3>
                            <fieldset>
                                <div class="row g-2">
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Company Name <small class="text-danger">*</small></label>
                                            <select id="company_id" class="form-select select1" aria-label="Default select example" name="company_id">
                                                <option value="">Choose Company Name</option>
                                                @foreach($companies as $company)
                                                <option value="{{ $company->id }}" @if(!empty($editemployee) && $editemployee->company_id == $company->id) selected @endif> {{ $company->company_name }} </option>
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
                                            <select id="department_id" class="form-select select1" aria-label="Default select example" name="department_id">
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
                                            <select id="designation_id" class="form-select select1" aria-label="Default select example" name="designation_id">
                                                <option value="">First Choose Department Name</option>
                                            </select>
                                             @error('designation_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 col-sm-12 col-lg-3">
                                        <div class="form-group">
                                            <label class="form-label">Join Date <small class="text-danger">*</small></label>
                                            <input type="text" data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="dd/mm/yyyy" data-date-format="dd/mm/yyyy" name="joindate">
                                            @error('joindate')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 col-sm-12 col-lg-3">
                                        <div class="form-group">
                                            <label class="form-label">Confirmation Date <small class="text-danger">*</small></label>
                                            <input type="text" data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="dd/mm/yyyy" data-date-format="dd/mm/yyyy" name="confiramtiondate">
                                            @error('confirmationdate')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 col-sm-12 col-lg-3">
                                        <div class="form-group">
                                            <label class="form-label">Exit Date <small class="text-danger">*</small></label>
                                            <input type="text" data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="dd/mm/yyyy" data-date-format="dd/mm/yyyy" name="exitdate">
                                            @error('exitdate')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 col-sm-12 col-lg-3">
                                        <div class="form-group">
                                            <label class="form-label">Role <small class="text-danger">*</small></label>
                                            <select class="form-select select1" aria-label="Default select example" name="role_id">
                                                <option value="">Choose Role</option>
                                                @foreach($roles as $role)
                                                <option value="$role->id" @if(!empty($editemployee) && $editemployee->role_id == $role->id) selected @endif>$role->name</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </fieldset>

                            <h3>Document Information</h3>
                            <fieldset>
                                <div class="row g-2">
                                <h6 class="card-title">Bank Information</h6>
                                    <div class="mb-3  col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Bank Name <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control" placeholder="Bank Name  *" name="username" required="">
                                        </div>
                                    </div>

                                    <div class="mb-3  col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Account Number <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control" placeholder="Account Number*" name="confirm" required="">
                                        </div>
                                    </div>
                                    <div class="mb-3  col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">IFSC code <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control" placeholder="IFSC code*" name="confirm" required="">
                                        </div>
                                    </div>
                                    <div class="mb-3  col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Bank Address <small class="text-danger">*</small></label>
                                            <textarea name="address" placeholder=" Bank Address *" class="form-control no-resize" required="" style="height:120px !important;"></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3  col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Document1 <small class="text-danger">*</small></label>
                                            <input type="file" class="dropify">
                                        </div>
                                    </div>
                                    <div class="mb-3  col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Document2 <small class="text-danger">*</small></label>
                                            <input type="file" class="dropify">
                                        </div>
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
<div class="modal fade" id="addEmployee" aria-labelledby="addEmployee" aria-hidden="true">
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
        $('.select1').select2();
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

    // Load States
    $(document).ready(function() {
        var countryId = $('#country_id').val();
        var stateId = "{{ !empty($editemployee->state_id) ? $editemployee->state_id : '' }}";

        if (countryId) {
            loadStates(countryId, stateId, '#state_id');
        }

        $('#country_id').change(function() {
            var countryId = $(this).val();
            loadStates(countryId, null, '#state_id');
        });

        function loadStates(countryId, selectedStateId, stateSelector) {
            if (countryId) {
                $.ajax({
                    url: '{{ route("admin.getStates") }}',
                    type: 'GET',
                    data: {
                        country_id: countryId
                    },
                    success: function(data) {
                        $(stateSelector).empty();
                        $(stateSelector).append('<option value="">Choose State Name</option>');
                        $.each(data, function(key, value) {
                            $(stateSelector).append('<option value="' + key + '"' + (selectedStateId == key ? ' selected' : '') + '>' + value + '</option>');
                        });
                    }
                });
            } else {
                $(stateSelector).empty();
                $(stateSelector).append('<option value="">First Choose Country Name</option>');
            }
        }
    });

    // Load Cities
    $(document).ready(function() {
        var stateId = $('#state_id').val();
        var cityId = "{{ !empty($editemployee->city_id) ? $editemployee->city_id : '' }}";

        if (stateId) {
            loadCities(stateId, cityId, '#city_id');
        }

        $('#state_id').change(function() {
            var stateId = $(this).val();
            loadCities(stateId, null, '#city_id');
        });

        function loadCities(stateId, selectedCityId, citySelector) {
            if (stateId) {
                $.ajax({
                    url: '{{ route("admin.getCities") }}',
                    type: 'GET',
                    data: {
                        state_id: stateId
                    },
                    success: function(data) {
                        $(citySelector).empty();
                        $(citySelector).append('<option value="">Choose City Name</option>');
                        $.each(data, function(key, value) {
                            $(citySelector).append('<option value="' + key + '"' + (selectedCityId == key ? ' selected' : '') + '>' + value + '</option>');
                        });
                    }
                });
            } else {
                $(citySelector).empty();
                $(citySelector).append('<option value="">First Choose State Name</option>');
            }
        }
    });

    // Load Permanent States
    $(document).ready(function() {
        var countryId = $('#permanent_country_id').val();
        var stateId = "{{ !empty($editemployee->permanent_state_id) ? $editemployee->permanent_state_id : '' }}";

        if (countryId) {
            loadStates(countryId, stateId, '#permanent_state_id');
        }

        $('#permanent_country_id').change(function() {
            var countryId = $(this).val();
            loadStates(countryId, null, '#permanent_state_id');
        });

        function loadStates(countryId, selectedStateId, stateSelector) {
            if (countryId) {
                $.ajax({
                    url: '{{ route("admin.getStates") }}',
                    type: 'GET',
                    data: {
                        country_id: countryId
                    },
                    success: function(data) {
                        $(stateSelector).empty();
                        $(stateSelector).append('<option value="">Choose State Name</option>');
                        $.each(data, function(key, value) {
                            $(stateSelector).append('<option value="' + key + '"' + (selectedStateId == key ? ' selected' : '') + '>' + value + '</option>');
                        });
                    }
                });
            } else {
                $(stateSelector).empty();
                $(stateSelector).append('<option value="">First Choose Country Name</option>');
            }
        }
    });

    // Load Permanent Cities
    $(document).ready(function() {
        var stateId = $('#permanent_state_id').val();
        var cityId = "{{ !empty($editemployee->permanent_city_id) ? $editemployee->permanent_city_id : '' }}";

        if (stateId) {
            loadCities(stateId, cityId, '#permanent_city_id');
        }

        $('#permanent_state_id').change(function() {
            var stateId = $(this).val();
            loadCities(stateId, null, '#permanent_city_id');
        });

        function loadCities(stateId, selectedCityId, citySelector) {
            if (stateId) {
                $.ajax({
                    url: '{{ route("admin.getCities") }}',
                    type: 'GET',
                    data: {
                        state_id: stateId
                    },
                    success: function(data) {
                        $(citySelector).empty();
                        $(citySelector).append('<option value="">Choose City Name</option>');
                        $.each(data, function(key, value) {
                            $(citySelector).append('<option value="' + key + '"' + (selectedCityId == key ? ' selected' : '') + '>' + value + '</option>');
                        });
                    }
                });
            } else {
                $(citySelector).empty();
                $(citySelector).append('<option value="">First Choose State Name</option>');
            }
        }
    });
</script>
<!-- <script>
    $(document).ready(function() {
        $('.select1').select2();
    });
    $(document).ready(function() {
        $('.select3').select2();
    });
</script> -->
<!---Get State Data ---->
<!-- <script type="text/javascript">
    $(document).ready(function() {
        var countryId = $('#country_id').val();
        var stateId = "{{ !empty($editemployee->state_id) ? $editemployee->state_id : '' }}";

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
                        $('#state_id').empty();
                        $('#state_id').append('<option value="">Choose State Name</option>');
                        $.each(data, function(key, value) {
                            $('#state_id').append('<option value="' + key + '"' + (selectedStateId == key ? ' selected' : '') + '>' + value + '</option>');
                        });
                    }
                });
            } else {
                $('#state_id').empty();
                $('#state_id').append('<option value="">First Choose Country Name</option>');
            }
        }
    });
</script> -->
<!---Get City Data ---->
<!-- <script type="text/javascript">
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
</script> -->
<!---Get Permanent State Data ---->
<!-- <script type="text/javascript">
    $(document).ready(function() {
        var countryId = $('#country_id').val();
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
</script> -->
<!---Get Permanent City Data ---->
<!-- <script type="text/javascript">
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
</script> -->
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
<!---Get Designation Data ---->
<script type="text/javascript">
$(document).ready(function() {
    var departmentId = $('#department_id').val();
    var designationId = "{{ !empty($editdesignation->designation_id) ? $editdesignation->designation_id : '' }}";

    if (departmentId) {
        loadDepartments(departmentId, designationId);
    }

    $('#department_id').change(function() {
        var departmentId = $(this).val();
        loadDepartments(departmentId, null);
    });

    function loadDepartments(departmentId, selectedDesignationId) {
        if (departmentId) {
            $.ajax({
                url: '{{ route("admin.getDepartments") }}',
                type: 'GET',
                data: { department_id: departmentId },
                success: function(data) {
                    $('#designation_id').empty();
                    $('#designation_id').append('<option value="">Choose Designation Name</option>');
                    $.each(data, function(key, value) {
                        $('#designation_id').append('<option value="'+ key +'"' + (selectedDesignationId == key ? ' selected' : '') + '>'+ value +'</option>');
                    });
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