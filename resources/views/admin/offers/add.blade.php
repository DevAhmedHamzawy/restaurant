@extends('admin.layouts.main')

@section('content')

 <div class="container">


  <div class="mt-2 card">
    <div class="card-header d-flex justify-content-between">
       <div class="header-title">
          <h4 class="card-title">Create New Offer</h4>
       </div>
    </div>
    <div class="card-body">
       <form action="{{ route('offers.store') }}" enctype="multipart/form-data" method="post" class="row g-3 needs-validation" novalidate>
          @csrf

          <div class="col-md-12">
            <div class="form-group">
                <label class="form-label" for="exampleFormControlSelect1">Select Category</label>
                <select class="form-select @error('category_id') is-invalid @enderror" onclick="getRestaurants(this)" onchange="getRestaurants(this)" name="category_id" id="exampleFormControlSelect1">
                <option selected="" disabled="">Select the category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
                </select>
                <div class="invalid-feedback">
                    Please provide a valid name.
                    </div>
                    @error('category_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
                <label class="form-label" for="exampleFormControlSelect1">Select Restaurant</label>
                <select class="restaurant_id form-select @error('restaurant_id') is-invalid @enderror" onclick="getMeals(this)" onchange="getMeals(this)" name="restaurant_id" id="exampleFormControlSelect1">

                    <option selected>Select The Restaurant</option>

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


          <div class="col-md-6">
            <div class="form-group">
                <label class="form-label" for="exampleFormControlSelect1">Select Meal</label>
                <select class="meal_id form-select @error('meal_id') is-invalid @enderror" name="meal_id" id="meal_id">

                    <option selected>Select The Meal</option>

                </select>
                <div class="invalid-feedback">
                    Please provide a valid name.
                 </div>
                 @error('meal_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                 @enderror
            </div>
          </div>

          <div class="col-md-12">
             <label for="validationCustom01" class="form-label">name</label>
             <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="validationCustom01" required>
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
            <label for="validationCustom01" class="form-label">description</label>
            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="validationCustom01" required>
            <div class="invalid-feedback">
               Please provide a valid description.
            </div>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
             @enderror
         </div>
         <div class="col-md-12">
            <label for="validationCustom01" class="form-label">percentage</label>
            <input type="number" name="percentage" class="form-control @error('percentage') is-invalid @enderror" id="validationCustom01" required>
            <div class="invalid-feedback">
               Please provide a valid percentage.
            </div>
            @error('percentage')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
         </div>
          <div class="col-md-12">
            <label class="form-label">image: *</label>
            <input type="file" class="form-control @error('main_image') is-invalid @enderror" name="main_image" />
            @error('main_image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
         </div>
         <div class="col-md-12">
            <label for="validationCustom03" class="form-label">color</label>
            <input type="text" class="form-control @error('color') is-invalid @enderror" name="color" value="#ff6161">
            <div class="invalid-feedback">
               Please provide a valid color.
            </div>
            @error('color')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
         </div>

         <div class="col-md-12">
            <label for="validationCustom01" class="form-label">from date</label>
            <input type="date" name="from_date" class="form-control @error('from_date') is-invalid @enderror" id="validationCustom01" required>
            <div class="invalid-feedback">
               Please provide a valid from_date.
            </div>
            @error('from_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
         </div>

         <div class="col-md-12">
            <label for="validationCustom01" class="form-label">to date</label>
            <input type="date" name="to_date" class="form-control @error('to_date') is-invalid @enderror" id="validationCustom01" required>
            <div class="invalid-feedback">
               Please provide a valid to_date.
            </div>
            @error('to_date')
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

@endsection


@section('additional_scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js" integrity="sha512-0qU9M9jfqPw6FKkPafM3gy2CBAvUWnYVOfNPDYKVuRTel1PrciTj+a9P3loJB+j0QmN2Y0JYQmkBBS8W+mbezg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $('input[type="file"]').on('change',function(e){
            $('#upload_'+$(this).attr('rand_key')).remove();
            var rand_key = (Math.random() + 1).toString(36).substring(7);
            $(this).attr('rand_key',rand_key);
            if(e.target.files.length){
                $(this).attr('rand_key',rand_key);
                $('<div class="col-12 py-2 px-0" id="upload_'+rand_key+'"></div>').insertAfter(this);
                $.each(e.target.files,(key,value)=>{
                    $('#upload_'+rand_key).append('<div class="row d-flex m-0   btn" style="border:1px solid rgb(136 136 136 / 17%);max-width: 100%;padding: 5px;width: 220px;background: rgb(142 142 142 / 6%);margin-bottom:10px!important"><div style="max-height: 35px;overflow: hidden;display:flex;flex-flow: nowrap;" class="p-0 align-items-center">\
                        <span class="d-inline-block font-small " style="line-height: 1.2;opacity: 0.7;border-radius: 12px;overflow:hidden;width:71px">\
                            <span class="fal fa-cloud-download p-2 font-2 me-2" style="background:rgb(129 129 129 / 24%);border-radius: 12px;"></span>\
                        </span>\
                        <span style="direction: ltr;position: relative;top: -5px;height: 24px;overflow: hidden;width: 186px;" class="d-inline-block naskh font-small"> '+value.name+' </span>\
                            <span class="d-inline-block font-small px-2" style="position: relative;font-weight: bold;"> '+(Math.round(value.size/1000000 * 100) / 100).toFixed(2)+'M </span>\
                        </div>\
                    </div>')});
            }
        });

        function getRestaurants(item){
            axios.get('../../../admin/list_restaurants/'+item.value)
                .then((data) => {
                $('.restaurant_id').empty();
                $('.restaurant_id').append('<option value="">Choose Restaurant...</option>');
                for(restaurant of data.data){
                $('.restaurant_id').append('<option value="'+restaurant.id+'">'+restaurant.name+'</option>')
                }
            })
        }


        function getMeals(item){
            axios.get('../../../admin/list_meals/'+item.value)
                .then((data) => {
                $('.meal_id').empty();
                $('.meal_id').append('<option value="">Choose Meal...</option>');
                for(meal of data.data){
                $('.meal_id').append('<option value="'+meal.id+'">'+meal.name+'</option>')
                }
            })
        }
    </script>
@endsection
