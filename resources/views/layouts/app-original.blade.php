<!doctype html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Baston - Responsive Admin Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url('assets/media/image/favicon.png') }}"/>

    <!-- Main css -->
    <link rel="stylesheet" href="{{ url('vendors/bundle.css') }}" type="text/css">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

@yield('head')

<!-- App css -->
    <link rel="stylesheet" href="{{ url('assets/css/app.min.css') }}" type="text/css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
@if(trim($__env->yieldContent('bodyClass')))
<body class="@yield('bodyClass')">
@else
<body>
@endif
<!-- Preloader -->
<div class="preloader">
    <img class="logo" src="{{ url('assets/media/image/logo/logo2.png') }}" alt="logo">
    <img class="dark-logo" src="{{ url('assets/media/image/logo/dark-logo.png') }}" alt="logo dark">
    <div class="preloader-icon"></div>
</div>
<!-- ./ Preloader -->

<!-- Sidebar group -->
<div class="sidebar-group">
    <!-- Sidebar >>> Settings -->
    <div class="sidebar" id="settings">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Settings</h6>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item pl-0 pr-0">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                            <label class="custom-control-label" for="customSwitch1">Allow notifications.</label>
                        </div>
                    </li>
                    <li class="list-group-item pl-0 pr-0">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch2">
                            <label class="custom-control-label" for="customSwitch2">Hide user requests</label>
                        </div>
                    </li>
                    <li class="list-group-item pl-0 pr-0">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch3" checked>
                            <label class="custom-control-label" for="customSwitch3">Speed up demands</label>
                        </div>
                    </li>
                    <li class="list-group-item pl-0 pr-0">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch4" checked>
                            <label class="custom-control-label" for="customSwitch4">Hide menus</label>
                        </div>
                    </li>
                    <li class="list-group-item pl-0 pr-0">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch5">
                            <label class="custom-control-label" for="customSwitch5">Remember next visits</label>
                        </div>
                    </li>
                    <li class="list-group-item pl-0 pr-0">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch6">
                            <label class="custom-control-label" for="customSwitch6">Enable report
                                generation.</label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ./ Sidebar >>> Settings -->

    <!-- Sidebar >>> Chat list -->
    <div class="sidebar" id="chat-list">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-4">
                    <h6 class="card-title mb-0">Chats</h6>
                    <a href="{{ route('chat') }}" class="btn btn-primary btn-sm">New Chat</a>
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('chat') }}" class="list-group-item d-flex px-0 align-items-center">
                        <div class="pr-3">
                            <span class="avatar avatar-state-danger">
                                <img src="{{ url('assets/media/image/user/women_avatar3.jpg') }}"
                                     class="rounded-circle"
                                     alt="image">
                            </span>
                        </div>
                        <div class="flex-grow- 1">
                            <h6 class="mb-1">Cass Queyeiro</h6>
                            <span class="text-muted">
                                <i class="fa fa-image mr-1"></i> Photo
                            </span>
                        </div>
                        <div class="text-right ml-auto d-flex flex-column">
                            <span class="small text-muted">Yesterday</span>
                        </div>
                    </a>
                    <a href="{{ route('chat') }}" class="list-group-item d-flex px-0 align-items-center">
                        <div class="pr-3">
                            <span class="avatar avatar-state-warning">
                                <img src="{{ url('assets/media/image/user/man_avatar4.jpg') }}"
                                     class="rounded-circle"
                                     alt="image">
                            </span>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">Evered Asquith</h6>
                            <span class="text-muted">
                                <i class="fa fa-video-camera mr-1"></i> Video
                            </span>
                        </div>
                        <div class="text-right ml-auto d-flex flex-column">
                            <span class="small text-muted">Last week</span>
                        </div>
                    </a>
                    <a href="{{ route('chat') }}" class="list-group-item px-0 d-flex align-items-center">
                        <div class="pr-3">
                            <div class="avatar avatar-state-danger">
                                <span class="avatar-title bg-success rounded-circle">F</span>
                            </div>
                        </div>
                        <div>
                            <h6 class="mb-1">Francisco Ubsdale</h6>
                            <span class="text-muted">Hello how are you?</span>
                        </div>
                        <div class="text-right ml-auto d-flex flex-column">
                            <span class="small text-muted">2:32 PM</span>
                        </div>
                    </a>
                    <a href="{{ route('chat') }}" class="list-group-item px-0 d-flex align-items-center">
                        <div class="pr-3">
                            <div class="avatar avatar-state-success">
                                <img src="{{ url('assets/media/image/user/women_avatar1.jpg') }}"
                                     class="rounded-circle"
                                     alt="image">
                            </div>
                        </div>
                        <div>
                            <h6 class="mb-1">Natale Janu</h6>
                            <span class="text-muted">Hi!</span>
                        </div>
                        <div class="text-right ml-auto d-flex flex-column">
                            <span class="badge badge-primary badge-pill ml-auto mb-2">3</span>
                            <span class="small text-muted">08:27 PM</span>
                        </div>
                    </a>
                    <a href="{{ route('chat') }}" class="list-group-item d-flex px-0 align-items-center">
                        <div class="pr-3">
                            <span class="avatar avatar-state-warning">
                                <img src="{{ url('assets/media/image/user/women_avatar2.jpg') }}"
                                     class="rounded-circle"
                                     alt="image">
                            </span>
                        </div>
                        <div class="flex-grow- 1">
                            <h6 class="mb-1">Orelie Rockhall</h6>
                            <span class="text-muted">
                                <i class="fa fa-image mr-1"></i> Photo
                            </span>
                        </div>
                        <div class="text-right ml-auto d-flex flex-column">
                            <span class="small text-muted">Yesterday</span>
                        </div>
                    </a>
                    <a href="{{ route('chat') }}" class="list-group-item d-flex px-0 align-items-center">
                        <div class="pr-3">
                            <span class="avatar avatar-state-info">
                                <img src="{{ url('assets/media/image/user/man_avatar1.jpg') }}"
                                     class="rounded-circle"
                                     alt="image">
                            </span>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">Barbette Bolf</h6>
                            <span class="text-muted">
                                <i class="fa fa-video-camera mr-1"></i> Video
                            </span>
                        </div>
                        <div class="text-right ml-auto d-flex flex-column">
                            <span class="small text-muted">Last week</span>
                        </div>
                    </a>
                    <a href="{{ route('chat') }}" class="list-group-item d-flex px-0 align-items-center">
                        <div class="pr-3">
                            <span class="avatar avatar-state-secondary">
                                <span class="avatar-title bg-warning rounded-circle">D</span>
                            </span>
                        </div>
                        <div>
                            <h6 class="mb-1">Dudley Laborde</h6>
                            <span class="text-muted">Hello how are you?</span>
                        </div>
                        <div class="text-right ml-auto d-flex flex-column">
                            <span class="small text-muted">2:32 PM</span>
                        </div>
                    </a>
                    <a href="{{ route('chat') }}" class="list-group-item d-flex px-0 align-items-center">
                        <div class="pr-3">
                            <span class="avatar avatar-state-success">
                                <img src="{{ url('assets/media/image/user/man_avatar2.jpg') }}"
                                     class="rounded-circle"
                                     alt="image">
                            </span>
                        </div>
                        <div>
                            <h6 class="mb-1">Barbaraanne Riby</h6>
                            <span class="text-muted">Hi!</span>
                        </div>
                        <div class="text-right ml-auto d-flex flex-column">
                            <span class="small text-muted">08:27 PM</span>
                        </div>
                    </a>
                    <a href="{{ route('chat') }}" class="list-group-item d-flex px-0 align-items-center">
                        <div class="pr-3">
                            <span class="avatar avatar-state-danger">
                                <img src="{{ url('assets/media/image/user/women_avatar3.jpg') }}"
                                     class="rounded-circle"
                                     alt="image">
                            </span>
                        </div>
                        <div class="flex-grow- 1">
                            <h6 class="mb-1">Mariana Ondrousek</h6>
                            <span class="text-muted">
                                <i class="fa fa-image mr-1"></i> Photo
                            </span>
                        </div>
                        <div class="text-right ml-auto d-flex flex-column">
                            <span class="small text-muted">Yesterday</span>
                        </div>
                    </a>
                    <a href="{{ route('chat') }}" class="list-group-item d-flex px-0 align-items-center">
                        <div class="pr-3">
                            <span class="avatar avatar-state-warning">
                                <img src="{{ url('assets/media/image/user/man_avatar4.jpg') }}"
                                     class="rounded-circle"
                                     alt="image">
                            </span>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">Ruprecht Lait</h6>
                            <span class="text-muted">
                                <i class="fa fa-video-camera mr-1"></i> Video
                            </span>
                        </div>
                        <div class="text-right ml-auto d-flex flex-column">
                            <span class="small text-muted">Last week</span>
                        </div>
                    </a>
                    <a href="{{ route('chat') }}" class="list-group-item d-flex px-0 align-items-center">
                        <div class="pr-3">
                            <span class="avatar avatar-state-info">
                                <img src="{{ url('assets/media/image/user/man_avatar1.jpg') }}"
                                     class="rounded-circle"
                                     alt="image">
                            </span>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">Cosme Hubbold</h6>
                            <span class="text-muted">
                                <i class="fa fa-video-camera mr-1"></i> Video
                            </span>
                        </div>
                        <div class="text-right ml-auto d-flex flex-column">
                            <span class="small text-muted">Last week</span>
                        </div>
                    </a>
                    <a href="{{ route('chat') }}" class="list-group-item d-flex px-0 align-items-center">
                        <div class="pr-3">
                            <span class="avatar avatar-state-secondary">
                                <span class="avatar-title bg-secondary rounded-circle">M</span>
                            </span>
                        </div>
                        <div>
                            <h6 class="mb-1">Mallory Darch</h6>
                            <span class="text-muted">Hello how are you?</span>
                        </div>
                        <div class="text-right ml-auto d-flex flex-column">
                            <span class="small text-muted">2:32 PM</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Sidebar >>> Chat list -->
</div>
<!-- ./ Sidebar group -->

<!-- Layout wrapper -->
<div class="layout-wrapper">
    <!-- Header -->
    <div class="header d-print-none">
        <div class="header-container">
            <div class="header-left">
                <ul class="navbar-nav">
                    <li class="nav-item navigation-toggler">
                        <a href="#" class="nav-link">
                            <i class="ti-menu"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <div class="header-search-form">
                            <form class="d-flex">
                                <button class="btn">
                                    <i class="ti-search"></i>
                                </button>
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="header-right">
                <ul class="navbar-nav">
                    <li class="nav-item btn-mobile-search">
                        <a href="#" title="Search" class="nav-link">
                            <i data-feather="search"></i>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" title="Fullscreen" data-toggle="fullscreen">
                            <i class="maximize" data-feather="maximize"></i>
                            <i class="minimize" data-feather="minimize"></i>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" title="Notifications" data-toggle="dropdown">
                            <span class="badge badge-danger nav-link-notify">1</span>
                            <i data-feather="bell"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                            <div
                                class="bg-primary px-3 py-3 text-center d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Notifications</h6>
                                <small class="opacity-7">1 unread notifications</small>
                            </div>
                            <div class="dropdown-scroll">
                                <ul class="list-group list-group-flush">
                                    <li>
                                        <a href="#"
                                           class="list-group-item px-3 d-flex align-items-center hide-show-toggler">
                                            <div>
                                                <figure class="avatar mr-2">
                                                    <span
                                                        class="avatar-title bg-success-bright text-success rounded-circle">
                                                        <i class="ti-file"></i>
                                                    </span>
                                                </figure>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                    Your report is prepared
                                                    <i title="Mark as unread" data-toggle="tooltip"
                                                       class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                                </p>
                                                <span class="text-muted small">20 min ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                           class="list-group-item bg-primary-bright px-3 d-flex align-items-center hide-show-toggler">
                                            <div>
                                                <figure class="avatar mr-2">
                                                <span
                                                    class="avatar-title bg-success-bright text-success rounded-circle">
                                                    <i class="ti-user"></i>
                                                </span>
                                                </figure>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                    New customer registered
                                                    <i title="Mark as read" data-toggle="tooltip"
                                                       class="hide-show-toggler-item fa fa-circle-o font-size-11"></i>
                                                </p>
                                                <span class="text-muted small">20 min ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                           class="list-group-item px-3 d-flex align-items-center hide-show-toggler">
                                            <div>
                                                <figure class="avatar mr-2">
                                                <span
                                                    class="avatar-title bg-warning-bright text-warning rounded-circle">
                                                    <i class="ti-package"></i>
                                                </span>
                                                </figure>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                    New Order Recieved
                                                    <i title="Mark as unread" data-toggle="tooltip"
                                                       class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                                </p>
                                                <span class="text-muted small">45 sec ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                           class="list-group-item px-3 d-flex align-items-center hide-show-toggler">
                                            <div>
                                                <figure class="avatar mr-2">
                                                <span class="avatar-title bg-danger-bright text-danger rounded-circle">
                                                    <i class="ti-server"></i>
                                                </span>
                                                </figure>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                    Server Limit Reached!
                                                    <i title="Mark as unread" data-toggle="tooltip"
                                                       class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                                </p>
                                                <span class="text-muted small">55 sec ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                           class="list-group-item px-3 d-flex align-items-center hide-show-toggler">
                                            <div>
                                                <figure class="avatar mr-2">
                                                <span class="avatar-title bg-info-bright text-info rounded-circle">
                                                    <i class="ti-layers"></i>
                                                </span>
                                                </figure>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                    Apps are ready for update
                                                    <i title="" data-toggle="tooltip"
                                                       class="hide-show-toggler-item fa fa-check font-size-11"
                                                       data-original-title="Mark as unread"></i>
                                                </p>
                                                <span class="text-muted small">Yesterday</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="px-3 py-2 text-right border-top">
                                <ul class="list-inline small">
                                    <li class="list-inline-item mb-0">
                                        <a href="#">Mark All Read</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('chat') }}" title="Chat" class="nav-link">
                            <span class="badge badge-danger nav-link-notify">4</span>
                            <i data-feather="message-circle"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" title="Cart" class="nav-link" data-toggle="dropdown">
                            <i data-feather="shopping-bag"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                            <div
                                class="bg-primary px-3 py-3 text-center d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Cart</h6>
                                <small class="opacity-7">4 products</small>
                            </div>
                            <div class="dropdown-scroll">
                                <div class="list-group list-group-flush">
                                    <a href="#" class="list-group-item px-3 d-flex">
                                        <div>
                                            <figure class="avatar mr-3">
                                                <img src="{{ url('assets/media/image/products/product6.png') }}" class="rounded"
                                                     alt="Flowerpot">
                                            </figure>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                Flowerpot
                                                <i title="Close" data-toggle="tooltip"
                                                   class="hide-show-toggler-item ti-close"></i>
                                            </p>
                                            <span class="text-muted small">X $1,200</span>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item px-3 d-flex">
                                        <div>
                                            <figure class="avatar mr-3">
                                                <img src="{{ url('assets/media/image/products/product3.png') }}" class="rounded"
                                                     alt="Plate">
                                            </figure>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                Plate
                                                <i title="Close" data-toggle="tooltip"
                                                   class="hide-show-toggler-item ti-close"></i>
                                            </p>
                                            <span class="text-muted small">X $250</span>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item px-3 d-flex">
                                        <div>
                                            <figure class="avatar mr-3">
                                                <img src="{{ url('assets/media/image/products/product7.png') }}"
                                                     class="rounded" alt="Wall Clock">
                                            </figure>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                Wall Clock
                                                <i title="Close" data-toggle="tooltip"
                                                   class="hide-show-toggler-item ti-close"></i>
                                            </p>
                                            <span class="text-muted small">X $100</span>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item px-3 d-flex">
                                        <div>
                                            <figure class="avatar mr-3">
                                                <img src="{{ url('assets/media/image/products/product1.png') }}" class="rounded"
                                                     alt="Vase">
                                            </figure>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                Vase
                                                <i title="Close" data-toggle="tooltip"
                                                   class="hide-show-toggler-item ti-close"></i>
                                            </p>
                                            <span class="text-muted small">X $1,200</span>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item px-3 d-flex">
                                        <div>
                                            <figure class="avatar mr-3">
                                                <img src="{{ url('assets/media/image/products/product2.png') }}" class="rounded"
                                                     alt="Glasses">
                                            </figure>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                Glasses
                                                <i title="Close" data-toggle="tooltip"
                                                   class="hide-show-toggler-item ti-close"></i>
                                            </p>
                                            <span class="text-muted small">X $200</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="px-3 py-2 border-top text-right">
                                <p class="d-flex justify-content-between align-items-center mb-1 small">
                                    <span>Sub Total</span>
                                    <span>$1,650</span>
                                </p>
                                <p class="d-flex justify-content-between align-items-center mb-1 small">
                                    <span>Taxes</span>
                                    <span>$15</span>
                                </p>
                                <p class="d-flex justify-content-between align-items-center mb-1 small font-weight-bold">
                                    <span>Total</span>
                                    <span>$1,675</span>
                                </p>
                                <button class="btn btn-primary btn-block mt-2">
                                    Order and Payment <i class="ti-arrow-right ml-2"></i>
                                </button>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" title="Settings" data-sidebar-target="#settings">
                            <i data-feather="settings"></i>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" title="User menu" data-toggle="dropdown">
                            <span class="mr-2 d-sm-inline d-none">
                                Hi! <strong>Bony Gidden</strong>
                            </span>
                            <figure class="avatar avatar-sm">
                                <img src="{{ url('assets/media/image/user/man_avatar3.jpg') }}"
                                     class="rounded-circle"
                                     alt="avatar">
                            </figure>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                            <div class="text-center py-4"
                                 data-background-image="{{ url('assets/media/image/image1.jpg') }}">
                                <figure class="avatar avatar-lg mb-3 border-0">
                                    <img src="{{ url('assets/media/image/user/man_avatar3.jpg') }}"
                                         class="rounded-circle" alt="image">
                                </figure>
                                <h5 class="mb-0">Bony Gidden</h5>
                            </div>
                            <div class="list-group list-group-flush">
                                <a href="{{ route('profile') }}" class="list-group-item">Profile</a>
                                <a href="#" class="list-group-item" data-sidebar-target="#settings">Settings</a>
                                {{-- <a href="{{ route('logout') }}" class="list-group-item text-danger">Sign Out!</a> --}}
                                <a class="list-group-item text-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sign Out!') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </div>
                            <div class="pb-0 p-4">
                                <div class="mb-4">
                                    <h6 class="d-flex justify-content-between">
                                        Completed Tasks
                                        <span class="float-right">%68</span>
                                    </h6>
                                    <div class="progress" style="height:5px;">
                                        <div class="progress-bar bg-secondary" role="progressbar"
                                             style="width: 68%;" aria-valuenow="68" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div>
                                    <h6 class="d-flex justify-content-between">
                                        Storage
                                        <span>%25</span>
                                    </h6>
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 40%;"
                                             aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item header-toggler">
                    <a href="#" class="nav-link">
                        <i class="ti-arrow-down"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- ./ Header -->

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Navigation -->
        <div class="navigation">
            <!-- Logo -->
            <div class="navigation-header">
                <a class="navigation-logo" href="{{ url('/') }}">
                    <img class="logo" src="{{ url('assets/media/image/logo/logo.png') }}" alt="logo">
                    <img class="dark-logo" src="{{ url('assets/media/image/logo/dark-logo.png') }}" alt="dark logo">
                    <img class="small-logo" src="{{ url('assets/media/image/logo/small-logo.png') }}" alt="small logo">
                    <img class="small-dark-logo" src="{{ url('assets/media/image/logo/small-dark-logo.png') }}" alt="small dark logo">
                </a>
                <a href="#" class="small-navigation-toggler"></a>
                <a href="#" class="btn btn-danger mobile-navigation-toggler">
                    <i class="ti-close"></i>
                </a>
            </div>
            <!-- ./ Logo -->

            <!-- Menu wrapper -->
            <div class="navigation-menu-wrapper">
                <!-- Menu tab -->
                <div class="navigation-menu-tab">
                    <ul>
                        <li>
                            <a href="#" data-menu-target="#dashboards">
                                <span class="menu-tab-icon">
                                    <i data-feather="pie-chart"></i>
                                </span>
                                <span>Dashboards</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" data-menu-target="#apps">
                                <span class="menu-tab-icon">
                                    <i data-feather="globe"></i>
                                </span>
                                <span>Apps</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" data-menu-target="#components">
                                <span class="menu-tab-icon">
                                    <i data-feather="layers"></i>
                                </span>
                                <span>Components</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" data-menu-target="#forms">
                                <span class="menu-tab-icon">
                                    <i data-feather="mouse-pointer"></i>
                                </span>
                                <span>Forms</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" data-menu-target="#plugins">
                                <span class="menu-tab-icon">
                                    <i data-feather="gift"></i>
                                </span>
                                <span>Plugins</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" data-menu-target="#pages">
                                <span class="menu-tab-icon">
                                    <i data-feather="copy"></i>
                                </span>
                                <span>Pages</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" data-menu-target="#other">
                                <span class="menu-tab-icon">
                                    <i data-feather="arrow-up-right"></i>
                                </span>
                                <span>Other</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- ./ Menu tab -->

                <!-- Menu body -->
                <div class="navigation-menu-body">
                    <ul id="dashboards">
                        <li class="navigation-divider">Dashboards</li>
                        <li>
                            <a @if(!request()->segment(1) || request()->segment(1) == 'ecommerce-dashboard') class="active"
                               @endif href="{{ route('ecommerce-dashboard') }}">
                                <span class="nav-link-icon" data-feather="shopping-cart"></span>
                                <span>E-commerce</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'analytics-dashboard') class="active"
                               @endif href="{{ route('analytics-dashboard') }}">
                                <span class="nav-link-icon" data-feather="bar-chart-2"></span>
                                <span>Analytics</span>
                                <span class="badge badge-success">New</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'helpdesk-dashboard') class="active"
                               @endif href="{{ route('helpdesk-dashboard') }}">
                                <span class="nav-link-icon" data-feather="life-buoy"></span>
                                <span>Helpdesk</span>
                            </a>
                        </li>
                        <li class="navigation-divider">E-commerce Pages</li>
                        <li>
                            <a @if(request()->segment(1) == 'orders') class="active"
                               @endif href="{{ route('orders') }}">
                                <span class="nav-link-icon" data-feather="box"></span>
                                <span>Orders</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'product-list') class="active"
                               @endif href="{{ route('product-list') }}">
                                <span class="nav-link-icon" data-feather="list"></span>
                                <span>Product List</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'product-grid') class="active"
                               @endif href="{{ route('product-grid') }}">
                                <span class="nav-link-icon" data-feather="grid"></span>
                                <span>Product Grid</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'product-detail') class="active"
                               @endif href="{{ route('product-detail') }}">
                                <span class="nav-link-icon" data-feather="file-text"></span>
                                <span>Product Detail</span>
                            </a>
                        </li>
                    </ul>
                    <ul id="apps">
                        <li class="navigation-divider">Apps</li>
                        <li>
                            <a @if(request()->segment(1) == 'chat') class="active"
                               @endif href="{{ route('chat') }}">
                                <span class="nav-link-icon" data-feather="message-circle"></span>
                                <span>Chat</span>
                                <span class="badge badge-danger">5</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'mail') class="active"
                               @endif href="{{ route('mail') }}">
                                <span class="nav-link-icon" data-feather="mail"></span>
                                <span>Mail</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'todo-list') class="active"
                               @endif href="{{ route('todo-list') }}">
                                <span class="nav-link-icon" data-feather="check-circle"></span>
                                <span>Todo List</span>
                                <span class="badge badge-warning small-badge">2</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'file-manager') class="active"
                               @endif href="{{ route('file-manager') }}">
                                <span class="nav-link-icon" data-feather="file"></span>
                                <span>File Manager</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'calendar') class="active"
                               @endif href="{{ route('calendar') }}">
                                <span class="nav-link-icon" data-feather="calendar"></span>
                                <span>Calendar</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'gallery') class="active"
                               @endif href="{{ route('gallery') }}">
                                <span class="nav-link-icon" data-feather="image"></span>
                                <span>Gallery</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'invoice') class="active"
                               @endif href="{{ route('invoice') }}">
                                <span class="nav-link-icon" data-feather="book"></span>
                                <span>Invoice</span>
                            </a>
                        </li>
                    </ul>
                    <ul id="components">
                        <li class="navigation-divider">Components</li>
                        <li>
                            <a href="#">
                                <span class="nav-link-icon">
                                    <i data-feather="layers"></i>
                                </span>
                                <span>Basic Components</span>
                            </a>
                            <ul>
                                <li>
                                    <a @if(request()->segment(1) == 'alert') class="active"
                                       @endif href="{{ route('alert') }}">Alerts</a></li>
                                <li>
                                    <a @if(request()->segment(1) == 'accordion') class="active"
                                       @endif href="{{ route('accordion') }}">Accordion</a></li>
                                <li>
                                    <a @if(request()->segment(1) == 'buttons') class="active"
                                       @endif href="{{ route('buttons') }}">Buttons</a></li>
                                <li>
                                    <a @if(request()->segment(1) == 'dropdown') class="active"
                                       @endif href="{{ route('dropdown') }}">Dropdown</a></li>
                                <li>
                                    <a @if(request()->segment(1) == 'list-group') class="active"
                                       @endif href="{{ route('list-group') }}">List Group</a></li>
                                <li>
                                    <a @if(request()->segment(1) == 'pagination') class="active"
                                       @endif href="{{ route('pagination') }}">Pagination</a></li>
                                <li>
                                    <a @if(request()->segment(1) == 'typography') class="active"
                                       @endif href="{{ route('typography') }}">Typography</a></li>
                                <li>
                                    <a @if(request()->segment(1) == 'media-object') class="active"
                                       @endif href="{{ route('media-object') }}">Media Object</a>
                                </li>
                                <li>
                                    <a @if(request()->segment(1) == 'progress') class="active"
                                       @endif href="{{ route('progress') }}">Progress</a></li>
                                <li>
                                    <a @if(request()->segment(1) == 'modal') class="active"
                                       @endif href="{{ route('modal') }}">Modal</a></li>
                                <li>
                                    <a @if(request()->segment(1) == 'spinners') class="active"
                                       @endif href="{{ route('spinners') }}">Spinners</a></li>
                                <li>
                                    <a @if(request()->segment(1) == 'navs') class="active"
                                       @endif href="{{ route('navs') }}">Navs</a></li>
                                <li>
                                    <a @if(request()->segment(1) == 'tab') class="active"
                                       @endif href="{{ route('tab') }}">Tab</a></li>
                                <li>
                                    <a @if(request()->segment(1) == 'tooltip') class="active"
                                       @endif href="{{ route('tooltip') }}">Tooltip</a></li>
                                <li>
                                    <a @if(request()->segment(1) == 'popovers') class="active"
                                       @endif href="{{ route('popovers') }}">Popovers</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <span class="nav-link-icon">
                                    <i data-feather="square"></i>
                                </span>
                                <span>Cards</span>
                            </a>
                            <ul>
                                <li>
                                    <a @if(request()->segment(1) == 'basic-cards') class="active"
                                       @endif href="{{ route('basic-cards') }}">Basic Cards </a></li>
                                <li>
                                    <a @if(request()->segment(1) == 'image-cards') class="active"
                                       @endif href="{{ route('image-cards') }}">Image Cards </a></li>
                                <li>
                                    <a @if(request()->segment(1) == 'scrollable-cards') class="active"
                                       @endif href="{{ route('scrollable-cards') }}">Scrollable Cards</a></li>
                                <li>
                                    <a @if(request()->segment(1) == 'other-cards') class="active"
                                       @endif href="{{ route('other-cards') }}">Others Cards</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <span class="nav-link-icon">
                                    <i data-feather="grid"></i>
                                </span>
                                <span>Tables</span>
                            </a>
                            <ul>
                                <li>
                                    <a @if(request()->segment(1) == 'basic-tables') class="active"
                                       @endif href="{{ route('basic-tables') }}">Basic Tables</a></li>
                                <li>
                                    <a @if(request()->segment(1) == 'dataTable') class="active"
                                       @endif href="{{ route('dataTable') }}">Datatable</a></li>
                                <li>
                                    <a @if(request()->segment(1) == 'responsive-tables') class="active"
                                       @endif href="{{ route('responsive-tables') }}">Responsive Tables</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'avatar') class="active"
                               @endif href="{{ route('avatar') }}">
                                <span class="nav-link-icon">
                                    <i data-feather="aperture"></i>
                                </span>
                                <span>Avatar</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'icons') class="active"
                               @endif href="{{ route('icons') }}">
                                <span class="nav-link-icon">
                                    <i data-feather="anchor"></i>
                                </span>
                                <span>Icons</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'colors') class="active"
                               @endif href="{{ route('colors') }}">
                                <span class="nav-link-icon">
                                    <i data-feather="droplet"></i>
                                </span>
                                <span>Colors</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'divider') class="active"
                               @endif href="{{ route('divider') }}">
                                <span class="nav-link-icon">
                                    <i data-feather="git-commit"></i>
                                </span>
                                <span>Divider</span>
                            </a>
                        </li>
                    </ul>
                    <ul id="forms">
                        <li class="navigation-divider">Forms</li>
                        <li>
                            <a @if(request()->segment(1) == 'basic-forms') class="active"
                               @endif href="{{ route('basic-forms') }}">
                                <span class="nav-link-icon" data-feather="book"></span>
                                <span>Basic Forms</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'custom-forms') class="active"
                               @endif href="{{ route('custom-forms') }}">
                                <span class="nav-link-icon" data-feather="disc"></span>
                                <span>Custom Forms</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'advanced-forms') class="active"
                               @endif href="{{ route('advanced-forms') }}">
                                <span class="nav-link-icon" data-feather="framer"></span>
                                <span>Advanced Forms</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'form-validation') class="active"
                               @endif href="{{ route('form-validation') }}">
                                <span class="nav-link-icon" data-feather="toggle-left"></span>
                                <span>Form Validation</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'form-wizard') class="active"
                               @endif href="{{ route('form-wizard') }}">
                                <span class="nav-link-icon" data-feather="sliders"></span>
                                <span>Form Wizard</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'form-repeater') class="active"
                               @endif href="{{ route('form-repeater') }}">
                                <span class="nav-link-icon" data-feather="repeat"></span>
                                <span>Form Repeater</span>
                            </a>
                        </li>
                    </ul>
                    <ul id="plugins">
                        <li class="navigation-divider">Plugins</li>
                        <li>
                            <a @if(request()->segment(1) == 'sweet-alert') class="active"
                               @endif href="{{ route('sweet-alert') }}">
                                <span class="nav-link-icon" data-feather="alert-triangle"></span>
                                <span>Sweet Alert</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'lightbox') class="active"
                               @endif href="{{ route('lightbox') }}">
                                <span class="nav-link-icon" data-feather="crop"></span>
                                <span>Lightbox</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'toast') class="active"
                               @endif href="{{ route('toast') }}">
                                <span class="nav-link-icon" data-feather="clipboard"></span>
                                <span>Toast</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'tour') class="active"
                               @endif href="{{ route('tour') }}">
                                <span class="nav-link-icon" data-feather="sliders"></span>
                                <span>Tour</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'slick-slide') class="active"
                               @endif href="{{ route('slick-slide') }}">
                                <span class="nav-link-icon" data-feather="layers"></span>
                                <span>Slick Slide</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'nestable') class="active"
                               @endif href="{{ route('nestable') }}">
                                <span class="nav-link-icon" data-feather="align-right"></span>
                                <span>Nestable</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'file-upload') class="active"
                               @endif href="{{ route('file-upload') }}">
                                <span class="nav-link-icon" data-feather="upload-cloud"></span>
                                <span>File Upload</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'datepicker') class="active"
                               @endif href="{{ route('datepicker') }}">
                                <span class="nav-link-icon" data-feather="calendar"></span>
                                <span>Datepicker</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'timepicker') class="active"
                               @endif href="{{ route('timepicker') }}">
                                <span class="nav-link-icon" data-feather="clock"></span>
                                <span>Timepicker</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'colorpicker') class="active"
                               @endif href="{{ route('colorpicker') }}">
                                <span class="nav-link-icon" data-feather="eye"></span>
                                <span>Colorpicker</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="nav-link-icon" data-feather="activity"></span>
                                <span>Charts</span>
                            </a>
                            <ul>
                                <li>
                                    <a @if(request()->segment(1) == 'apexchart') class="active"
                                       @endif href="{{ route('apexchart') }}">Apex Chart</a>
                                </li>
                                <li>
                                    <a @if(request()->segment(1) == 'justgage') class="active"
                                       @endif href="{{ route('justgage') }}">Justgage</a>
                                </li>
                                <li>
                                    <a @if(request()->segment(1) == 'peity') class="active"
                                       @endif href="{{ route('peity') }}">Peity</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <span class="nav-link-icon">
                                    <i data-feather="map-pin"></i>
                                </span>
                                <span>Maps</span>
                            </a>
                            <ul>
                                <li>
                                    <a @if(request()->segment(1) == 'google-map') class="active"
                                       @endif href="{{ route('google-map') }}">Google Map</a>
                                </li>
                                <li>
                                    <a @if(request()->segment(1) == 'vector-map') class="active"
                                       @endif href="{{ route('vector-map') }}">Vector Map</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul id="pages">
                        <li class="navigation-divider">Pages</li>
                        <li>
                            <a href="#">
                                <span class="nav-link-icon" data-feather="users"></span>
                                <span>User Pages</span>
                            </a>
                            <ul>
                                <li>
                                    <a @if(request()->segment(1) == 'profile') class="active"
                                       @endif href="{{ route('profile') }}">Profile</a></li>
                                <li>
                                    <a @if(request()->segment(1) == 'user-list') class="active"
                                       @endif href="{{ route('user-list') }}">User List</a></li>
                                <li>
                                    <a @if(request()->segment(1) == 'user-edit') class="active"
                                       @endif href="{{ route('user-edit') }}">User Edit</a></li>
                                <li><a href="{{ route('login') }}" target="_blank">Login</a></li>
                                <li><a href="{{ route('register') }}" target="_blank">Register</a></li>
                                <li><a href="{{ route('recovery-password') }}" target="_blank">Recovery Password</a>
                                </li>
                                <li><a href="{{ route('lock-screen') }}" target="_blank">Lock Screen</a></li>
                            </ul>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'timeline') class="active"
                               @endif href="{{ route('timeline') }}">
                                <span class="nav-link-icon" data-feather="hash"></span>
                                <span>Timeline</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'pricing-table') class="active"
                               @endif href="{{ route('pricing-table') }}">
                                <span class="nav-link-icon" data-feather="dollar-sign"></span>
                                <span>Pricing Table</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'pricing-table-2') class="active"
                               @endif href="{{ route('pricing-table-2') }}">
                                <span class="nav-link-icon" data-feather="dollar-sign"></span>
                                <span>Pricing Table</span>
                                2</a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'search-result') class="active"
                               @endif href="{{ route('search-result') }}">
                                <span class="nav-link-icon" data-feather="search"></span>
                                <span>Search Result</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'blank-page') class="active"
                               @endif href="{{ route('blank-page') }}">
                                <span class="nav-link-icon" data-feather="layout"></span>
                                <span>Blank Page</span>

                            </a>
                        </li>
                        <li>
                            <a href="{{ route('404') }}" target="_blank">
                                <span class="nav-link-icon" data-feather="frown"></span>
                                <span>404</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('503') }}" target="_blank">
                                <span class="nav-link-icon" data-feather="frown"></span>
                                <span>503</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('mean-at-work') }}" target="_blank">
                                <span class="nav-link-icon" data-feather="tool"></span>
                                <span>Mean at Work</span>
                            </a>
                        </li>
                    </ul>
                    <ul id="other">
                        <li class="navigation-divider">Other</li>
                        <li>
                            <a href="#">
                                <span class="nav-link-icon">
                                    <i data-feather="mail"></i>
                                </span>
                                <span>Email Templates</span>
                            </a>
                            <ul>
                                <li><a target="_blank" href="{{ route('email-template-basic') }}">Basic</a></li>
                                <li><a target="_blank" href="{{ route('email-template-alert') }}">Alert</a></li>
                                <li><a target="_blank" href="{{ route('email-template-billing') }}">Billing</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <span class="nav-link-icon">
                                    <i data-feather="menu"></i>
                                </span>
                                <span>Menu Level</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="#">Menu Level</a>
                                    <ul>
                                        <li>
                                            <a href="#">Menu Level </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- ./ Menu body -->
            </div>
            <!-- ./ Menu wrapper -->
        </div>
        <!-- ./ Navigation -->

        <!-- Content body -->
        <div class="content-body">
            <!-- Content -->
            <div class="content">
                @yield('content')
            </div>
            <!-- ./ Content -->

            <!-- Footer -->
            <footer class="content-footer">
                <div>© {{ date('Y') }} Baston - <a href="http://laborasyon.com" target="_blank">Laborasyon</a></div>
                <div>
                    <nav class="nav">
                        <a href="https://themeforest.net/licenses/standard" class="nav-link">Licenses</a>
                        <a href="#" class="nav-link">Change Log</a>
                        <a href="#" class="nav-link">Get Help</a>
                    </nav>
                </div>
            </footer>
            <!-- ./ Footer -->
        </div>
        <!-- ./ Content body -->
    </div>
    <!-- ./ Content wrapper -->
</div>
<!-- ./ Layout wrapper -->

<!-- Main scripts -->
<script src="{{ url('vendors/bundle.js') }}"></script>

@yield('script')

<!-- App scripts -->
<script src="{{ url('assets/js/app.min.js') }}"></script>
</body>
</html>
