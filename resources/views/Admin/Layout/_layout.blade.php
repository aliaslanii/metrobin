<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <!-- meta -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo/logo.png') }}">

    <!-- Title -->
    <title>@yield('title')</title>

    <!-- Bootstrap css-->
    <link href="{{ loadA('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- Icons css-->
    <link href="{{ loadA('plugins/web-fonts/icons.css') }}" rel="stylesheet" />
    <!-- Style css-->
    <link href="{{ loadA('css-rtl/style/style.css') }}" rel="stylesheet">
    <link href="{{ loadA('css-rtl/skins.css') }}" rel="stylesheet">
    <link href="{{ loadA('css-rtl/dark-style.css') }}" rel="stylesheet">
    <link href="{{ loadA('css-rtl/colors/default.css') }}" rel="stylesheet">
    <link href="{{ loadA('css-rtl/style/Custom.css') }}" rel="stylesheet">
    <!-- Color css-->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ loadA('css-rtl/colors/color.css') }}">

    <!-- Select2 css -->
    <link href="{{ loadA('plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!-- add css -->
    @yield('link')
    <!-- Sidemenu css-->
    <link href="{{ loadA('css-rtl/sidemenu/sidemenu.css') }}" rel="stylesheet">
    <!-- Switcher css-->
    <link href="{{ loadA('switcher/css/switcher-rtl.css') }}" rel="stylesheet">
    <link href="{{ loadA('switcher/demo.css') }}" rel="stylesheet">
    <!-- ionicons-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body class="main-body leftmenu">
    <!-- Loader Main -->
    <div class="loader-div-main">
        <div class="modal-loader"></div>
    </div>
    <!-- End Loader Main -->
    <!-- Loader -->
    <div class="loader-div">
        <div class="modal-loader"></div>
    </div>
    <!-- End Loader -->
    <!-- Page -->
    <div class="page">

        <!-- Sidemenu -->
        <div class="main-sidebar main-sidebar-sticky side-menu">
            <div class="sidemenu-logo">
                <a class="main-logo" href="{{ route('Admin') }}">
                    <img src="{{ asset('images/logo/AliAslani.png') }}" class="header-brand-img desktop-logo"
                        alt="لوگو">
                    <img src="{{ asset('images/logo/AliAslani.png') }}" class="header-brand-img icon-logo"
                        alt="لوگو">
                    <img src="{{ asset('images/logo/AliAslani2.png') }}"
                        class="header-brand-img desktop-logo theme-logo" alt="لوگو">
                    <img src="{{ asset('images/logo/AliAslani2.png') }}" class="header-brand-img icon-logo theme-logo"
                        alt="لوگو">
                </a>
            </div>
            <div class="main-sidebar-body">
                <ul class="nav">
                    <li class="nav-header"><span class="nav-label">داشبورد</span></li>
                    <li class="nav-item @if (request()->is('admin')) active @endif">
                        <a class="nav-link" href="{{ route('Admin') }}"><span class="shape1"></span><span
                                class="shape2"></span><ion-icon class="icon-dashbord"
                                name="home-outline"></ion-icon><span class="sidemenu-label">داشبورد</span></a>
                    </li>
                    <li class="nav-item @if (request()->is('admin/Genre') || request()->is('admin/Genre/*')) active show @endif">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span
                                class="shape2"></span><ion-icon class="icon-adminindex"
                                name="grid-outline"></ion-icon><span class="sidemenu-label">ژانر ها</span><i
                                class="angle fe fe-chevron-left"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item @if (request()->is('admin/Genre')) active @endif">
                                <a class="nav-sub-link" href="{{ route('Genre') }}">لیست ژانر ها</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @if (request()->is('admin/Lang/*') || request()->is('admin/Lang')) active show @endif">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span>
                        <ion-icon class="icon-adminindex" name="language-outline"></ion-icon>
                        <span class="sidemenu-label">زبان ها</span><i class="angle fe fe-chevron-left"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item @if (request()->is('admin/Lang')) active @endif">
                                <a class="nav-sub-link" href="{{ route('Lang') }}">لیست زبان ها</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @if (request()->is('admin/Country/*') || request()->is('admin/Country')) active show @endif">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span>
                        <ion-icon class="icon-adminindex" name="earth-outline"></ion-icon>
                        <span class="sidemenu-label">کشور ها</span><i class="angle fe fe-chevron-left"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item @if (request()->is('admin/Country')) active @endif">
                                <a class="nav-sub-link" href="{{ route('Country') }}">لیست کشور ها</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @if (request()->is('admin/Ages/*') || request()->is('admin/Ages')) active show @endif">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span>
                        <ion-icon class="icon-adminindex" name="earth-outline"></ion-icon>
                        <span class="sidemenu-label">سن ها</span><i class="angle fe fe-chevron-left"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item @if (request()->is('admin/Ages')) active @endif">
                                <a class="nav-sub-link" href="{{ route('Ages') }}">لیست سن ها</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @if (request()->is('admin/Actor/*') || request()->is('admin/Actor')) active show @endif">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span>
                        <ion-icon class="icon-adminindex" name="earth-outline"></ion-icon>
                        <span class="sidemenu-label">بازیگر ها</span><i class="angle fe fe-chevron-left"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item @if (request()->is('admin/Actor')) active @endif">
                                <a class="nav-sub-link" href="{{ route('Actor') }}">لیست بازیگر ها</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @if (request()->is('admin/Director/*') || request()->is('admin/Director')) active show @endif">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span>
                        <ion-icon class="icon-adminindex" name="earth-outline"></ion-icon>
                        <span class="sidemenu-label">کارگردان ها</span><i class="angle fe fe-chevron-left"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item @if (request()->is('admin/Director')) active @endif">
                                <a class="nav-sub-link" href="{{ route('Director') }}">لیست کارگردان ها</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @if (request()->is('admin/Product') || request()->is('admin/Product/Create') || request()->is('admin/Product/Defective')) active show @endif">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2">
                            </span><ion-icon class="icon-adminindex"  name="videocam-outline"></ion-icon><span
                                class="sidemenu-label">فیلم و سریال</span><i class="angle fe fe-chevron-left"></i>
                        </a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item @if (request()->is('admin/Product')) active @endif">
                                <a class="nav-sub-link" href="{{ route('Movie') }}">لیست فیلم و سریال ها</a>
                            </li>
                            <li class="nav-sub-item @if (request()->is('admin/Product/Create')) active @endif">
                                <a class="nav-sub-link" href="{{ route('MovieCreate') }}">ایجاد فیلم</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @if (request()->is('admin/Commnets')) active show @endif">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span
                                class="shape2">
                            </span><ion-icon class="icon-adminindex"
                                name="chatbubble-ellipses-outline"></ion-icon><span class="sidemenu-label">کامنت
                                ها</span><i class="angle fe fe-chevron-left"></i>
                        </a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item @if (request()->is('admin/Commnets')) active @endif">
                                <a class="nav-sub-link" href="{{ route('Genre') }}">لیست کامنت ها </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @if (request()->is('admin/messages')) active show @endif">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span
                                class="shape2">
                            </span><ion-icon class="icon-adminindex" name="paper-plane-outline"></ion-icon><span
                                class="sidemenu-label">پیام کاربران</span><i class="angle fe fe-chevron-left"></i>
                        </a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item @if (request()->is('admin/messages')) active @endif">
                                <a class="nav-sub-link" href="{{ route('Genre') }}">لیست پیام های کاربران </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @if (request()->is('admin/Assets')) active show @endif">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span
                                class="shape2">
                            </span><ion-icon class="icon-adminindex" name="image-outline"></ion-icon><span
                                class="sidemenu-label">تصاویر وب سایت</span><i class="angle fe fe-chevron-left"></i>
                        </a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item @if (request()->is('admin/Assets')) active @endif">
                                <a class="nav-sub-link" href="{{ route('Genre') }}">لیست تصاویر وب سایت </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- End Sidemenu -->
        <!-- Main Header-->
        <div class="main-header side-header sticky">
            <div class="container-fluid">
                <div class="main-header-right">
                    <a class="main-header-menu-icon" href="#" id="mainSidebarToggle"><span></span></a>
                </div>
                <div class="main-header-center">
                    <div class="responsive-logo">
                        <a href="{{ route('Admin') }}"><img src="{{ asset('images/logo/AliAslani2.png') }}"
                                class="mobile-logo" alt="لوگو"></a>
                        <a href="{{ route('Admin') }}"><img src="{{ asset('images/logo/AliAslani2.png') }}"
                                class="mobile-logo-dark" alt="لوگو"></a>
                    </div>
                </div>
                <div class="main-header-right">
                    <div class="dropdown main-profile-menu">
                        <a class="d-flex" href="#">
                            <span class="main-img-user"><img style="width: 60%;height: 96%;" alt="آواتار"
                                    src="{{ asset('images/User-image/default.png') }}"></span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="header-navheading">
                                {{-- <h6 class="main-notification-title">{{ Auth::user()->name }}</h6> --}}
                            </div>
                            {{-- <a class="dropdown-item border-top" href="{{ route('AdminProfile') }}"> --}}
                            <i class="fe fe-user"></i> پروفایل من
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                <i class="fe fe-power"></i> خروج از سیستم
                            </a>
                        </div>
                    </div>
                    <button class="navbar-toggler navresponsive-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4"
                        aria-expanded="false" aria-label="تغییر پیمایش">
                        <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
                    </button><!-- Navresponsive closed -->
                </div>
            </div>
        </div>
        <!-- Main Content-->
        <div class="main-content side-content pt-0">
            <div class="container-fluid">
                <div class="inner-body">
                    <div class="container">
                        <div class="row">
                            @if (Session::get('success'))
                                <div class="col-md-5 col-sm-8 mt-2">
                                    <div id="successAlert" class="alert alert-success mg-b-0" role="alert">
                                        <button aria-label="بستن" class="close" data-bs-dismiss="alert"
                                            type="button">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>موفق : </strong>{{ Session::get('success') }}
                                    </div>
                                </div>
                            @endif
                            @if (Session::get('error'))
                                <div class="col-md-5 col-sm-8 mt-2">
                                    <div id="successAlert" class="alert alert-danger mg-b-0" role="alert">
                                        <button aria-label="بستن" class="close" data-bs-dismiss="alert"
                                            type="button">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>خطا : </strong>{{ Session::get('error') }}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    @yield('Content')
                </div>
            </div>
        </div>
        <!-- End Main Content-->

    </div>
    <!-- End Page -->

    <!-- Back-to-top -->
    <a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>
    <script>
        
        function hideAlert() {
            var successAlert = document.getElementById("successAlert");
            var errorAlert = document.getElementById("errorAlert");
            successAlert.style.display = "none";
            errorAlert.style.display = "none";
        }
        setTimeout(hideAlert, 5000);

    </script>
    <!-- Jquery js-->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <!-- Bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

    <!-- Perfect-scrollbar js -->
    <script src="{{ loadA('plugins/perfect-scrollbar/perfect-scrollbar.min-rtl.js') }}"></script>

    <!-- Sidemenu js -->
    <script src="{{ loadA('plugins/sidemenu/sidemenu-rtl.js') }}"></script>

    <!-- Sidebarjs -->
    <script src="{{ loadA('plugins/sidebar/sidebar-rtl.js') }}"></script>

    <!-- Select2 js-->
    <script src="{{ loadA('plugins/select2/js/select2.min.js') }}"></script>

    <!-- add js file -->
    @yield('script')

    <!-- Sticky js -->
    <script src="{{ loadA('js/sticky.js') }}"></script>

    <!-- Custom js -->
    <script src="{{ loadA('js/custom.js') }}"></script>

    <!-- Switcher js -->
    <script src="{{ loadA('switcher/js/switcher-rtl.js') }}"></script>

    <!-- dataTables-->
    <script src="{{ loadA('js/Custom/jquery.dataTables.min.js') }}"></script>
    <script src="{{ loadA('js/Custom/dataTables.bootstrap4.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(".loader-div-main").hide();
        });

        function addCommas(nStr) {
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }
    </script>
</body>

</html>
