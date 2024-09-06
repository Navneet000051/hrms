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

                    @if (!empty($editemployee))
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Edit Employee</h2>
                    @else
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Add Employee</h2>
                    @endif
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="d-flex flex-row-reverse">
                        <div class="page_action">
                            <a href="{{ route('admin.employee') }}" type="button" class="btn btn-outline-primary me-2">Back</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 pb-5">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <form id="wizard_with_validation" action="{{ route('admin.addemployee') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ !empty($editemployee->id) ? $editemployee->id : '' }}">
                            <h3>Personal Information</h3>
                            <fieldset>
                                <div class="row g-2">

                                    <div class="mb-3 col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Employee ID <small class="text-danger">*</small></label>
                                            <input type="number" name="emp_id" placeholder="Employee ID *" class="form-control" value="{{ !empty($editemployee->emp_id) ? $editemployee->emp_id : '' }}">
                                            @error('emp_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">First Name <small class="text-danger">*</small></label>
                                            <input type="text" name="name" placeholder="First Name *" class="form-control" value="{{ !empty($editemployee->name) ? $editemployee->name : '' }}">
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="mb-3 col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Last Name <small class="text-danger">*</small></label>
                                            <input type="text" name="lastname" placeholder="Last Name *" class="form-control" value="{{ !empty($editemployee->lastname) ? $editemployee->lastname : '' }}">
                                            @error('lastname')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Email ID <small class="text-danger">*</small></label>
                                            <input type="email" name="email" placeholder="Email ID  *" class="form-control" value="{{ !empty($editemployee->email) ? $editemployee->email : '' }}">
                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3  col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Password<small class="text-danger">*</small></label>
                                            <input type="password" class="form-control" placeholder="Password *" name="password" id="password">
                                            @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Date of Birth <small class="text-danger">*</small></label>
                                            <input type="text" data-provide="datepicker" data-date-autoclose="true" class="form-control" name="dob" placeholder="dd/mm/yyyy" data-date-format="dd/mm/yyyy" value="{{ !empty($editemployee->dob) ? $editemployee->dob : old('dob') }}">
                                            @error('dob')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 col-sm-12 col-lg-4">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label">Gender <small class="text-danger">*</small></label>
                                                    <select class="form-select select1" aria-label="Default select example" name="gender">
                                                        <option value="" disabled {{ old('gender', $editemployee->gender ?? '') == '' ? 'selected' : '' }}>Choose Gender</option>
                                                        <option value="m" {{ old('gender', $editemployee->gender ?? '') == 'm' ? 'selected' : '' }}>Male</option>
                                                        <option value="f" {{ old('gender', $editemployee->gender ?? '') == 'f' ? 'selected' : '' }}>Female</option>
                                                        <option value="o" {{ old('gender', $editemployee->gender ?? '') == 'o' ? 'selected' : '' }}>Other</option>
                                                    </select>
                                                    @error('gender')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">Marital Status <small class="text-danger">*</small></label>
                                                    <select class="form-select select1" aria-label="Default select example" name="maritalstatus">
                                                        <option value="" disabled {{ old('maritalstatus', $editemployee->marital_status ?? '') == '' ? 'selected' : '' }}>Marital Status</option>
                                                        <option value="married" {{ old('maritalstatus', $editemployee->marital_status ?? '') == 'married' ? 'selected' : '' }}>Married</option>
                                                        <option value="unmarried" {{ old('maritalstatus', $editemployee->marital_status ?? '') == 'unmarried' ? 'selected' : '' }}>Unmarried</option>
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
                                                    <input type="number" name="mobile" placeholder="Mobile Number *" class="form-control" value="{{ !empty($editemployee->mobile) ? $editemployee->mobile : old('mobile') }}">
                                                    @error('document_type')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">Alternate Number <small class="text-danger">*</small></label>
                                                    <input type="number" name="alternatemobile" placeholder="Alternate Number *" class="form-control" value="{{ !empty($editemployee->alternatemobile) ? $editemployee->alternatemobile : old('alternatemobile') }}">

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
                                    <div class="mb-3 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Aadhar Number <small class="text-danger">*</small></label>
                                            <input type="text" name="aadharnumber" placeholder="Aadhar Number *" class="form-control" value="{{ !empty($editemployee->aadharno) ? $editemployee->aadharno : old('aadharnumber') }}">
                                            @error('aadharnumber')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="mb-3 col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Pan Number <small class="text-danger">*</small></label>
                                            <input type="text" name="pannumber" placeholder="Pan Number *" class="form-control" value="{{ !empty($editemployee->pancardno) ? $editemployee->pancardno : old('pannumber') }}">
                                            @error('pannumber')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3  col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Aadhar Card <small class="text-danger">*</small></label>
                                            <input type="file" class="dropify" name="aadhar">
                                            @error('aadhar')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="mb-3  col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Pan card <small class="text-danger">*</small></label>
                                            <input type="file" class="dropify" name="pancard">
                                            @error('pancard')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3  col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Domicile Certificate <small class="text-danger">*</small></label>
                                            <input type="file" class="dropify" name="domicile">
                                            @error('domicile')
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
                                    <div class="mb-3 col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Residential Address <small class="text-danger">*</small></label>
                                            <textarea name="address" id="residential_address" cols="30" rows="4" placeholder="Address *" class="form-control no-resize pt-3" required>{{ !empty($editemployee->address) ? $editemployee->address : old('address') }} </textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-8">
                                        <div class="row g-2">
                                            <div class="mb-1 col-sm-12 col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">Country <small class="text-danger">*</small></label>
                                                    <select class="form-select select1" aria-label="Default select example" name="country_id" id="country_id">
                                                        <option value="">Choose Country</option>
                                                        @foreach($countries as $country)
                                                        <option value="{{ $country->id }}" @if(!empty($editemployee) && $editemployee->country_id == $country->id) selected @endif>{{ $country->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('country_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="mb-1 col-sm-12 col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">State <small class="text-danger">*</small></label>
                                                    <select class="form-select select1" aria-label="Default select example" name="state_id" id="state_id">
                                                        <option selected>Choose Country First</option>
                                                    </select>
                                                    @error('state_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">City <small class="text-danger">*</small></label>
                                                    <select class="form-select select1" aria-label="Default select example" name="city_id" id="city_id">
                                                        <option selected>Choose State First</option>
                                                    </select>
                                                    @error('city_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">Pincode <small class="text-danger">*</small></label>
                                                    <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pincode" value="{{ !empty($editemployee->pincode) ? $editemployee->pincode : old('pincode') }}">
                                                    @error('pincode')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
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
                                    <div class="mb-3 col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Permanent Address <small class="text-danger">*</small></label>
                                            <textarea name="permanentaddress" id="permanent_address" cols="30" rows="4" placeholder="Address *" class="form-control no-resize pt-3" required>{{ !empty($editemployee->address) ? $editemployee->address : old('address') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-sm-12 col-lg-8">
                                        <div class="row g-2">
                                            <div class="mb-1 col-sm-12 col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">Country <small class="text-danger">*</small></label>
                                                    <select class="form-select select4" aria-label="Default select example" name="pcountry_id" id="permanent_country_id">
                                                        <option selected>Choose Country</option>
                                                        @foreach($countries as $pcountry)
                                                        <option value="{{ $pcountry->id }}" @if(!empty($editemployee) && $editemployee->pcountry_id == $pcountry->id) selected @endif>{{ $pcountry->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('pcountry_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-1 col-sm-12 col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">State <small class="text-danger">*</small></label>
                                                    <select class="form-select select3" aria-label="Default select example" name="pstate_id" id="permanent_state_id">
                                                        <option selected>Choose Country First</option>
                                                    </select>
                                                    @error('pstate_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">City <small class="text-danger">*</small></label>
                                                    <select class="form-select select3" aria-label="Default select example" name="pcity_id" id="permanent_city_id">
                                                        <option selected>Choose State First</option>
                                                    </select>
                                                    @error('pcity_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 col-sm-12 col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">Pincode <small class="text-danger">*</small></label>
                                                    <input type="text" class="form-control" name="permanent_pincode" id="permanent_pincode" placeholder="Pincode" value="{{ !empty($editemployee->pincode) ? $editemployee->pincode : old('pincode') }}">
                                                    @error('permanent_pincode')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
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
                                                <option value="{{ $role->id }}" @if(!empty($editemployee) && $editemployee->role_id == $role->id) selected @endif>{{ $role->role_name }}</option>
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
                                            <input type="text" class="form-control" placeholder="Bank Name  *" name="bankname" value="{{ !empty($editemployee->bankname) ? $editemployee->bankname : old('bankname') }}">
                                            @error('bankname')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3  col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Account Number <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control" placeholder="Account Number*" name="accountnumber" value="{{ !empty($editemployee->accountnumber) ? $editemployee->accountnumber : old('accountnumber') }}">
                                            @error('accountnumber')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3  col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">IFSC code <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control" placeholder="IFSC code*" name="ifsccode" value="{{ !empty($editemployee->ifsccode) ? $editemployee->ifsccode : old('ifsccode') }}">
                                            @error('ifsccode')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3  col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Bank Address <small class="text-danger">*</small></label>
                                            <textarea name="bankaddress" placeholder=" Bank Address *" class="form-control no-resize" style="height:120px !important;"> {{ !empty($editemployee->bankaddress) ? $editemployee->bankaddress : old('bankaddress') }}</textarea>
                                            @error('bankaddress')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3  col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Bank Document1 <small class="text-danger">*</small></label>
                                            <input type="file" class="dropify" name="bankdoc1">
                                            @error('bankdoc1')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="mb-3  col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Bank Document2 <small class="text-danger">*</small></label>
                                            <input type="file" class="dropify" name="bankdoc2">
                                            @error('bankdoc2')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <h6 class="card-title">Education Information</h6>
                                    @php
                                    $educationDocuments = $editemployee->educationDocuments ?? []; // Retrieve education document data
                                    @endphp

                                    <!-- Display Existing or New Document Input Template -->
                                    <div id="req_input" class="datainputs">
                                        @foreach($educationDocuments as $index => $document)
                                        <div class="row g-2 required_inp">
                                            <div class="mb-3 col-sm-12 col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">Document Type <small class="text-danger">*</small></label>
                                                    <select class="form-select document-type-select" aria-label="Default select example" name="document_type[]">
                                                        <option value="">Document Type</option>
                                                        <option value="highschool" {{ $document->document_type == 'highschool' ? 'selected' : '' }}>High School</option>
                                                        <option value="intermediate" {{ $document->document_type == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                                                        <option value="graduation" {{ $document->document_type == 'graduation' ? 'selected' : '' }}>Graduation</option>
                                                        <option value="others" {{ $document->document_type == 'others' ? 'selected' : '' }}>Others</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mb-3 col-sm-12 col-lg-3 document-name-group" style="{{ $document->document_type == 'others' ? '' : 'display: none;' }}">
                                                <div class="form-group">
                                                    <label class="form-label">Document Name <small class="text-danger">*</small></label>
                                                    <input type="text" class="form-control" name="document_name[]" value="{{ $document->document_name }}" placeholder="Enter Document Name">
                                                </div>
                                            </div>

                                            <div class="mb-3 col-sm-11 col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label">Certificate <small class="text-danger">*</small></label>
                                                    <input type="file" class="form-control" name="certificate[]">
                                                    @if($document->certificate)
                                                    <p>Current: <a href="{{ asset('storage/' . $document->certificate) }}" target="_blank">View Certificate</a></p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="mb-3 col-sm-1 col-lg-1 align-self-center">
                                                <label class="form-label"></label>
                                                <div class="form-group">
                                                    <a class="btn btn-sm btn-outline-danger inputRemove" title="Remove"><i class="fa fa-minus-circle"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                        <!-- Template for New Document -->
                                        <div class="row g-2 required_inp">
                                            <div class="mb-3 col-sm-12 col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">Document Type <small class="text-danger">*</small></label>
                                                    <select class="form-select document-type-select" aria-label="Default select example" name="document_type[]">
                                                        <option value="">Document Type</option>
                                                        <option value="highschool">High School</option>
                                                        <option value="intermediate">Intermediate</option>
                                                        <option value="graduation">Graduation</option>
                                                        <option value="others">Others</option>
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="mb-3 col-sm-12 col-lg-3 document-name-group" style="display: none;">
                                                <div class="form-group">
                                                    <label class="form-label">Document Name <small class="text-danger">*</small></label>
                                                    <input type="text" class="form-control" name="document_name[]" placeholder="Enter Document Name">
                                                </div>
                                            </div>

                                            <div class="mb-3 col-sm-11 col-lg-5">
                                                <div class="form-group">
                                                    <label class="form-label">Certificate <small class="text-danger">*</small></label>
                                                    <input type="file" class="form-control" name="certificate[]">
                                                </div>
                                            </div>

                                            <div class="mb-3 col-sm-1 col-lg-1 align-self-center">
                                                <label class="form-label"></label>
                                                <div class="form-group">
                                                    <a class="btn btn-sm btn-outline-primary add_input" id="addmore" title="Add"><i class="fa fa-plus-circle"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                            </fieldset>

                        </form>
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
        function handleDocumentNameField(selectElement) {
            var selectedValue = $(selectElement).val();
            var row = $(selectElement).closest('.row');
            var documentNameContainer = row.find('.document-name-group');

            if (selectedValue === 'others') {
                documentNameContainer.show();
                row.find('.col-lg-6').removeClass('col-lg-6').addClass('col-lg-3');
            } else {
                documentNameContainer.hide();
                row.find('.col-lg-3').removeClass('col-lg-3').addClass('col-lg-6');
            }
        }

        function addMoreFields() {
            var newRow = `
        <div class="row g-2 required_inp">
            <div class="mb-3 col-sm-12 col-lg-6">
                <div class="form-group">
                    <label class="form-label">Document Type <small class="text-danger">*</small></label>
                    <select class="form-select document-type-select" aria-label="Default select example" name="document_type[]">
                        <option value="">Document Type</option>
                        <option value="highschool">High School</option>
                        <option value="intermediate">Intermediate</option>
                        <option value="graduation">Graduation</option>
                        <option value="others">Others</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 col-sm-12 col-lg-3 document-name-group" style="display: none;">
                <div class="form-group">
                    <label class="form-label">Document Name <small class="text-danger">*</small></label>
                    <input type="text" class="form-control" name="document_name[]" placeholder="Enter Document Name">
                </div>
            </div>
            <div class="mb-3 col-sm-11 col-lg-5">
                <div class="form-group">
                    <label class="form-label">Certificate <small class="text-danger">*</small></label>
                    <input type="file" class="form-control" name="certificate[]">
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
            $('#req_input').append(newRow);
        }

        // Bind change event to existing and newly added select elements
        $('#req_input').on('change', 'select[name="document_type[]"]', function() {
            handleDocumentNameField(this);
        });

        // Handle 'Add More' button click
        $('#addmore').click(function() {
            addMoreFields();
        });

        // Handle removing added fields
        $('#req_input').on('click', '.inputRemove', function() {
            $(this).closest('.required_inp').remove();
        });

        // Initial setup: trigger change event for all existing selects to ensure correct state
        $('#req_input').find('select[name="document_type[]"]').each(function() {
            handleDocumentNameField(this);
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
        var countryId = "{{ !empty($editemployee->country_id) ? $editemployee->country_id : '' }}";
        var stateId = "{{ !empty($editemployee->state_id) ? $editemployee->state_id : '' }}";
        var cityId = "{{ !empty($editemployee->city_id) ? $editemployee->city_id : '' }}";

        // If in edit mode and country is set, load states and cities
        if (countryId) {
            loadResidentialStates(countryId, stateId); // Pass selected state during edit
        }

        if (stateId) {
            loadResidentialCities(stateId, cityId); // Pass selected city during edit
        }

        // Event listener for country change
        $('#country_id').change(function() {
            var countryId = $(this).val();
            loadResidentialStates(countryId, null); // No preselection for state on country change
        });

        // Function to load residential states based on the country ID
        function loadResidentialStates(countryId, selectedStateId) {
            if (countryId) {
                $.ajax({
                    url: '{{ route("admin.getStates") }}',
                    type: 'GET',
                    data: {
                        country_id: countryId
                    },
                    success: function(data) {
                        $('#state_id').empty().append('<option value="">Choose State Name</option>');
                        $.each(data, function(key, value) {
                            $('#state_id').append('<option value="' + key + '"' + (selectedStateId == key ? ' selected' : '') + '>' + value + '</option>');
                        });
                    }
                });
            } else {
                $('#state_id').empty().append('<option value="">First Choose Country Name</option>');
            }
        }

        // Event listener for state change
        $('#state_id').change(function() {
            var stateId = $(this).val();
            loadResidentialCities(stateId, null); // No preselection for city on state change
        });

        // Function to load residential cities based on the state ID
        function loadResidentialCities(stateId, selectedCityId) {
            if (stateId) {
                $.ajax({
                    url: '{{ route("admin.getCities") }}',
                    type: 'GET',
                    data: {
                        state_id: stateId
                    },
                    success: function(data) {
                        $('#city_id').empty().append('<option value="">Choose City Name</option>');
                        $.each(data, function(key, value) {
                            $('#city_id').append('<option value="' + key + '"' + (selectedCityId == key ? ' selected' : '') + '>' + value + '</option>');
                        });
                    }
                });
            } else {
                $('#city_id').empty().append('<option value="">First Choose State Name</option>');
            }
        }
    });
</script>

<!---Get City Data ---->
<script type="text/javascript">
    $(document).ready(function() {
        // Predefined values for edit mode
        var stateId = "{{ !empty($editemployee->state_id) ? $editemployee->state_id : '' }}";
        var cityId = "{{ !empty($editemployee->city_id) ? $editemployee->city_id : '' }}";

        // If in edit mode and state is set, load cities
        if (stateId) {
            loadCities(stateId, cityId);
        }

        // Event listener for state change
        $('#state_id').change(function() {
            var stateId = $(this).val();
            loadCities(stateId, null); // Pass null to ignore preselection in city
        });

        // Function to load cities based on the state ID
        function loadCities(stateId, selectedCityId) {
            if (stateId) {
                $.ajax({
                    url: '{{ route("admin.getCities") }}',
                    type: 'GET',
                    data: {
                        state_id: stateId
                    },
                    success: function(data) {
                        $('#city_id').empty().append('<option value="">Choose City Name</option>');
                        $.each(data, function(key, value) {
                            $('#city_id').append('<option value="' + key + '"' + (selectedCityId == key ? ' selected' : '') + '>' + value + '</option>');
                        });
                    }
                });
            } else {
                $('#city_id').empty().append('<option value="">First Choose State Name</option>');
            }
        }
    });
</script>
<!---Get Permanent State Data ---->
<script type="text/javascript">
    $(document).ready(function() {
    var permanentCountryId = "{{ !empty($editemployee->pcountry_id) ? $editemployee->pcountry_id : '' }}";
    var permanentStateId = "{{ !empty($editemployee->pstate_id) ? $editemployee->pstate_id : '' }}";
    var permanentCityId = "{{ !empty($editemployee->pcity_id) ? $editemployee->pcity_id : '' }}";

    // If in edit mode and permanent country is set, load states and cities
    if (permanentCountryId) {
        loadPermanentStates(permanentCountryId, permanentStateId); // Pass selected state during edit
    }

    if (permanentStateId) {
        loadPermanentCities(permanentStateId, permanentCityId); // Pass selected city during edit
    }

    // Event listener for permanent country change
    $('#permanent_country_id').change(function() {
        var permanentCountryId = $(this).val();
        loadPermanentStates(permanentCountryId, null); // No preselection for state on country change
    });

    // Function to load permanent states based on the country ID
    function loadPermanentStates(permanentCountryId, selectedStateId) {
        if (permanentCountryId) {
            $.ajax({
                url: '{{ route("admin.getStates") }}',
                type: 'GET',
                data: { country_id: permanentCountryId },
                success: function(data) {
                    $('#permanent_state_id').empty().append('<option value="">Choose State Name</option>');
                    $.each(data, function(key, value) {
                        $('#permanent_state_id').append('<option value="' + key + '"' + (selectedStateId == key ? ' selected' : '') + '>' + value + '</option>');
                    });
                }
            });
        } else {
            $('#permanent_state_id').empty().append('<option value="">First Choose Country Name</option>');
        }
    }

    // Event listener for permanent state change
    $('#permanent_state_id').change(function() {
        var permanentStateId = $(this).val();
        loadPermanentCities(permanentStateId, null); // No preselection for city on state change
    });

    // Function to load permanent cities based on the state ID
    function loadPermanentCities(permanentStateId, selectedCityId) {
        if (permanentStateId) {
            $.ajax({
                url: '{{ route("admin.getCities") }}',
                type: 'GET',
                data: { state_id: permanentStateId },
                success: function(data) {
                    $('#permanent_city_id').empty().append('<option value="">Choose City Name</option>');
                    $.each(data, function(key, value) {
                        $('#permanent_city_id').append('<option value="' + key + '"' + (selectedCityId == key ? ' selected' : '') + '>' + value + '</option>');
                    });
                }
            });
        } else {
            $('#permanent_city_id').empty().append('<option value="">First Choose State Name</option>');
        }
    }
});

</script>
<!---Get Permanent City Data ---->
<script type="text/javascript">
    $(document).ready(function() {
        var stateId = $('#pstate_id').val();
        var cityId = "{{ !empty($editemployee->pcity_id) ? $editemployee->pcity_id : '' }}";

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
        var departmentId = "{{ !empty($editemployee->department_id) ? $editemployee->department_id : '' }}";

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
        var designationId = "{{ !empty($editemployee->designation_id) ? $editemployee->designation_id : '' }}";

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