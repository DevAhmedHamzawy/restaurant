<div class="row">
    <div class="col-lg-8">
        <div class="card mb-3" data-iq-gsap="onStart"
                     data-iq-opacity="0"
                     data-iq-position-y="-40"
                     data-iq-duration=".6"
                     data-iq-delay=".4"
                     data-iq-trigger="scroll"
                     data-iq-ease="none">
            <div class="card-body">
                <a href="#" class="">Home /</a>
                <a href="#" class="">{{ $restaurant->category->name }} /</a>
                <a href="#" class="">{{ $restaurant->name }}</a>
                <div class="mt-2 mb-3">
                    <ul class="nav nav-tabs mb-4 nav-justified" id="myTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="#delivery" class="nav-link active" id="delivery-tab" data-bs-toggle="tab" data-bs-target="#delivery" role="tab" aria-selected="true">
                                <div class="d-flex align-items-center mb-3">
                                    <svg class="bg-primary rounded-circle me-3" width="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M55.2727 57.875C57.3855 57.875 59.0909 56.0325 59.0909 53.75C59.0909 51.4675 57.3855 49.625 55.2727 49.625C53.16 49.625 51.4545 51.4675 51.4545 53.75C51.4545 56.0325 53.16 57.875 55.2727 57.875ZM59.0909 33.125H52.7273V40H64.08L59.0909 33.125ZM24.7273 57.875C26.84 57.875 28.5455 56.0325 28.5455 53.75C28.5455 51.4675 26.84 49.625 24.7273 49.625C22.6145 49.625 20.9091 51.4675 20.9091 53.75C20.9091 56.0325 22.6145 57.875 24.7273 57.875ZM60.3636 29L68 40V53.75H62.9091C62.9091 58.315 59.4982 62 55.2727 62C51.0473 62 47.6364 58.315 47.6364 53.75H32.3636C32.3636 58.315 28.9527 62 24.7273 62C20.5018 62 17.0909 58.315 17.0909 53.75H12V23.5C12 20.4475 14.2655 18 17.0909 18H52.7273V29H60.3636ZM17.0909 23.5V48.25H19.0255C20.4255 46.5725 22.4618 45.5 24.7273 45.5C26.9927 45.5 29.0291 46.5725 30.4291 48.25H47.6364V23.5H17.0909ZM34.9091 26.25L43.8182 35.875L34.9091 45.5V38.625H22.1818V33.125H34.9091V26.25Z" fill="white"/>
                                    </svg>
                                    <span class="text-dark">Tags</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#dining" class="nav-link" id="dining-tab" data-bs-toggle="tab" data-bs-target="#dining" role="tab" aria-selected="false">
                                <div class="d-flex align-items-center mb-3">
                                    <svg class="bg-primary rounded-circle me-3" width="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M46.875 25C43.45 25 40.625 28.8 40.625 33.5C40.625 37.2 42.375 40.275 44.8 41.45L45 41.55V57.5H48.75V41.55L48.95 41.475C51.375 40.3 53.125 37.225 53.125 33.525C53.125 28.825 50.325 25 46.875 25ZM36.25 25C35.575 25 35 25.55 35 26.25V32.5H33.125V26.25C33.125 25.55 32.575 25 31.875 25C31.175 25 30.625 25.55 30.625 26.25V32.5H28.75V26.25C28.75 25.55 28.2 25 27.5 25C26.8 25 26.25 25.55 26.25 26.25V35.75C26.25 38.075 27.85 40.025 30 40.575V57.5H33.75V40.575C35.9 40.025 37.5 38.075 37.5 35.75V26.25C37.5 25.55 36.95 25 36.25 25ZM60 20H20V60H60V20ZM60 15C62.75 15 65 17.25 65 20V60C65 62.75 62.75 65 60 65H20C17.25 65 15 62.75 15 60V20C15 17.25 17.25 15 20 15H60Z" fill="white"/>
                                    </svg>
                                    <span class="text-dark">Category</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#nightlife" class="nav-link" id="nightlife-tab" data-bs-toggle="tab" data-bs-target="#nightlife" role="tab" aria-selected="false">
                                <div class="d-flex align-items-center mb-3">
                                    <svg class="bg-primary rounded-circle me-3" width="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M29.7059 52.5C29.7059 53.2639 29.0441 53.8889 28.2353 53.8889C27.4265 53.8889 26.7647 53.2639 26.7647 52.5V35.8333C26.7647 35.0694 27.4265 34.4444 28.2353 34.4444C29.0441 34.4444 29.7059 35.0694 29.7059 35.8333V52.5ZM35.5882 52.5C35.5882 53.2639 34.9265 53.8889 34.1176 53.8889C33.3088 53.8889 32.6471 53.2639 32.6471 52.5V35.8333C32.6471 35.0694 33.3088 34.4444 34.1176 34.4444C34.9265 34.4444 35.5882 35.0694 35.5882 35.8333V52.5ZM41.4706 52.5C41.4706 53.2639 40.8088 53.8889 40 53.8889C39.1912 53.8889 38.5294 53.2639 38.5294 52.5V35.8333C38.5294 35.0694 39.1912 34.4444 40 34.4444C40.8088 34.4444 41.4706 35.0694 41.4706 35.8333V52.5ZM54.7059 23.3333H53.2353V20.5556C53.2353 19.0821 52.6155 17.6691 51.5124 16.6272C50.4092 15.5853 48.913 15 47.3529 15H20.8824C19.3223 15 17.8261 15.5853 16.7229 16.6272C15.6197 17.6691 15 19.0821 15 20.5556V56.6667C15 61.2667 18.9529 65 23.8235 65H44.4118C49.2824 65 53.2353 61.2667 53.2353 56.6667H54.7059C60.3824 56.6667 65 52.3056 65 46.9444V33.0556C65 27.6944 60.3824 23.3333 54.7059 23.3333ZM20.8824 20.5556H47.3529V23.3333H34.2824L33.9353 24.2556C33.4529 25.5278 31.9853 26.2833 30.65 26.0556L29.6265 25.8944L29.1176 26.7472C28.7383 27.3921 28.1844 27.9302 27.5126 28.3065C26.8408 28.6828 26.0752 28.8838 25.2941 28.8889C22.8618 28.8889 20.8824 27.0194 20.8824 24.7222V20.5556ZM47.3529 56.6667C47.3529 57.4034 47.0431 58.1099 46.4915 58.6309C45.9399 59.1518 45.1918 59.4444 44.4118 59.4444H23.8235C23.0435 59.4444 22.2954 59.1518 21.7438 58.6309C21.1922 58.1099 20.8824 57.4034 20.8824 56.6667V30.25C22.1147 31.1306 23.6353 31.6667 25.2941 31.6667C27.6 31.6667 29.7676 30.6222 31.1441 28.8889C33.2853 28.8889 35.2118 27.8028 36.25 26.1111H47.3529V56.6667ZM59.1176 46.9444C59.1176 49.2417 57.1382 51.1111 54.7059 51.1111H50.2941V28.8889H54.7059C57.1382 28.8889 59.1176 30.7583 59.1176 33.0556V46.9444Z" fill="white"/>
                                    </svg>
                                    <span class="text-dark">Favourites</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#nutririon" class="nav-link" id="nutririon-tab" data-bs-toggle="tab" data-bs-target="#nutririon" role="tab" aria-selected="false">
                                <div class="d-flex align-items-center mb-3">
                                    <svg class="bg-primary rounded-circle me-3" width="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M49.8259 65H32.1741C28.7694 65 26 62.6596 26 59.7804V36.9218C26 35.6059 27.4923 32.545 29.9424 27.6606C31.3607 24.8471 33.2899 20.9966 33.3101 20.2196C33.3101 19.8311 32.6077 19.1168 32.1338 18.6437C31.3339 17.8385 30.5071 17.002 31.0246 16.0496C31.5221 15.1285 32.8866 15 34.2982 15H47.685C49.4663 15.0125 50.7434 15.2068 51.2241 16.1091C51.7215 17.0647 50.8644 17.9168 50.1082 18.6719C49.641 19.1325 48.9386 19.828 48.9386 20.2165C48.9453 20.9997 50.8275 24.8972 52.2155 27.7389C54.5716 32.5794 56 35.6153 56 36.9187V59.7772C56 62.6596 53.2238 65 49.8259 65ZM34.3856 18.1832C35.1217 18.9413 35.9081 20.016 35.9081 21.1251C35.9081 22.2122 34.8192 24.6121 32.6648 28.9764C31.1557 32.0186 29.1055 36.1793 29.1055 37.1223V59.1882C29.1055 60.8581 30.702 62.2147 32.6514 62.2147H49.3318C51.2946 62.2147 52.8877 60.8581 52.8877 59.1882V37.1223C52.8877 36.1793 50.9149 32.0499 49.4663 29.0391C47.4363 24.775 46.0683 22.206 46.0683 21.1094C46.0683 19.9878 47.1069 18.9507 47.853 18.1957C47.9068 18.1362 47.5976 17.9826 47.2917 17.9826H34.6679C34.4898 17.9826 34.3285 18.1205 34.3856 18.1832Z" fill="white"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M49.2393 55.94C49.2393 58.1363 47.4882 58.719 45.3271 58.719H36.7096C34.5485 58.719 32.8008 58.1363 32.8008 55.94V35.4061C32.8008 33.2099 34.9182 40.2122 39.4723 36.8912C44.0298 33.5827 49.2393 33.2099 49.2393 35.4061V55.94Z" fill="white"/>
                                    </svg>
                                    <span class="text-dark">Rating</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div id="delivery" class="tab-pane fade in show active">
                        <div class="mt-3 iq-fetch">
                            @foreach ($restaurant->tags as $tag)
                                <button type="button" class="btn btn-outline-secondary rounded-1 iq-fetch-details">{{ $tag->name }}</button>
                            @endforeach
                        </div>
                    </div>
                    <div id="dining" class="tab-pane fade in">
                        <div class="mt-3 iq-fetch">
                            <button type="button" class="btn btn-outline-secondary rounded-1 iq-fetch-details">{{ $restaurant->category->name }}</button>
                        </div>
                    </div>
                    <div id="nightlife" class="tab-pane fade in">
                        <div class="mt-3 iq-fetch">
                            <button type="button" class="btn btn-outline-secondary rounded-1 iq-fetch-details">{{ $restaurant->favorites()->count() }} Favourites</button>
                        </div>
                    </div>
                    <div id="nutririon" class="tab-pane fade in">
                        <div class="mt-3 iq-fetch">
                            <button type="button" class="btn btn-outline-secondary rounded-1 iq-fetch-details">{{ $restaurant->reviews->isEmpty() ? 0 : round($restaurant->reviews->pluck('rating')->sum() / $restaurant->reviews->pluck('rating')->count(),1) }} Ratings</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-lg-4 mt-5">
        <div class="card dish-card profile-img3 "data-iq-gsap="onStart"
                     data-iq-opacity="0"
                     data-iq-position-y="-40"
                     data-iq-duration=".6"
                     data-iq-delay=".5"
                     data-iq-trigger="scroll"
                     data-iq-ease="none">
            <div class="card-body">
                @if($restaurant->bestMeal)
                    <div class="text-center ">
                        <div class="profile-img40 ">
                            <img src="{{ $restaurant->bestMeal->img_path }}" class="img-fluid rounded-pill" alt="profile-image">
                        </div>
                        <div class="profile-img52 ">
                            <h2 class="mb-2 profile-img53">Best Meal</h2>
                            <p class="mb-0">{{ $restaurant->bestMeal->name }}</p>
                        </div>
                    </div>
                @else
                    <div class="text-center">
                        Not Specified Yet
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
