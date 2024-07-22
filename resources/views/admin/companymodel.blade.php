
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
            
                