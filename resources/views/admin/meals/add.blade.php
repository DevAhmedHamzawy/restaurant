@extends('admin.layouts.main')

@section('content')


<div class="content-inner mt-5 py-0">
    <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('meals.store', $restaurant->id) }}" enctype="multipart/form-data" id="form-wizard1" class="text-center mt-3">
                    @csrf
                    <ul id="top-tab-list" class="p-0 row list-inline">
                        <li class="col-lg-6 col-md-6 text-start mb-2 active" id="account">
                            <a href="javascript:void();">
                                <div class="iq-icon me-3">
                                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <span>Main Data</span>
                            </a>
                        </li>
                        <li id="features" class="col-lg-3 col-md-3 mb-2 text-start">
                            <a href="javascript:void();">
                                <div class="iq-icon me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <span>Features</span>
                            </a>
                        </li>
                        <li id="Ingredients" class="col-lg-3 col-md-3 mb-2 text-start">
                            <a href="javascript:void();">
                                <div class="iq-icon me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <span>Ingredients</span>
                            </a>
                        </li>
                        <li id="Ingredients" class="col-lg-3 col-md-3 mb-2 text-start">
                            <a href="javascript:void();">
                                <div class="iq-icon me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <span>Sizes</span>
                            </a>
                        </li>
                        <li id="Ingredients" class="col-lg-3 col-md-3 mb-2 text-start">
                            <a href="javascript:void();">
                                <div class="iq-icon me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <span>Options</span>
                            </a>
                        </li>
                        <li id="Ingredients" class="col-lg-3 col-md-3 mb-2 text-start">
                            <a href="javascript:void();">
                                <div class="iq-icon me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <span>Drinks</span>
                            </a>
                        </li>
                        <li id="Ingredients" class="col-lg-3 col-md-3 mb-2 text-start">
                            <a href="javascript:void();">
                                <div class="iq-icon me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <span>Sides</span>
                            </a>
                        </li>
                    </ul>
                    <!-- fieldsets -->
                    <fieldset>
                        <div class="form-card text-start">
                            <div class="row">
                            <div class="col-7">
                                <h3 class="mb-4">Main Data:</h3>
                            </div>
                            <div class="col-5">
                                <h2 class="steps">Step 1 - 7</h2>
                            </div>
                            </div>
                            <div class="row">
                                @include('admin.meals.partials.add.main_data')
                            </div>
                        </div>
                        <button type="button" name="next" class="btn btn-primary next action-button float-end rounded" value="Next" >Next</button>
                    </fieldset>
                    <fieldset>

                        <div class="form-card text-start">
                            <div class="row">
                            <div class="col-7">
                                <h3 class="mb-4">Features :</h3>
                            </div>
                            <div class="col-5">
                                <h2 class="steps">Step 2 - 7</h2>
                            </div>
                            </div>
                            <div class="row">

                                @include('admin.meals.partials.add.features')

                            </div>
                        </div>

                        <button type="button" name="next" class="btn btn-primary next action-button float-end rounded" value="Next" >Next</button>
                        <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-end me-3 rounded" value="Previous" >Previous</button>

                    </fieldset>


                    </fieldset>
                    <fieldset>
                        <div class="form-card text-start">
                            <div class="row">
                            <div class="col-7">
                                <h3 class="mb-4">Ingredients :</h3>
                            </div>
                            <div class="col-5">
                                <h2 class="steps">Step 3 - 7</h2>
                            </div>
                            </div>
                            <div class="row">

                               @include('admin.meals.partials.add.ingredients')


                            </div>
                        </div>
                        <button type="button" name="next" class="btn btn-primary next action-button float-end rounded" value="Next" >Next</button>
                        <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-end me-3 rounded" value="Previous" >Previous</button>
                    </fieldset>

                    <fieldset>
                        <div class="form-card text-start">
                            <div class="row">
                            <div class="col-7">
                                <h3 class="mb-4">Sizes :</h3>
                            </div>
                            <div class="col-5">
                                <h2 class="steps">Step 4 - 7</h2>
                            </div>
                            </div>
                            <div class="row">

                            @include('admin.meals.partials.add.sizes')


                            </div>
                        </div>
                        <button type="button" name="next" class="btn btn-primary next action-button float-end rounded" value="Next" >Next</button>
                        <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-end me-3 rounded" value="Previous" >Previous</button>
                    </fieldset>

                    <fieldset>
                        <div class="form-card text-start">
                            <div class="row">
                            <div class="col-7">
                                <h3 class="mb-4">options :</h3>
                            </div>
                            <div class="col-5">
                                <h2 class="steps">Step 5 - 7</h2>
                            </div>
                            </div>
                            <div class="row">

                            @include('admin.meals.partials.add.options')


                            </div>
                        </div>
                        <button type="button" name="next" class="btn btn-primary next action-button float-end rounded" value="Next" >Next</button>
                        <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-end me-3 rounded" value="Previous" >Previous</button>
                    </fieldset>


                    <fieldset>
                        <div class="form-card text-start">
                            <div class="row">
                            <div class="col-7">
                                <h3 class="mb-4">Drinks :</h3>
                            </div>
                            <div class="col-5">
                                <h2 class="steps">Step 6 - 7</h2>
                            </div>
                            </div>
                            <div class="row">

                            @include('admin.meals.partials.add.drinks')


                            </div>
                        </div>
                        <button type="button" name="next" class="btn btn-primary next action-button float-end rounded" value="Next" >Next</button>
                        <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-end me-3 rounded" value="Previous" >Previous</button>
                    </fieldset>


                    <fieldset>
                        <div class="form-card text-start">
                            <div class="row">
                            <div class="col-7">
                                <h3 class="mb-4">Sides :</h3>
                            </div>
                            <div class="col-5">
                                <h2 class="steps">Step 7 - 7</h2>
                            </div>
                            </div>
                            <div class="row">

                            @include('admin.meals.partials.add.sides')


                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary next action-button-next float-end me-3 rounded">Add New Meal</button>
                        <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-end me-3 rounded" value="Previous" >Previous</button>
                    </fieldset>

                </form>
                </div>
         </div>
      </div>
    </div>
</div>





@endsection


@section('additional_scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js" integrity="sha512-0qU9M9jfqPw6FKkPafM3gy2CBAvUWnYVOfNPDYKVuRTel1PrciTj+a9P3loJB+j0QmN2Y0JYQmkBBS8W+mbezg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    function getSubTags(item){
        axios.get('../../../list_subtags/'+item.value)
            .then((data) => {
            $('.tag_id').empty();
            $('.tag_id').append('<option value="">Choose Sub Tag  ...</option>');
            for(subtag of data.data){
            $('.tag_id').append('<option value="'+subtag.id+'">'+subtag.name+'</option>')
            }
        })
    }

    function addFeature(){
        featureForm = $('.feature-form').clone()

        $('.features-area').html(featureForm)
    }

    function addIngredient(){
        featureForm = $('.ingredient-form').clone()

        $('.ingredient-area').html(featureForm)
    }

    function addSize(){
        featureForm = $('.size-form').clone()

        $('.size-area').html(featureForm)
    }

    function addOption(){
        featureForm = $('.option-form').clone()

        $('.options-area').html(featureForm)
    }

    function addDrink(){
        featureForm = $('.drink-form').clone()

        $('.drinks-area').html(featureForm)
    }

    function addSide(){
        featureForm = $('.side-form').clone()

        $('.sides-area').html(featureForm)
    }

</script>


@endsection
