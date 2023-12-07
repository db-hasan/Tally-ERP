<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="shortcut icon" href="{{asset('images/favicon.ico') }} " type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('backend/css/style.css') }} ">
    <link rel="stylesheet" href="{{asset('bootstrap/bootstrap.min.css') }} ">
    <link rel="stylesheet" href="{{asset('backend/css/jquery.dataTables.css') }} ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <title>Tally ERP Software</title>

    <style>
        #search-input {
            display: none;
            width: 0;
            transition: width 0.3s;
        }

    </style>
</head>

<body>
    <!--------------- Navigation ------------->
    <div class="sidebar">
        <ul>
            <div class="custom-scrollbar-sidebar py-2">
                <li class="mt-3">
                    <a href="{{ route('dashboard') }}">
                        <span class="icon">
                            <i class="fa-solid fa-house fa-lg"></i>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('product.index') }}">
                        <span class="icon">
                            <i class="fa-solid fa-layer-group fa-lg"></i>
                        </span>
                        <span class="title">Product</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('sales.index') }}">
                        <span class="icon">
                            <i class="fa-solid fa-cart-arrow-down fa-lg"></i>
                        </span>
                        <span class="title">Sales</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('collection.index') }}">
                        <span class="icon">
                            <i class="fa-regular fa-credit-card fa-lg"></i>
                        </span>
                        <span class="title">Colloction</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('report.balance') }}">
                        <span class="icon">
                            <i class="fa-solid fa-chart-column fa-lg"></i>
                        </span>
                        <span class="title">Customer Balance</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('report.stock') }}">
                        <span class="icon">
                            <i class="fa-solid fa-chart-column fa-lg"></i>
                        </span>
                        <span class="title">StockReport(Inprogress)</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('report.sales') }}">
                        <span class="icon">
                            <i class="fa-solid fa-chart-column fa-lg"></i>
                        </span>
                        <span class="title">SalesReport(Inprogress)</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('report.collection') }}">
                        <span class="icon">
                            <i class="fa-solid fa-chart-column fa-lg"></i>
                        </span>
                        <span class="title">CollectionReport(Inprogress)</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('dashboard') }}">
                        <span class="icon">
                            <i class="fa-solid fa-layer-group fa-lg"></i>
                        </span>
                        <span class="title">Service(Inprogress)</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('dashboard') }}">
                        <span class="icon">
                            <i class="fa-solid fa-percent fa-lg"></i>
                        </span>
                        <span class="title">Promo(Inprogress)</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('dashboard') }}">
                        <span class="icon">
                            <i class="fa-solid fa-baby-carriage fa-lg"></i>
                        </span>
                        <span class="title">Expense(Inprogress)</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('dashboard') }}">
                        <span class="icon">
                            <i class="fa-solid fa-users fa-lg"></i>
                        </span>
                        <span class="title">Users</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('dashboard') }}">
                        <span class="icon">
                            <i class="fa-solid fa-right-from-bracket fa-lg"></i>
                        </span>
                        <span class="title">Logout</span>
                    </a>
                </li>
            </div>
        </ul>
    </div>


    <!-------------------- Main -------------------->
    <div class="main">
        <div class="header d-flex fixed-top">
            <div class="logo text-center">
                <h3><a href="#">HelpsxIT</a></h3>
            </div>
            <div class="toggle">
                <i class="fa-solid fa-bars"></i>
            </div>
            <!-------------------- Design -------------------->
            <div class="header_right" style="width: 70%;">
            </div>
            <!-------------------- Design -------------------->

            <div class="text-end">
                <div class="user">
                    <button class="btn user_btn" type="button" id="search-button">
                        <div class="user_icon">
                            <i class="fa-solid fa-magnifying-glass fa-xl"></i>
                        </div>
                    </button>
                </div>
            </div>
            <input type="text" class="form-control" placeholder="Search" id="search-input">

            <div class="text-end">
                <div class="user">
                    <button class="btn user_btn" type="button">
                        <div class="user_icon">
                            <i class="fa-solid fa-circle-plus fa-xl"></i>
                        </div>
                    </button>
                </div>
            </div>

            <div class="text-end">
                <div class="user">
                    <button class="btn user_btn" type="button">
                        <div class="user_icon">
                            <i class="fa-solid fa-cart-plus fa-xl"></i>
                        </div>
                    </button>
                </div>
            </div>

            <div class="text-end">
                <div class="dropdown user">
                    <button class="btn user_btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user_icon">
                            <i class="fa-regular fa-comments fa-xl"></i>
                        </div>
                    </button>
                    <ul class="dropdown-menu " style="width: 250px;">
                        <li class="dropdown-item text-end">
                            <a class="dropdown-link" href="#">15 Notifications</a>
                        </li>
                        <li class="dropdown-item">
                            <div class="d-flex justify-content-between">
                                <a class="dropdown-link" href="#"><i class="fa-solid fa-chart-column"></i> Stock Report
                                </a>
                                <small>3 mins</small>
                            </div>
                        </li>
                        <li class="dropdown-item">
                            <div class="d-flex justify-content-between">
                                <a class="dropdown-link" href="#"><i class="fa-solid fa-heart-circle-minus"></i> User
                                    message
                                </a>
                                <small>3 mins</small>
                            </div>
                        </li>
                        <li class="dropdown-item">
                            <div class="d-flex justify-content-between">
                                <a class="dropdown-link" href="#"><i class="fa-solid fa-cart-plus"></i> Sales Report
                                </a>
                                <small>3 mins</small>
                            </div>
                        </li>
                        <li class="dropdown-item text-center">
                            <a class="dropdown-link" href="#">See All Notifications</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="text-end">
                <div class="dropdown user">
                    <button class="btn user_btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user_icon">
                            <i class="fa-regular fa-bell fa-xl"></i>
                        </div>
                    </button>
                    <ul class="dropdown-menu " style="width: 250px;">
                        <li class="dropdown-item text-end">
                            <a class="dropdown-link" href="#">15 Notifications</a>
                        </li>
                        <li class="dropdown-item">
                            <div class="d-flex justify-content-between">
                                <a class="dropdown-link" href="#"><i class="fa-solid fa-chart-column"></i> Stock Report
                                </a>
                                <small>3 mins</small>
                            </div>
                        </li>
                        <li class="dropdown-item">
                            <div class="d-flex justify-content-between">
                                <a class="dropdown-link" href="#"><i class="fa-solid fa-heart-circle-minus"></i> User
                                    message
                                </a>
                                <small>3 mins</small>
                            </div>
                        </li>
                        <li class="dropdown-item">
                            <div class="d-flex justify-content-between">
                                <a class="dropdown-link" href="#"><i class="fa-solid fa-cart-plus"></i> Sales Report
                                </a>
                                <small>3 mins</small>
                            </div>
                        </li>
                        <li class="dropdown-item text-center">
                            <a class="dropdown-link" href="#">See All Notifications</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="text-end pe-5">
                <div class="dropdown user">
                    <button class="btn dropdown-toggle user_btn" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{asset('images/user.jpg') }}" class="img-fluid" />
                        <span>{{ Auth::user()->name }}</span>
                    </button>
                    <ul class="dropdown-menu ">
                        <li class="dropdown-item">
                            <a class="dropdown-link" href="{{route('profile.edit')}}"><i class="fas fa-cog"></i> {{ __('Profile') }}</a>
                        </li>
                        <li class="dropdown-item">
                            <a class="dropdown-link" href="{{route('profile.edit')}}"><i class="fas fa-user-tie"></i> {{ __('Profile') }}</a>
                        </li>
                        <li class="dropdown-item">
                            <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-link" href="route('logout')" 
                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                            <i class="fas fa-sign-out-alt"></i> {{ __('Log Out') }}</a>
                            </form>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>

        
        

        <div class="px-4 pt-4" style="margin-top: 50px;">
            <!-- Button trigger modal -->


            {{-- ------------content part-------------- --}}
                @yield('content')
            {{-- ------------content part-------------- --}}
            
        </div>

    </div>

    <script src="{{asset('bootstrap/bootstrap.bundle.min.js') }} "></script>
    <script src="{{asset('library/jquery-3.7.1.min.js') }} "></script>
    <script src="{{asset('backend/js/dataTables.js') }} "></script>
    <script src="{{asset('backend/js/main.js') }} "></script>

    <script>
        $(document).ready(function () {
            $("#search-button").click(function () {
                $("#search-input").toggle(); // Toggle the visibility of the search input
                $("#search-input").toggleClass('active'); // Toggle the 'active' class
                if ($("#search-input").hasClass('active')) {
                    $("#search-input").focus(); // Automatically set focus to the input field when it's active
                    $("#search-input").css('width', '200px'); // Set the desired width when active
                } else {
                    $("#search-input").css('width', '0'); // Set the width to 0 when not active
                }
            });
        });
    </script>



    
    
</body>

</html>