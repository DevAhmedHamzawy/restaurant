@foreach ($meal->features as $feature)
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label class="form-label">Name: *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="features[name][]" value="{{ $feature->name }}" placeholder="Name" />
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

        <div class="col-md-5">
            <div class="form-group">
                <label class="form-label">Value: *</label>
                <input type="text" class="form-control @error('value') is-invalid @enderror" name="features[value][]" value="{{ $feature->value }}" placeholder="Value" />
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

        <div class="col-md-2 mt-5 text-center">
            <div class="btn btn-success rounded"><a href="{{ route('features.delete', $feature->id) }}" class="text-white">Remove</a></div>
        </div>

    </div>
@endforeach

<div class="feature-form" style="width: 98% !important;">
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

<button class="btn btn-primary rounded col-md-3" style="margin: 13px 36%;" onclick="addFeature();return false;">Add New Feature</button>
