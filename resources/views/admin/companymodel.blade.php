<input type="hidden" name="id" value="{{ !empty($editcompany->id) ? $editcompany->id : '' }}">
                    <div class="row g-2">
                        <div class="col-12">
                            <label class="form-label">Company Name <small class="text-danger">*</small></label>
                            <input type="text" class="form-control" name="company_name" placeholder="Company Name" value="{{ !empty($editcompany->company_name) ? $editcompany->company_name : old('company_name') }}">
                            @error('company_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Company Address <small class="text-danger">*</small></label>
                            <textarea name="address" cols="30" rows="3" placeholder="Address *" class="form-control no-resize" required=""> {{ !empty($editcompany->address) ? $editcompany->address : old('address') }}</textarea>
                            @error('address')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Company Logo <small class="text-danger">*</small></label>
                            <input type="file" id="dropify-event" class="dropify" data-default-file="{{ (!empty($editcompany->logo)) ? asset('storage/' . $editcompany->logo) : '' }}" name="logo">
                            @error('logo')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
            
                    <script type="text/javascript">
    $(document).ready(function() {
    // Form-validation *****************************
   
  $('.dropify').dropify({
    showErrors: true,
    errorTimeout: 3000,
    errorsPosition: 'overlay',
    // Include WEBP in allowed extensions
    imgFileExtensions: ['png', 'jpg', 'jpeg', 'gif', 'bmp', 'webp', 'mp4'],
    maxFileSizePreview: "5M",
    allowedFormats: ['portrait', 'square', 'landscape'],
    allowedFileExtensions: ['*'],
  });
  var drEvent = $("#dropify-event").dropify();
  drEvent.on("dropify.beforeClear", function (event, element) {
    return confirm(
      'Do you really want to delete "' + element.file.name + '" ?'
    );
  });

  drEvent.on("dropify.afterClear", function (event, element) {
    alert("File deleted");
  });

  $(".dropify-fr").dropify({
    messages: {
      default: "Glissez-dÃ©posez un fichier ici ou cliquez",
      replace: "Glissez-dÃ©posez un fichier ou cliquez pour remplacer",
      remove: "Supprimer",
      error: "DÃ©solÃ©, le fichier trop volumineux",
    },
  });



    // Check if default file is set for thumbnail input
    var defaultlogo = $('.dropify').data('default-file');
    $('#editForm').validate({
        ignore: 'hidden',
        rules: {
            company_name: {
                required: true
            },
            address: {
                required: true
            },
        },
        messages: {
            company_name: {
                required: "Please choose company name"
            },
            address: {
                required: "Please enter address"
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