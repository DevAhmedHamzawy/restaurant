@extends('admin.layouts.main')

@section('content')

<div class="container">
    <div class="row">



  <div class="mt-2 card">
    <div class="card-header d-flex justify-content-between">
       <div class="header-title">
          <h4 class="card-title">Edit Sub Tag</h4>
       </div>
    </div>
    <div class="card-body">
       <form action="{{ route('subtags.update', [$tag->id , $subtag->id]) }}" method="post" class="row g-3 needs-validation" novalidate>
          @method('PUT')
          @csrf

          <div class="col-md-12">
             <label for="validationCustom01" class="form-label">name</label>
             <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $subtag->name }}" id="validationCustom01" required>
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
