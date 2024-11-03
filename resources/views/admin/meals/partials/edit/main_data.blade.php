<div class="col-md-6">
    <div class="form-group">
        <label class="form-label" for="exampleFormControlSelect1">Select Tag</label>
        <select onchange="getSubTags(this)" class="form-select" id="exampleFormControlSelect1">
        <option selected="" disabled="">Select the tag</option>
        @foreach ($tags as $tag)
            <option @if($theTag == $tag->id) selected @endif value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
        </select>
        <div class="invalid-feedback">
            Please provide a valid name.
         </div>
         @error('tag_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
         @enderror
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="form-label" for="exampleFormControlSelect1">Select Sub Tag</label>
        <select class="tag_id form-select @error('tag_id') is-invalid @enderror" name="tag_id" id="exampleFormControlSelect1">

        </select>
        <div class="invalid-feedback">
            Please provide a valid name.
         </div>
         @error('tag_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
         @enderror
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="form-label">Name: *</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $meal->name }}" placeholder="Name" />
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
        <label class="form-label">Description: *</label>
        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $meal->description }}" placeholder="Description" />
        <div class="invalid-feedback">
            Please provide a valid name.
         </div>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="form-label">price: *</label>
        <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $meal->price }}" placeholder="Price" />
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
<div class="col-md-6">
    <div class="form-group">
        <label class="form-label">image: *</label>
        <input type="file" class="form-control @error('main_image') is-invalid @enderror" name="main_image" />
        <img src="{{ $meal->img_path }}" width="150" alt="" srcset="">
        @error('main_image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
