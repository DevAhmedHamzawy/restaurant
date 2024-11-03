@extends('admin.layouts.main')

@section('content')

<div class="container">

  <div class="card">
    <div class="card-header d-flex justify-content-between">
       <div class="header-title">
          <h4 class="card-title">Update An Admin {{ $admin->name }}</h4>
       </div>
    </div>
    <div class="card-body">
       <form action="{{ route('admins.update', $admin->id) }}" method="post" class="row g-3 needs-validation" novalidate>
          @method('PUT')
          @csrf
          <div class="col-md-12">
             <label for="validationCustom01" class="form-label">name</label>
             <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="validationCustom01" value="{{ $admin->name }}" required>
             <div class="invalid-feedback">
                Please provide a valid name.
             </div>
             @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
             @enderror
          </div>
          <div class="col-md-12">
             <label for="validationCustom03" class="form-label">email</label>
             <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="validationCustom03" value="{{ $admin->email }}" required>
             <div class="invalid-feedback">
                Please provide a valid email.
             </div>
             @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
         <div class="col-md-12">
            <label for="validationCustom03" class="form-label">password</label>
            <input type="text" name="password" class="form-control" id="validationCustom03">
         </div>

          <div class="col-12">
             <button class="btn btn-primary rounded" type="submit">Submit form</button>
          </div>
       </form>
    </div>
 </div>

</div>

@endsection
