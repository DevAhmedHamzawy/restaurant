@extends('admin.layouts.main')

@section('content')

<div class="content-inner mt-5 py-0">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom-0 pb-0">
                    <h2 class="card-title">Meal Details</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 col-xl-5  mb-4 mt-xl-0">
                            <img src="{{ $meal->img_path }}" class="img-fluid rounded" alt="image" style="height: 100%;">
                        </div>
                        <div class="col-lg-12 col-xl-7">
                            <h4 class="mb-2">{{ $meal->name }}</h4>
                            <p class="mb-4">{{ $meal->description }}</p>
                            <div class="mb-5">
                                <h4 class="mb-3">Ingredients</h4>
                                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-2 g-lg-3">
                                    @foreach ($meal->ingredients as $ingredient)
                                        <div class="col">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ $ingredient->img_path }}" class="img-fluid avatar-48" alt="image">
                                                <div class="ms-3">
                                                    <h6 class="heading-title">{{ $ingredient->name }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mb-0">
                                <h4 class="mb-3">Nutritional Values</h4>
                                <div class="row row-cols-8 row-cols-lg-8 g-2 g-lg-3">
                                    @foreach ($meal->features as $feature)
                                        <div class="col">
                                            <div class="card rounded-1">
                                                <div class="card-body p-2 text-center">
                                                    <h6 class="mb-1 text-primary heading-title">{{ $feature->value }}</h6>
                                                    <h6 class="mb-1 heading-title">{{ $feature->name }}</h6>
                                                    <span  class="text-dark">
                                                        <small>Kcal</small>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6  col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Meal Info</h4>
                </div>
                <div class="card-body">
                    <ul class="list-inline list-main p-0 m-0 text-dark">
                        <li class="py-4 pt-0">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="heading-title">Restaurant Name</h6>
                                <h6 class="heading-title">{{ $meal->restaurant->name }}</h6>
                            </div>
                        </li>
                        <li class="py-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="heading-title">Tag</h6>
                                <h6 class="heading-title">{{ $meal->tag->name }}</h6>
                            </div>
                        </li>
                        <li class="py-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="heading-title">price</h6>
                                <span class="heading-title">{{ $meal->price_value }}</span>
                            </div>
                        </li>
                    </ul>
                    <div class="d-flex align-items-center justify-content-between mt-5">
                        <a href="{{ route('meals.edit', [$meal->restaurant->id, $meal->id]) }}" class="btn btn-primary rounded">Edit</a>
                        <a href="{{ route('meals.delete', [$meal->restaurant->id, $meal->id]) }}" class="btn btn-primary rounded" style="margin-top: -5px">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-2">Veg Burger</h4>
                    <p class="mb-0">The world’s favourite US burger!</p>
                </div>
                <div class="card-body text-dark py-4">
                    <table class="table table-sm table-borderless">
                        <tr class="text-primary">
                            <th>image</th>
                            <th>Add-ons</th>
                            <th>Price</th>
                        </tr>
                        <tbody class="p-0">
                            @foreach ($meal->options as $option)
                                <tr>
                                    <td><img src="{{ $option->img_path }}" width="50" alt="" srcset=""></td>
                                    <td>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="16" height="16" rx="2" fill="#B9EBD4"/>
                                        <circle cx="8" cy="8" r="4" fill="#3BB77E"/>
                                        </svg>
                                        {{ $option->name }}
                                    </td>
                                    <td>{{ $option->price_value }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <table class="table table-sm table-borderless">
                        <tr class="text-primary">
                            <th>image</th>
                            <th>drink</th>
                            <th>Price</th>
                        </tr>
                        <tbody class="p-0">
                            @foreach ($meal->drinks as $drink)
                                <tr>
                                    <td><img src="{{ $drink->img_path }}" width="50" alt="" srcset=""></td>
                                    <td>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="16" height="16" rx="2" fill="#B9EBD4"/>
                                        <circle cx="8" cy="8" r="4" fill="#3BB77E"/>
                                        </svg>
                                        {{ $drink->name }}
                                    </td>
                                    <td>{{ $drink->price_value }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                    <table class="table table-sm table-borderless">
                        <tr class="text-primary">
                            <th>image</th>
                            <th>side</th>
                            <th>Price</th>
                        </tr>
                        <tbody class="p-0">
                            @foreach ($meal->sides as $side)
                                <tr>
                                    <td><img src="{{ $side->img_path }}" width="50" alt="" srcset=""></td>
                                    <td>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="16" height="16" rx="2" fill="#B9EBD4"/>
                                        <circle cx="8" cy="8" r="4" fill="#3BB77E"/>
                                        </svg>
                                        {{ $side->name }}
                                    </td>
                                    <td>{{ $side->price_value }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <table class="table table-sm table-borderless">
                        <tr class="text-primary">
                            <th>size</th>
                            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                            <th>Price</th>
                        </tr>
                        <tbody class="p-0">
                            @foreach ($meal->sizes as $size)
                                <tr>
                                    <td>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="16" height="16" rx="2" fill="#B9EBD4"/>
                                        <circle cx="8" cy="8" r="4" fill="#3BB77E"/>
                                        </svg>
                                        {{ $size->name }}
                                    </td>
                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    <td>{{ $size->price_value }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
      </div>

@endsection
