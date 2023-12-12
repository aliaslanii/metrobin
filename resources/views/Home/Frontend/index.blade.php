@extends('Home.Layouts._layout')
@section('title')وب سایت فیلم و سریال مترو بین@endsection
@section('Content')
<section class="banner-container iq-rtl-direction iq-rtl-list-gentag-direction ">
   <div class="movie-banner  tvshows-slider">
      <div  class="swiper-banner-container " data-swiper="banner-detail-slider">
         <div class="swiper-wrapper ">
            @foreach ($Slid as $Movie)
            <div class="swiper-slide show-banner-2 swiper-bg" style="background-image: url('{{ asset('images/Cover-Movie/'.$Movie->img) }}');
            background-size: cover;
            ">
               <div class="shows-content h-100">
                  <div class="row align-items-center h-100" >
                     <div class=" col-lg-7 col-md-12">
                        <h1 class="slider-text">{{ $Movie->Name }}</h1>
                           <div class="flex-wrap align-items-center fadeInLeft animated" data-animation-in="fadeInLeft" style="opacity: 1;">
                           <div class="slider-ratting d-flex align-items-center">
                                 <ul class="ratting-start p-0 m-0 list-inline text-primary d-flex align-items-center justify-content-left">
                                    <li>
                                       <i class="fa fa-star-half" aria-hidden="true"></i>
                                    </li>                                       
                                    <li>
                                       <i class="fa fa-star" aria-hidden="true"></i>
                                    </li>
                                    <li>
                                       <i class="fa fa-star" aria-hidden="true"></i>
                                    </li>
                                    <li>
                                       <i class="fa fa-star" aria-hidden="true"></i>
                                    </li>

                                 </ul>
                                 <span class="text-white ml-3">{{ $Movie->Imdb }}(lmdb)</span>
                              </div>
                              <div class="d-flex align-items-center movie-banner-time">
                                 <span class="mx-2 mx-md-3"><i class="ri-checkbox-blank-circle-fill"></i></span>
                                 <span class="trending-year">{{ $Movie->YearS  }}</span>
                              </div>
                              <p class="movie-banner-text" data-animation-in="fadeInUp" data-delay-in="1.2">{{ $Movie->info }}</p>
                        </div>
                     </div>
                     <div class=" col-lg-5 col-md-12 trailor-video text-center d-none d-lg-block">
                        <a href="{{ route('ShowMovie',['Movieid' => $Movie->id]) }}" class="playbtn">
                           <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                              x="0px" y="0px" width="80px" height="80px" viewBox="0 0 213.7 213.7"
                              enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                              <polygon class='triangle' fill="none" stroke-width="7" stroke-linecap="round"
                                 stroke-linejoin="round" stroke-miterlimit="10"
                                 points="73.5,62.5 148.5,105.8 73.5,149.1 " />
                              <circle class='circle' fill="none" stroke-width="7" stroke-linecap="round"
                                 stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8" r="103.3" />
                           </svg>
                           <span class="w-trailor">تماشای فیلم</span>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
         <div class="swiper-banner-button-next ">
            <i class="ri-arrow-left-s-line arrow-icon"></i>
         </div>
         <div class="swiper-banner-button-prev">
            <i class="ri-arrow-right-s-line arrow-icon"></i>
         </div> 
      </div>
   </div>
</section>
<!-- Slider End -->
<!-- MainContent -->
<div class="main-content">
   <section id="iq-favorites" class="">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12 overflow-hidden">
               <div class="d-flex align-items-center justify-content-between">
                  <h4 class="main-title ">محبوب ترین فیلم ها</h4>
                  <a href="{{ route('FavoriteMovie') }}" class="text-primary iq-view-all">همه فیلم ها</a>
               </div>
            </div>
         </div>
         <!-- Swiper -->
         <div class="favourite-slider">
            <div  class="swiper pt-2 pt-md-4 pt-lg-4 iq-rtl-direction " data-swiper="common-slider">
               <ul class="swiper-wrapper m-0 p-0">
                  @foreach ($Movies as $Movie)
                  <li class="swiper-slide slide-item">
                     <div class="block-images position-relative ">
                        <div class="img-box">
                           <img src="{{ asset('images/Cover-Movie/'.$Movie->img) }}" class="img-fluid" alt="" loading="lazy">
                        </div>
                        <div class="block-description">
                           <h6 class="iq-title"><a href="show-detail.html">{{ $Movie->Name }}</a></h6>
                           <div class="movie-time d-flex align-items-center my-2">
                              <span class="text-white">{{ $Movie->Time }}</span>
                           </div>
                           <div class="hover-buttons">
                              <a href="{{ route('ShowMovie',['Movieid' => $Movie->id]) }}" role="button" class="btn btn-light mb-3"><i
                                    class="fa fa-play mr-1" aria-hidden="true"></i>
                                 تماشا کنید
                              </a>
                           </div>
                        </div>
                     </div>
                  </li>
                  @endforeach
               </ul>
               <div class="swiper-button-prev"></div>
               <div class="swiper-button-next"></div>
            </div>
         </div>
      </div>
   </section>
   <section id="iq-upcoming-movie" class="iq-rtl-direction iq-rtl-list-gentag-direction ">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12 overflow-hidden">
               <div class="iq-ltr-direction d-flex align-items-center justify-content-between">
                  <h4 class="main-title">جدیدترین فیلم ها</h4>
                  <a href="{{ route('NewMovies') }}" class="text-primary iq-view-all">همه فیلم ها</a>
               </div>
            </div>
         </div>
         <!-- Swiper -->
         <div class="favourite-slider">
               <div  class="swiper pt-2 pt-md-4 pt-lg-4 iq-rtl-direction" data-swiper="common-slider">
                  <ul class="swiper-wrapper m-0 p-0">
                     @foreach ($newMovies as $Movie)
                  <li class="swiper-slide slide-item">
                     <div class="block-images position-relative ">
                        <div class="img-box">
                           <img src="{{ asset('images/Cover-Movie/'.$Movie->img) }}" class="img-fluid" alt="" loading="lazy">
                        </div>
                        <div class="block-description">
                           <h6 class="iq-title"><a href="show-detail.html">{{ $Movie->Name }}</a></h6>
                           <div class="movie-time d-flex align-items-center my-2">
                              <span class="text-white">{{ $Movie->Time }}</span>
                           </div>
                           <div class="hover-buttons">
                              <a href="{{ route('ShowMovie',['Movieid' => $Movie->id]) }}" role="button" class="btn btn-light mb-3"><i
                                    class="fa fa-play mr-1" aria-hidden="true"></i>
                                 تماشا کنید
                              </a>
                           </div>
                        </div>
                     </div>
                  </li>
                  @endforeach
                  </ul>  
                  <div class="swiper-button-prev"></div>
                  <div class="swiper-button-next"></div>                  
            </div>
         </div>
      </div>
   </section>
   <section id="iq-suggestede" class="iq-rtl-direction iq-rtl-list-gentag-direction ">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12 overflow-hidden">
               <div class="iq-ltr-direction d-flex align-items-center justify-content-between">
                  <h4 class="main-title">داغترین فیلم ها</h4>
                  <a href="{{ route('HotMovies') }}" class="text-primary iq-view-all">همه فیلم ها</a>
               </div>
            </div>
         </div>
         <!-- Swiper -->
         <div class="favourite-slider">
               <div  class="swiper pt-2 pt-md-4 pt-lg-4 iq-rtl-direction" data-swiper="common-slider">
                  <ul class="swiper-wrapper p-0 m-0">
                     @foreach ($HotMovies as $Movie)
                     <li class="swiper-slide slide-item">
                        <div class="block-images position-relative ">
                           <div class="img-box">
                              <img src="{{ asset('images/Cover-Movie/'.$Movie->img) }}" class="img-fluid" alt="" loading="lazy">
                           </div>
                           <div class="block-description">
                              <h6 class="iq-title"><a href="show-detail.html">{{ $Movie->Name }}</a></h6>
                              <div class="movie-time d-flex align-items-center my-2">
                                 <span class="text-white">{{ $Movie->Time }}</span>
                              </div>
                              <div class="hover-buttons">
                                 <a href="{{ route('ShowMovie',['Movieid' => $Movie->id]) }}" role="button" class="btn btn-light mb-3"><i
                                       class="fa fa-play mr-1" aria-hidden="true"></i>
                                    تماشا کنید
                                 </a>
                              </div>
                           </div>
                        </div>
                     </li>
                     @endforeach
                  </ul>
                  <div class="swiper-button-prev"></div>
                  <div class="swiper-button-next"></div>
            </div>
         </div>
      </div>
   </section>
</div>
@endsection