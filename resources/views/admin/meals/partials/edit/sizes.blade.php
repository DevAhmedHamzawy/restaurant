@foreach ($meal->sizes as $size)

    <div class="row">

        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label">Abbreviation: *</label>
                <input type="text" class="form-control @error('abbreviation') is-invalid @enderror" name="sizes[abbreviation][]" value="{{ $size->abbreviation }}" placeholder="Abbreviation" />
                <div class="invalid-feedback">
                    Please provide a valid Abbreviation.
                </div>
                @error('abbreviation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>


        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label">Name: *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="sizes[name][]" value="{{ $size->name }}" placeholder="Name" />
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
                <label class="form-label">price: *</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" name="sizes[price][]" value="{{ $size->price }}" placeholder="Price" />
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
            <div class="btn btn-success rounded"><a href="{{ route('sizes.delete', $size->id) }}" class="text-white">Remove</a></div>
        </div>

    </div>

@endforeach


<div class="size-form" style="width: 98% !important;">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label">Abbreviation: *</label>
                <input type="text" class="form-control @error('abbreviation') is-invalid @enderror" name="sizes[abbreviation][]" placeholder="Abbreviation" />
                <div class="invalid-feedback">
                    Please provide a valid abbreviation.
                 </div>
                 @error('abbreviation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                 @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label">Name: *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="sizes[name][]" placeholder="Name" />
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
                <label class="form-label">price: *</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" name="sizes[price][]" placeholder="Price" />
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

<div class="size-area"></div>

<button class="btn btn-primary rounded col-md-3" style="margin: 13px 36%;" onclick="addSize();return false;">Add New Size</button>
