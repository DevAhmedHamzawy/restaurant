@extends('admin.layouts.main')

@section('content')

<div class="container">
    <div class="row">


  <div class="mt-2 card">
    <div class="card-header d-flex justify-content-between">
       <div class="header-title">
          <h4 class="card-title">Create New Tag</h4>
       </div>
    </div>
    <div class="card-body">
       <form action="{{ route('tags.update', $tag->id) }}" method="post" class="row g-3 needs-validation" novalidate>
          @method('PUT')
          @csrf

          <div class="col-md-12">
            <div class="form-group">
                <label class="form-label" for="exampleFormControlSelect1">Select Restaurant</label>
                <select class="form-select @error('restaurant_id') is-invalid @enderror" name="restaurant_id" id="exampleFormControlSelect1">
                <option selected="" disabled="">Select the restaurant</option>
                @foreach ($restaurants as $restaurant)
                    <option value="{{ $restaurant->id }}" @if($tag->restaurant_id == $restaurant->id) selected @endif>{{ $restaurant->name }}</option>
                @endforeach
                </select>
                <div class="invalid-feedback">
                    Please provide a valid name.
                 </div>
                 @error('restaurant_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                 @enderror
            </div>
        </div>

          <div class="col-md-12">
             <label for="validationCustom01" class="form-label">name</label>
             <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $tag->name }}" id="validationCustom01" required>
             <div class="invalid-feedback">
                Please provide a valid name.
             </div>
             @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
             @enderror
          </div>


          <div class="col-12">
             <button class="btn btn-primary rounded" type="submit">Submit form</button>
          </div>
       </form>
    </div>
 </div>

</div>
</div>

@endsection
