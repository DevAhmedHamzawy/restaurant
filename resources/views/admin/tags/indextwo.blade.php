@extends('admin.layouts.main')

@section('content')

    <div class="card-transparent bg-transparent mb-0">
    <div class="card-header border-0">
       <div class="d-flex justify-content-center align-items-center">
            <h3>Tags</h3>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="btn btn-outline-primary"><a href="{{ route('tags.indextwo') }}">Show In Datatable</a></div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="btn btn-outline-primary"><a href="{{ route('tags.create') }}">Add New Tag</a></div>
        </div>




        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @foreach ($tags as $tag)
                                <button type="button" class="btn btn-outline-primary iq-col-masonry-block rounded-pill m-1">
                                    <a href="{{ route('subtags.index', $tag->id) }}">
                                        {{ $tag->name }}
                                    </a>
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

       </div>
    </div>


@endsection
