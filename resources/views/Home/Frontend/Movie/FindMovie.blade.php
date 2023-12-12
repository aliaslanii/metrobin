@extends('Home.Layouts._layout')
@section('title')وب سایت فیلم و سریال مترو بین@endsection
@section('Content')
    <main id="main" class="site-main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-12">
                    <img src="{{ $img }}" class="img-fluid image-actor" alt="" loading="lazy">
                </div>
                <div class="col-md-3">
                    <div class="align-items-center trending-list flex-wrap">
                        <h3 class="trending-text text-capitalize mt-5 mb-3">{{ $Humen->Name }}</h3>
                        <div class="list-inline p-0 mb-4 share-icons music-play-lists profile-social-lists">
                            <p>{{ $Humen->Description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12 col-sm-12">
                    <div class="iq-main-header">
                        <h4 class="main-title">محبوب ترین فیلم های {{ $Humen->Name }}</h4>
                    </div>
                    <!-- Swiper -->
                    <div class="favourite-slider">
                        <div class="swiper pt-2 pt-md-4 pt-lg-4 iq-rtl-direction " data-swiper="common-slider">
                            <ul class="swiper-wrapper m-0 p-0">
                                @foreach ($Movies as $Movie)
                                    <li class="swiper-slide slide-item">
                                        <div class="block-images position-relative ">
                                            <div class="img-box">
                                                <img src="{{ asset('images/Cover-Movie/' . $Movie->img) }}"
                                                    class="img-fluid" alt="">
                                            </div>
                                            <div class="block-description">
                                                <h6 class="iq-title"><a
                                                        href="{{ route('ShowMovie', ['Movieid' => $Movie->id]) }}">{{ $Movie->Name }}</a>
                                                </h6>
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
            </div>
        </div>
    </main>
@endsection
