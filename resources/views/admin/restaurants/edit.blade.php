@extends('admin.layouts.main')

@section('content')

<div class="content-inner mt-5 py-0">
    <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('restaurants.update', $restaurant->id) }}" enctype="multipart/form-data" id="form-wizard1" class="text-center mt-3">
                    @method('PUT')
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
                        <li id="personal" class="col-lg-6 col-md-6 mb-2 text-start">
                            <a href="javascript:void();">
                                <div class="iq-icon me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <span>Working Hours</span>
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
                                <h2 class="steps">Step 1 - 4</h2>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="exampleFormControlSelect1">Select Category</label>
                                    <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="exampleFormControlSelect1">
                                    <option selected="" disabled="">Select the category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if($restaurant->category_id == $category->id) selected @endif>{{ $category->name }}</option>
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
                                    <label class="form-label">Name: *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $restaurant->name }}" placeholder="Name" />
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
                                    <label class="form-label">Address: *</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $restaurant->address }}" placeholder="Address" />
                                    <div class="invalid-feedback">
                                        Please provide a valid name.
                                     </div>
                                     @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Description: *</label>
                                    <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $restaurant->description }}" placeholder="Description" />
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
                                    <label class="form-label">Delivery Time: *</label>
                                    <input type="text" class="form-control @error('delivery_time') is-invalid @enderror" name="delivery_time" value="{{ $restaurant->delivery_time }}" placeholder="Delivery Time" />
                                    <div class="invalid-feedback">
                                        Please provide a valid name.
                                     </div>
                                    @error('delivery_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Delivery Fees: *</label>
                                    <input type="text" class="form-control @error('delivery_fees') is-invalid @enderror" name="delivery_fees" value="{{ $restaurant->delivery_fees }}" placeholder="Delivery Fees" />
                                    <div class="invalid-feedback">
                                        Please provide a valid name.
                                    </div>
                                    @error('delivery_fees')
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
                                    @error('main_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <img src="{{ $restaurant->img_path }}" alt="" srcset="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">cover: *</label>
                                    <input type="file" class="form-control @error('main_cover') is-invalid @enderror" name="main_cover" />
                                    <img src="{{ $restaurant->cover_path }}" alt="" srcset="">
                                    @error('main_cover')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                <div id="map" style="height:550px;"></div>
                                <input type="hidden" name="latlng" id="latlng" class="form-control @error('latlng') is-invalid @enderror" />
                                    @error('latlng')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            </div>
                        </div>
                        <button type="button" name="next" class="btn btn-primary next action-button float-end rounded" value="Next" >Next</button>
                    </fieldset>
                    <fieldset>
                        <div class="form-card text-center">
                            <div class="row">
                            <div class="col-7">
                                <h3 class="mb-4">Working Hours:</h3>
                            </div>
                            <div class="col-5">
                                <h2 class="steps">Step 2 - 4</h2>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-md-12">

                                @php
                                    $days = \App\Models\Day::get(['name','id']);
                                @endphp

                                @foreach ($days as $day)

                                    @php
                                        $weekHour = \App\Models\WeekHour::whereDayId($day->id)->whereRestaurantId($restaurant->id)->first();
                                    @endphp


                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">{{ $day->name }}: *</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <input type="time" class="form-control" id="from{{ $loop->iteration }}" name="weekhours[from][]" value="{{ $weekHour->from }}" placeholder="From" />
                                        </div>

                                        <div class="col-md-3">
                                            <input type="time" class="form-control" id="to{{ $loop->iteration }}" name="weekhours[to][]" value="{{ $weekHour->to }}" placeholder="To" />
                                        </div>

                                        <div class="col-md-3" style="padding-left: 5%;">
                                            <label for="">Day Off</label>
                                            <input id="dayoff{{ $loop->iteration }}" type="checkbox">
                                        </div>
                                    </div>


                                @endforeach
                            </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary next action-button-next float-end me-3 rounded">Add New Restaurant</button>
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
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2obCxpDHFCwyBJe7z5EyrBTgdI1vm8RE&callback=initMap&language=ar"></script>

    <script>
        function initMap(lat = null, lng = null) {

            lat = null; lng = null;

            if(lat == null){ var myLatLng = {lat: {!! $restaurant->lat !!}, lng: {!! $restaurant->lng !!}} } else{ var myLatLng = {lat, lng} } ;

        var map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 13
        });

        var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Hello World!',
                draggable: true
            });

            google.maps.event.addListener(marker, 'dragend', function(marker) {
            var latLng = marker.latLng;
            document.getElementById('latlng').value = [latLng.lat(),latLng.lng()];
            });
            }
            function setMap(item)
            {
            let lat = $('option:selected', item).data("lat");
            let lng = $('option:selected', item).data("lng");
            initMap(Math.floor(lat), Math.floor(lng));
            }
    </script>

@endsection
