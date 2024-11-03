<div class="ingredient-form">
  <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">Name: *</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="ingredients[name][]" placeholder="Name" />
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
                <label class="form-label">image: *</label>
                <input type="file" class="form-control @error('main_image') is-invalid @enderror" name="ingredients[main_image][]" />
                @error('main_image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

    </div>

</div>

<div class="ingredient-area"></div>

<button class="btn btn-primary rounded" onclick="addIngredient();return false;">Add New Ingredient</button>
