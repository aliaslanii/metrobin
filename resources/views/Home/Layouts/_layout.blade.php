<!doctype html>
<html lang="en-US" dir="rtl">
   <head>
      <!-- Required meta tags -->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>@yield('title')</title>
      <!-- Favicon -->
      <link rel="icon" type="image/png" href="{{ asset('images/logo/favicon.ico') }}">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{ load('css/bootstrap.min.css') }}">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="{{ load('css/typography.css') }}">
      <!-- Style -->
      <link rel="stylesheet" href="{{ load('css/style.css') }}" />
      <!-- Responsive -->
      <link rel="stylesheet" href="{{ load('css/responsive.css') }}" />
      <!-- swiper -->
      <link rel="stylesheet" href="{{ load('css/swiper.min.css') }}">
      <link rel="stylesheet" href="{{ load('css/swiper.css') }}">
      @yield('Link')
   </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
      <!-- Header -->
      <header id="main-header">
         <div class="main-header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <nav class="navbar navbar-expand-lg navbar-light p-0">
                        <a href="#" class="navbar-toggler c-toggler" data-toggle="collapse"
                           data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                           aria-expanded="false" aria-label="Toggle navigation">
                           <div class="navbar-toggler-icon" data-toggle="collapse">
                              <span class="navbar-menu-icon navbar-menu-icon--top"></span>
                              <span class="navbar-menu-icon navbar-menu-icon--middle"></span>
                              <span class="navbar-menu-icon navbar-menu-icon--bottom"></span>
                           </div>
                        </a>
                        <a class="navbar-brand" href="{{ route('home') }}"> <img class="img-fluid logo" src="{{ asset('images/logo/logoindex.png') }}" loading="lazy"
                           alt="metrobin" /> </a>
                        <div class="mobile-more-menu">
                           <a href="javascript:void(0);" class="more-toggle" id="dropdownMenuButton"
                              data-toggle="more-toggle" aria-haspopup="true" aria-expanded="false">
                           <i class="ri-more-line"></i>
                           </a>
                           <div class="more-menu" aria-labelledby="dropdownMenuButton">
                              <div class="navbar-right position-relative">
                                 <ul class="d-flex align-items-center justify-content-end list-inline m-0">
                                    <li>
                                       <a href="#" class="search-toggle">
                                       <i class="ri-search-line"></i>
                                       </a>
                                       <div class="search-box iq-search-bar">
                                          <form action="{{ route('SearchMovie') }}" method="GET" class="searchbox">
                                             <div class="form-group position-relative">
                                                <input type="text" name="q" class="text search-input font-size-12"
                                                   placeholder="نام فیلم یا سریال رو وارد کنید">
                                                <button type="submit"><i class="search-link ri-search-line"></i></button>
                                             </div>
                                          </form>
                                       </div>
                                    </li>
                                    <li class="nav-item nav-icon">
                                       <a href="#" class="search-toggle position-relative">
                                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22"
                                             height="22" class="noti-svg">
                                             <path fill="none" d="M0 0h24v24H0z" />
                                             <path
                                                d="M18 10a6 6 0 1 0-12 0v8h12v-8zm2 8.667l.4.533a.5.5 0 0 1-.4.8H4a.5.5 0 0 1-.4-.8l.4-.533V10a8 8 0 1 1 16 0v8.667zM9.5 21h5a2.5 2.5 0 1 1-5 0z" />
                                          </svg>
                                          <span class="bg-danger dots"></span>
                                       </a>
                                       <div class="iq-sub-dropdown">
                                          <div class="iq-card shadow-none m-0">
                                             <div class="iq-card-body">
                                                <a href="#" class="iq-sub-card">
                                                   <div class="media align-items-center">
                                                      <img src="images/notify/thumb-1.jpg" class="img-fluid mr-3" loading="lazy"
                                                         alt="metrobin" />
                                                      <div class="media-body">
                                                         <h6 class="mb-0 ">Boop Bitty</h6>
                                                         <small class="font-size-12">همین الان</small>
                                                      </div>
                                                   </div>
                                                </a>
                                                <a href="#" class="iq-sub-card">
                                                   <div class="media align-items-center">
                                                      <img src="images/notify/thumb-2.jpg" class="img-fluid mr-3" loading="lazy"
                                                         alt="metrobin" />
                                                      <div class="media-body">
                                                         <h6 class="mb-0 ">آخرین نفس</h6>
                                                         <small class="font-size-12">15 دقیقه قبل</small>
                                                      </div>
                                                   </div>
                                                </a>
                                                <a href="#" class="iq-sub-card">
                                                   <div class="media align-items-center">
                                                      <img src="images/notify/thumb-3.jpg" class="img-fluid mr-3" loading="lazy"
                                                         alt="metrobin" />
                                                      <div class="media-body">
                                                         <h6 class="mb-0 ">کمپ قهرمانان</h6>
                                                         <small class="font-size-12">1 ساعت قبل</small>
                                                      </div>
                                                   </div>
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <a href="#" class="iq-user-dropdown search-toggle d-flex align-items-center">
                                       <img src="images/user/user.jpg" class="img-fluid avatar-40 rounded-circle" loading="lazy"
                                          alt="user">
                                       </a>
                                       <div class="iq-sub-dropdown iq-user-dropdown">
                                          <div class="iq-card shadow-none m-0">
                                             <div class="iq-card-body p-0 pl-3 pr-3">
                                                <a href="manage-profile.html" class="iq-sub-card setting-dropdown">
                                                   <div class="media align-items-center">
                                                      <div class="right-icon">
                                                         <i class="ri-file-user-line text-primary"></i>
                                                      </div>
                                                      <div class="media-body ml-3">
                                                         <h6 class="mb-0 ">پروفایل کاربری</h6>
                                                      </div>
                                                   </div>
                                                </a>
                                                <a href="setting.html" class="iq-sub-card setting-dropdown">
                                                   <div class="media align-items-center">
                                                      <div class="right-icon">
                                                         <i class="ri-settings-4-line text-primary"></i>
                                                      </div>
                                                      <div class="media-body ml-3">
                                                         <h6 class="mb-0 ">تنظیمات</h6>
                                                      </div>
                                                   </div>
                                                </a>
                                                <a href="pricing-plan-1.html" class="iq-sub-card setting-dropdown">
                                                   <div class="media align-items-center">
                                                      <div class="right-icon">
                                                         <i class="ri-settings-4-line text-primary"></i>
                                                      </div>
                                                      <div class="media-body ml-3">
                                                         <h6 class="mb-0 ">تمدید یا خرید اشتراک</h6>
                                                      </div>
                                                   </div>
                                                </a>
                                                <a href="login.html" class="iq-sub-card setting-dropdown">
                                                   <div class="media align-items-center">
                                                      <div class="right-icon">
                                                         <i class="ri-logout-circle-line text-primary"></i>
                                                      </div>
                                                      <div class="media-body ml-3">
                                                         <h6 class="mb-0">خروج</h6>
                                                      </div>
                                                   </div>
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                           <div class="menu-main-menu-container">
                              <ul id="top-menu" class="navbar-nav ml-auto">
                                 <li class="menu-item active">
                                    <a href="{{ route('home') }}">صفحه اصلی</a>
                                 </li>
                                 <li class="menu-item">
                                    <a href="{{ route('FavoriteMovie') }}">فیلم ها</a>
                                    <ul class="sub-menu">
                                      @foreach (Geners() as $Genur)
                                       <li class="menu-item"><a href="{{ route('GenreMovie',['id' => $Genur->id]) }}">{{ $Genur->Name }}</a></li>
                                      @endforeach
                                    </ul>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <div class="navbar-right menu-right">
                           <ul class="d-flex align-items-center list-inline m-0">
                              <li class="nav-item nav-icon">
                                 <a href="#" class="search-toggle device-search">
                                 <i class="ri-search-line"></i>
                                 </a>
                                 <div class="search-box iq-search-bar d-search">
                                    <form action="{{ route('SearchMovie') }}" method="GET" class="searchbox">
                                       <div class="form-group position-relative">
                                          <input type="text" name="q" class="text search-input font-size-12"
                                             placeholder="نام فیلم یا سریال رو وارد کنید">
                                          <button type="submit"><i class="search-link ri-search-line"></i></button>
                                       </div>
                                    </form>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- Header End -->
    
      @yield('Content')
      <footer id="contact" class="footer-one iq-bg-dark">
         <!-- Address -->
         <div class="footer-top">
            <div class="container-fluid">
               <div class="row footer-standard">
                  <div class="col-lg-6">
                     <div class="widget text-left">
                        <div class="menu-footer-link-1-container">
                           <ul id="menu-footer-link-1" class="menu p-0">
                              <li id="menu-item-7316"
                                 class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7316">
                                 <a href="{{ route('about') }}">درباره ما</a>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="widget text-left mt-2">
                        <div class="textwidget">
                           <p><small>در متروبین، امکان دانلود آخرین فیلم‌ها و سریال‌های ایران و جهان با کیفیت بالا و زیرنویس فارسی و دوبله را دارید. ما با افتخار به عنوان منبعی معتبر و قابل اعتماد در ارائه بهترین محتواهای سینمای ایران و جهان برای شما و همراهان عزیز شما حاضریم.
                           </small>
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                     
                  </div>
                  <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                     <h6 class="footer-link-title">
                        ما را دنبال کنید :
                     </h6>
                     <ul class="info-share">
                        <li><a target="_blank" href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a target="_blank" href="#"><i class="fa fa-telegram"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <!-- Address END -->
      </footer>
      <!-- MainContent End-->
      <!-- back-to-top -->
      <div id="back-to-top">
         <a class="top" href="#top" id="top"> <i class="fa fa-angle-up"></i> </a>
      </div>
      <!-- back-to-top End -->
      <!-- jQuery, Popper JS -->
      <script src="{{ load('js/jquery-3.5.1.min.js') }}"></script>
      <script src="{{ load('js/popper.min.js') }}"></script>
      <!-- Bootstrap JS -->
      <script src="{{ load('js/bootstrap.min.js') }}"></script>
      <!-- owl carousel Js -->
      <script src="{{ load('js/owl.carousel.min.js') }}"></script>
      <!-- select2 Js -->
      <script src="{{ load('js/select2.min.js') }}"></script>
      <!-- Magnific Popup-->
      <script src="{{ load('js/jquery.magnific-popup.min.js') }}"></script>
      <!-- Custom JS-->
      <script src="{{ load('js/custom.js') }}"></script>    
      <!-- Swiper JS -->
      <script src="{{ load('js/swiper.min.js') }}"></script>
      <script src="{{ load('js/swiper.js') }}"></script>
      @yield('Script')
   </body>
</html>