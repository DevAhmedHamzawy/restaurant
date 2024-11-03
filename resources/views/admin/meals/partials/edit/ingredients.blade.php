@foreach ($meal->ingredients as $ingredient)
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label">Name: *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="ingredients[name][]" value="{{ $ingredient->name }}" placeholder="Name" />
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
                <input type="file" class="form-control @error('main_image') is-invalid @enderror" name="ingredients[main_image][]" />
                <img src="{{ $ingredient->img_path }}" width="100" style="margin: 20px;" alt="" srcset="">
                @error('main_image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>


        <div class="col-md-4 mt-5 text-center">
            <div class="btn btn-success rounded"><a href="{{ route('ingredients.delete', $ingredient->id) }}" class="text-white">Remove</a></div>
        </div>

    </div>
@endforeach

<div class="ingredient-form" style="width: 98% !important;">

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

<button class="btn btn-primary rounded col-md-3" style="margin: 13px 36%;" onclick="addIngredient();return false;">Add New Ingredient</button>
