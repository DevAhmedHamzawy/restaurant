<div class="feature-form">

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Name: *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="features[name][]" placeholder="Name" />
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

        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Value: *</label>
                <input type="text" class="form-control @error('value') is-invalid @enderror" name="features[value][]" placeholder="Value" />
                <div class="invalid-feedback">
                    Please provide a valid value.
                    </div>
                    @error('value')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
            </div>
        </div>
    </div>

</div>

<div class="features-area"></div>

<button class="btn btn-primary rounded" onclick="addFeature();return false;">Add New Feature</button>

