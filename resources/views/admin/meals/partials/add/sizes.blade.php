<div class="size-form">

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

<button class="btn btn-primary rounded" onclick="addSize();return false;">Add New Size</button>
