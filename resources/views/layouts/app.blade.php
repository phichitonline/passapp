<!doctype html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') {{ config('app.name') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url('assets/media/image/favicon.png') }}"/>
    {{-- <link rel="stylesheet" href="{{ url('vendors/datepicker/daterangepicker.css') }}" type="text/css"> --}}

    <!-- Main css -->
    <link rel="stylesheet" href="{{ url('vendors/bundle.css') }}" type="text/css">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    <style type="text/css">

        /* @media print {
            @page { margin: 0; }
            body { margin: 0.5cm; }
            .pageBreak {
                page-break-after: always;
                margin-top: 2cm;
            }
        } */

        @media print {
            /* font-family: Sarabun,arial,sans-serif; */
            /* font-size: 16px; */
            table, th, td {
                border: 2px solid black !important;
            }
        }

        u.dotted {
            border-bottom: 2px dotted #000;
            text-decoration: none;
        }
        u.dashed {
            border-bottom: 1px dashed #000;
            text-decoration: none;
        }

    </style>

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
                        {{-- <div class="header-search-form"> --}}
                            <form class="d-flex" method="GET" action="/search">
                                <button class="btn">
                                    <i class="ti-search"></i>
                                </button>
                                <input type="text" name="keyword" id="keyword" class="form-control" placeholder="ค้นหา...">
                            </form>
                        {{-- </div> --}}
                    </li>
                </ul>
            </div>

            <div class="header-right">
                <ul class="navbar-nav">
                    <li class="nav-item btn-mobile-search">
                        <a href="#" title="ค้นหา" class="nav-link">
                            <i data-feather="search"></i>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" title="เต็มจอ" data-toggle="fullscreen">
                            <i class="maximize" data-feather="maximize"></i>
                            <i class="minimize" data-feather="minimize"></i>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" title="แจ้งเตือน" data-toggle="dropdown">
                            <span class="badge badge-danger nav-link-notify">1</span>
                            <i data-feather="bell"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                            <div
                                class="bg-primary px-3 py-3 text-center d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">แจ้งเตือน</h6>
                                <small class="opacity-7">1 เหตุการณ์</small>
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
                        </div>
                    </li>

                    @guest
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" title="User menu" data-toggle="dropdown">
                            <span class="mr-2 d-sm-inline d-none">
                                <strong>ผู้ใช้งานทั่วไป</strong>
                            </span>
                            <figure class="avatar avatar-sm">
                                <img src="{{ url('assets/media/image/favicon.png') }}"
                                     class="rounded-circle"
                                     alt="avatar">
                            </figure>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                            <div class="list-group list-group-flush">
                                <a href="{{ route('login') }}" class="list-group-item">Login เข้าใช้งาน</a>
                                <a href="{{ route('register') }}" class="list-group-item">Register สมัครสมาชิก</a>
                            </div>
                        </div>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" title="User menu" data-toggle="dropdown">
                            <span class="mr-2 d-sm-inline d-none">
                                <strong>{{ Auth::user()->name }}</strong>
                            </span>
                            <figure class="avatar avatar-sm">
                                @if (Auth::user()->avatar == NULL)
                                    <img src="{{ url('assets/media/image/favicon.png') }}" class="rounded-circle" alt="">
                                @else
                                    <img src="{{ url('images/user/'.Auth::user()->avatar) }}" class="rounded-circle" alt="">
                                @endif
                            </figure>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                            <div class="text-center py-4"
                                 data-background-image="{{ url('assets/media/image/image1.jpg') }}">
                                <figure class="avatar avatar-lg mb-3 border-0">
                                    @if (Auth::user()->avatar == NULL)
                                        <img src="{{ url('assets/media/image/favicon.png') }}" class="rounded-circle" alt="">
                                    @else
                                        <img src="{{ url('images/user/'.Auth::user()->avatar) }}" class="rounded-circle" alt="">
                                    @endif
                                </figure>
                                <h5 class="mb-0">{{ Auth::user()->name }}</h5>
                            </div>
                            <div class="list-group list-group-flush">
                                <a href="/profile" class="list-group-item">ข้อมูล</a>
                                @if (Auth::user()->isadmin <= "1")
                                    <a href="{{ route('setting.index') }}" class="list-group-item">ตั้งค่า</a>
                                @endif
                                    <a class="list-group-item" href="#"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </div>
                        </div>
                    </li>
                    @endguest
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
                                <span>Home</span>
                            </a>
                        </li>
                        @foreach ($setting as $data)
                        @php
                            $module1 = $data->module1;
                            $module2 = $data->module2;
                            $module3 = $data->module3;
                            $module4 = $data->module4;
                            $module5 = $data->module5;
                        @endphp
                        @endforeach

                        @if($module1 == 1)
                        <li>
                            <a href="#" data-menu-target="#meqapp">
                                <span class="menu-tab-icon">
                                    <i data-feather="shopping-bag"></i>
                                </span>
                                <span>ศูนย์ฯ</span>
                            </a>
                        </li>
                        @endif
                        @if($module2 == 1)
                        <li>
                            <a href="#" data-menu-target="#repair">
                                <span class="menu-tab-icon">
                                    <i data-feather="tool"></i>
                                </span>
                                <span>ซ่อม</span>
                            </a>
                        </li>
                        @endif
                        {{-- <li>
                            <a href="#" data-menu-target="#setting">
                                <span class="menu-tab-icon">
                                    <i data-feather="database"></i>
                                </span>
                                <span>ตั้งค่า</span>
                            </a>
                        </li> --}}
                        <li>
                            <a href="#" data-menu-target="#setting">
                                <span class="menu-tab-icon">
                                    <i data-feather="database"></i>
                                </span>
                                <span>ตั้งค่า</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- ./ Menu tab -->

                <!-- Menu body -->
                <div class="navigation-menu-body">
                    <ul id="dashboards">
                        <li class="navigation-divider">Home</li>
                        <li>
                            <a @if(!request()->segment(1) || request()->segment(1) == 'dashboard') class="active"
                               @endif href="{{ route('dashboard') }}">
                               <span class="nav-link-icon" data-feather="grid"></span>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'durable') class="active"
                               @endif href="{{ route('durable.index') }}">
                                <span class="nav-link-icon" data-feather="layers"></span>
                                <span>ทะเบียนครุภัณฑ์</span>
                                <span class="badge badge-primary">{{ $count_durable }}</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'durable4') class="active"
                               @endif href="{{ route('durable.index4') }}">
                                <span class="nav-link-icon" data-feather="layers"></span>
                                <span>ขอจำหน่าย</span>
                                <span class="badge bg-danger-gradient text-white">{{ $count_durable4 }}</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'durable9') class="active"
                               @endif href="{{ route('durable.index9') }}">
                                <span class="nav-link-icon" data-feather="layers"></span>
                                <span>จำหน่ายแล้ว</span>
                                <span class="badge badge-danger">{{ $count_durable9 }}</span>
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'survey') class="active"
                               @endif href="{{ route('survey') }}">
                                <span class="nav-link-icon" data-feather="check-circle"></span>
                                <span>สำรวจ</span>
                                {{-- <span class="badge badge-primary">0</span> --}}
                            </a>
                        </li>
                        <li>
                            <a @if(request()->segment(1) == 'report') class="active"
                               @endif href="#">
                                <span class="nav-link-icon" data-feather="file"></span>
                                <span>รายงาน</span>
                                {{-- <span class="badge badge-primary">0</span> --}}
                            </a>
                        </li>
                        {{-- <li>
                            <a @if(request()->segment(1) == 'print') class="active"
                               @endif href="#">
                                <span class="nav-link-icon" data-feather="calendar"></span>
                                <span>พิมพ์</span>
                                <span class="badge badge-secondary">0</span>
                            </a>
                        </li> --}}
                        <li>
                            <a @if(request()->segment(1) == 'search') class="active"
                               @endif href="{{ route('didsearch') }}">
                                <span class="nav-link-icon" data-feather="search"></span>
                                <span>ค้นหา...</span>
                                {{-- <span class="badge badge-secondary">1</span> --}}
                            </a>
                        </li>
                    </ul>

                    <ul id="meqapp">
                        <li class="navigation-divider">ศูนย์เครื่องมือแพทย์</li>
                        <li>
                            <a @if(request()->segment(1) == 'meqlist') class="active"
                                @endif href="#">
                                <span class="nav-link-icon" data-feather="shopping-bag"></span>
                                <span>รายการเครื่องมือแพทย์</span>
                                <span class="badge badge-primary">0</span>
                            </a>
                            <a @if(request()->segment(1) == 'meqready') class="active"
                                @endif href="#">
                                <span class="nav-link-icon" data-feather="airplay"></span>
                                <span>เครื่องมือที่ว่าง</span>
                                <span class="badge badge-primary">0</span>
                            </a>
                            <a @if(request()->segment(1) == 'meqinuse') class="active"
                                @endif href="#">
                                <span class="nav-link-icon" data-feather="airplay"></span>
                                <span>เครื่องมือที่ใช้งานอยู่</span>
                                <span class="badge badge-primary">0</span>
                            </a>
                        </li>
                    </ul>

                    <ul id="repair">
                        <li class="navigation-divider">ระบบงานซ่อม</li>
                        <li>
                            <a @if(request()->segment(1) == 'repair') class="active"
                                @endif href="{{ route('repair.index') }}">
                                <span class="nav-link-icon" data-feather="tool"></span>
                                <span>รายการส่งซ่อม</span>
                                <span class="badge badge-warning text-white">{{ $repair_status1 }}</span>
                            </a>
                            <a @if(request()->segment(1) == 'repairing') class="active"
                                @endif href="#">
                                <span class="nav-link-icon" data-feather="tool"></span>
                                <span>รับซ่อมกำลังดำเนินการ</span>
                                <span class="badge badge-primary">{{ $repair_status2 }}</span>
                            </a>
                            <a @if(request()->segment(1) == 'repairreport') class="active"
                                @endif href="#">
                               <span class="nav-link-icon" data-feather="file"></span>
                                <span>รายงาน</span>
                            </a>
                        </li>
                    </ul>

                    <ul id="setting">
                        <li class="navigation-divider">Setting</li>
                        <li>
                            <a href="#">
                                <span class="nav-link-icon">
                                    <i data-feather="settings"></i>
                                </span>
                                <span>ตั้งค่า</span>
                            </a>
                            <ul>
                                <li>
                                    <a @if(request()->segment(1) == 'setting') class="active"
                                       @endif href="{{ route('setting.index') }}">ตั้งค่าระบบ</a></li>
                                <li>
                                    <a @if(request()->segment(1) == 'department') class="active"
                                       @endif href="{{ route('department.index') }}">หน่วยงาน</a></li>
                                <li>
                                    <a @if(request()->segment(1) == 'typefasgrp') class="active"
                                       @endif href="{{ route('typefasgrp.index') }}">ประเภทครุภัณฑ์</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            @guest
                            {{-- <a @if(request()->segment(1) == 'register') class="active"
                                @endif href="/register">
                               <span class="nav-link-icon" data-feather="user"></span>
                                <span>สมัครสมาชิก</span>
                            </a> --}}
                            @else
                            @if (Auth::user()->isadmin <= "1")
                            <a @if(request()->segment(1) == 'user') class="active"
                                @endif href="/user">
                                <span class="nav-link-icon" data-feather="users"></span>
                                <span>รายชื่อผู้ใช้งาน</span>
                                <span class="badge badge-primary">{{ $count_users }}</span>
                            </a>
                            @endif
                            <a @if(request()->segment(1) == 'profile') class="active"
                                @endif href="/profile">
                               <span class="nav-link-icon" data-feather="user"></span>
                                <span>ข้อมูลของคุณ</span>
                            </a>
                        </li>

                        @endguest
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
                <div>©2022 @foreach ($setting as $data){{ $data->s_name }}@endforeach</div>
                <div>
                    <nav class="nav">
                        <a href="#" class="nav-link">by Dr.GHOST</a>
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
