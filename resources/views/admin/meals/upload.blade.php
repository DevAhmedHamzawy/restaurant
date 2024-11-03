@extends('admin.layouts.main')

@section('header')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
@endsection

@section('content')

<div class="container">
  <div class="mt-2 card">
    <div class="card-header d-flex justify-content-between">
       <div class="header-title">
          <h4 class="card-title">Upload Media For Meal</h4>
       </div>
    </div>
    <div class="card-body">
            <form action="{{ route('meals.upload_media', [$restaurant->id, $meal->id]) }}" enctype="multipart/form-data" class="dropzone" id="image-upload">
                @csrf
                <input type="hidden" name="request" value="add">
                <div>
                    <h3>Upload Multiple Image By Click On Box</h3>
                </div>
            </form>
        </div>
    </div>
 </div>

@endsection


@section('additional_scripts')
    <script>
        Dropzone.options.imageUpload = {
            maxFilesize         :       1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            init: function() {

                var myDropzone = this;
                var domainUrl = '{!! request()->getSchemeAndHttpHost() !!}'

                this.on("addedfile", function(file) {

                    // Create the remove button
                    var removeButton = Dropzone.createElement("<button>Remove file</button>");


                    // Capture the Dropzone instance as closure.
                    var _this = this;

                    // Listen to the click event
                    removeButton.addEventListener("click", function(e) {
                        // Make sure the button click doesn't submit the form:
                        e.preventDefault();
                        e.stopPropagation();

                        // Remove the file preview.
                        _this.removeFile(file);
                        // If you want to the delete the file on the server as well,
                        // you can do the AJAX request here.
                    });

                    // Add the button to the file preview element.
                    file.previewElement.appendChild(removeButton);
                });

                $.getJSON('../../../../restaurants/{!! $restaurant->id !!}/meals/{!! $meal->id !!}/getMedia', function(data) {
                    $.each(data, function(index, val) {
                        var mockFile = { name: val.name, size: val.size};
                        myDropzone.emit("addedfile", mockFile);
                        myDropzone.emit("thumbnail", mockFile, domainUrl+'/storage/meals/'+val.name);
                    });
                });
            }
        };






    </script>
@endsection
