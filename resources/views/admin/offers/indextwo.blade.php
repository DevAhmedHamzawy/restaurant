@extends('admin.layouts.main')

@section('content')

    <div class="card-transparent bg-transparent mb-0">
    <div class="card-header border-0  ">
       <div class="d-flex justify-content-center align-items-center">
            <h3>offers</h3>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="btn btn-outline-primary"><a href="{{ route('offers.indextwo') }}">Show In Datatable</a></div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="btn btn-outline-primary"><a href="{{ route('offers.create') }}">Add New Offer</a></div>
        </div>



       </div>
    </div>


    <div class="container">
        <div class="row">

            @foreach ($offers as $offer)

            <div class="col-md-4 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h4>{{ $offer->name }}</h4>

                        <div class="pt-3">
                            <img src="{{ $offer->img_path }}" class="img-fluid avatar-rounded avatar-100" alt="profile-image">
                            <div class="d-flex justify-content-between ms-3 w-100">
                                <div style="margin: -105px 0 0px 129px;">
                                    <small class="text-dark fw-bolder heading-title">{{ $offer->category->name }}</small>
                                    <h5 class="mt-4">{{ $offer->description }}</h5>
                                    <h6 class="mt-4">{{ $offer->percentage }} %</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            @endforeach


        </div>
    </div>




@endsection
