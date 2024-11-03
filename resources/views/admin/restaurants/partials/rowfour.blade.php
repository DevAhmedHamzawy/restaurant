<div class="row">

    <div class="col-md-12 col-lg-8">
        <div class="dish-card-vertical1">
            <div class="card dish-card3" style="margin: unset;height: 560px;">
                <div class="card-body ">
                    <div class="d-flex profile-img41">
                        <div class="d-flex align-items-center mb-4 mb-md-0">
                            <img src="{{ $restaurant->img_path }}" class="img-fluid avatar-rounded avatar-60" alt="profile-image">
                            <div class="d-flex ms-3">
                                <div>
                                    <h5 class="mb-1d">{{ $restaurant->name }}</h5>
                                    <div class="d-flex mb-2">
                                        @php $rating = $restaurant->reviews->isEmpty() ? 0 : round($restaurant->reviews->pluck('rating')->sum() / $restaurant->reviews->pluck('rating')->count(),1) @endphp
                                        @foreach(range(1,5) as $i)
                                            @if($rating >0)
                                                @if($rating >0.5)
                                                <svg width="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.1043 4.17701L14.9317 7.82776C15.1108 8.18616 15.4565 8.43467 15.8573 8.49218L19.9453 9.08062C20.9554 9.22644 21.3573 10.4505 20.6263 11.1519L17.6702 13.9924C17.3797 14.2718 17.2474 14.6733 17.3162 15.0676L18.0138 19.0778C18.1856 20.0698 17.1298 20.8267 16.227 20.3574L12.5732 18.4627C12.215 18.2768 11.786 18.2768 11.4268 18.4627L7.773 20.3574C6.87023 20.8267 5.81439 20.0698 5.98724 19.0778L6.68385 15.0676C6.75257 14.6733 6.62033 14.2718 6.32982 13.9924L3.37368 11.1519C2.64272 10.4505 3.04464 9.22644 4.05466 9.08062L8.14265 8.49218C8.54354 8.43467 8.89028 8.18616 9.06937 7.82776L10.8957 4.17701C11.3477 3.27433 12.6523 3.27433 13.1043 4.17701Z" fill="#FDB913"/>
                                                </svg>
                                                @else
                                                <svg width="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.1043 4.17701L14.9317 7.82776C15.1108 8.18616 15.4565 8.43467 15.8573 8.49218L19.9453 9.08062C20.9554 9.22644 21.3573 10.4505 20.6263 11.1519L17.6702 13.9924C17.3797 14.2718 17.2474 14.6733 17.3162 15.0676L18.0138 19.0778C18.1856 20.0698 17.1298 20.8267 16.227 20.3574L12.5732 18.4627C12.215 18.2768 11.786 18.2768 11.4268 18.4627L7.773 20.3574C6.87023 20.8267 5.81439 20.0698 5.98724 19.0778L6.68385 15.0676C6.75257 14.6733 6.62033 14.2718 6.32982 13.9924L3.37368 11.1519C2.64272 10.4505 3.04464 9.22644 4.05466 9.08062L8.14265 8.49218C8.54354 8.43467 8.89028 8.18616 9.06937 7.82776L10.8957 4.17701C11.3477 3.27433 12.6523 3.27433 13.1043 4.17701Z" fill="#FDB913"/>
                                                </svg>
                                                @endif
                                            @else
                                                <svg width="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.1043 4.17701L14.9317 7.82776C15.1108 8.18616 15.4565 8.43467 15.8573 8.49218L19.9453 9.08062C20.9554 9.22644 21.3573 10.4505 20.6263 11.1519L17.6702 13.9924C17.3797 14.2718 17.2474 14.6733 17.3162 15.0676L18.0138 19.0778C18.1856 20.0698 17.1298 20.8267 16.227 20.3574L12.5732 18.4627C12.215 18.2768 11.786 18.2768 11.4268 18.4627L7.773 20.3574C6.87023 20.8267 5.81439 20.0698 5.98724 19.0778L6.68385 15.0676C6.75257 14.6733 6.62033 14.2718 6.32982 13.9924L3.37368 11.1519C2.64272 10.4505 3.04464 9.22644 4.05466 9.08062L8.14265 8.49218C8.54354 8.43467 8.89028 8.18616 9.06937 7.82776L10.8957 4.17701C11.3477 3.27433 12.6523 3.27433 13.1043 4.17701Z" stroke="#232D42" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            @endif
                                            @php $rating--; @endphp
                                        @endforeach

                                        @php $rating = $restaurant->reviews->isEmpty() ? 0 : round($restaurant->reviews->pluck('rating')->sum() / $restaurant->reviews->pluck('rating')->count(),1) @endphp
                                        <small class="ms-1 text-dark">{{ $rating }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-4">
                        <h6 class="heading-title fw-bolder">{{ $restaurant->tags->pluck('name')->join(', ') }}</h6>
                        <div class="d-flex align-items-center">
                            <p class="mb-0">{{ $restaurant->today_working_hours }} (Today)</p>
                            <span class="badge bg-soft-primary ms-5 text-dark">{{ $restaurant->category->name }}</span>
                        </div>
                    </div>
                    <div class="py-2">
                        <h6 class="heading-title fw-bolder">Address & Telephone</h6>
                        <div class="d-flex mt-2">
                            <svg width="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 10.8421C21 16.9172 12 23 12 23C12 23 3 16.9172 3 10.8421C3 4.76697 7.02944 1 12 1C16.9706 1 21 4.76697 21 10.8421Z" stroke="#07143B" stroke-width="1.5"/>
                            <circle cx="12" cy="9" r="3" stroke="#07143B" stroke-width="1.5"/>
                            </svg>
                            <p class="mb-0 ms-3">{{ $restaurant->address }}</p>
                        </div>
                        <div class="d-flex mt-2">
                            <svg width="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.5317 12.4724C15.5208 16.4604 16.4258 11.8467 18.9656 14.3848C21.4143 16.8328 22.8216 17.3232 19.7192 20.4247C19.3306 20.737 16.8616 24.4943 8.1846 15.8197C-0.493478 7.144 3.26158 4.67244 3.57397 4.28395C6.68387 1.17385 7.16586 2.58938 9.61449 5.03733C12.1544 7.5765 7.54266 8.48441 11.5317 12.4724Z" stroke="#232D42" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <p class="mb-0 ms-3">{{ $restaurant->telephone ?? 'not added yet' }}</p>
                        </div>
                    </div>
                    <div class="py-3">
                        <h6 class="heading-title fw-bolder">Description</h6>
                        <div class="d-flex mt-2">
                            <p class="mb-0 ms-3">{{ $restaurant->description }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="card-header border-0">
                <h5>Gallery</h5>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                        @unless($restaurant->meals)
                            @foreach ($restaurant->meals[1]->media as $item)
                                @if ($loop->iteration == 1)
                                    <div class="d-grid gap-card grid-cols-2">
                                @endif
                                    <img src="{{ $item->meal_path }}" alt="post-image" class="img-fluid mt-4 rounded-1">
                                @if ($loop->iteration == 2)
                                    </div>
                                @endif
                                @if($loop->iteration == 3) @break @endif
                            @endforeach
                        @endunless
                </div>
            </div>
        </div>
    </div>

</div>
