@foreach ($meal->options as $option)
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label">Name: *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="options[name][]" value="{{ $option->name }}" placeholder="Name" />
                <div class="invalid-feedback">
                    Please provide a valid name.
                </div>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label">image: *</label>
                <input type="file" class="form-control @error('main_image') is-invalid @enderror" name="options[main_image][]" />
                <img src="{{ $option->img_path }}" width="100" style="margin: 20px;" alt="" srcset="">
                @error('main_image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label">price: *</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" name="options[price][]" value="{{ $option->price }}" placeholder="Price" />
                <div class="invalid-feedback">
                    Please provide a valid value.
                </div>
                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-3 mt-5 text-center">
            <div class="btn btn-success rounded"><a href="{{ route('options.delete', $option->id) }}" class="text-white">Remove</a></div>
        </div>

    </div>
@endforeach

<div class="option-form" style="width: 98% !important;">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label">Name: *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="options[name][]" placeholder="Name" />
                <div class="invalid-feedback">
                    Please provide a valid name.
                </div>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label">image: *</label>
                <input type="file" class="form-control @error('main_image') is-invalid @enderror" name="options[main_image][]" />
                @error('main_image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label">price: *</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" name="options[price][]" placeholder="Price" />
                <div class="invalid-feedback">
                    Please provide a valid value.
                </div>
                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>

</div>

<div class="options-area"></div>


<button class="btn btn-primary rounded col-md-3" style="margin: 13px 36%;" onclick="addOption();return false;">Add New Option</button>
