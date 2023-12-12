@extends('Home.Layouts._layout')
@section('title')وب سایت فیلم و سریال مترو بین@endsection
@section('Content')
    <main id="main" class="site-main">
        <div class="container-fluid">
            <div class="row mt-5">
                <ul class=" row list-inline  mb-0 iq-rtl-direction iq-rtl-list-gentag-direction ">
                    @foreach ($Movies as $Movie)
                        <li class="slide-item col-lg-3 mb-4">
                            <div class="block-images position-relative">
                                <div class="img-box">
                                    <img src="{{ asset('images/Cover-Movie/' . $Movie->img) }}" class="img-fluid"
                                        alt="" loading="lazy">
                                </div>
                                <div class="block-description">
                                    <h6 class="iq-title"><a href="show-detail.html">{{ $Movie->Name }}</a></h6>
                                    <div class="movie-time d-flex align-items-center my-2">
                                        <span class="text-white">{{ $Movie->Time }}</span>
                                    </div>
                                    <div class="hover-buttons">
                                        <a href="{{ route('ShowMovie', ['Movieid' => $Movie->id]) }}" role="button"
                                            class="btn btn-light mb-3"><i class="fa fa-play mr-1" aria-hidden="true"></i>
                                            تماشا کنید
                                        </a>
                                    </div>
                                </div>
                                <div class="block-social-info">
                                    <ul class="list-inline p-0 m-0 music-play-lists">
                                        <li class="share">
                                            <span><i class="ri-share-fill"></i></span>
                                        </li>
                                        <li>
                                            <span><i class="ri-heart-fill"></i></span>
                                            <span class="count-box">2+</span>
                                        </li>
                                        <li><span><i class="ri-add-line"></i></span></li>

                                    </ul>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </main>
@endsection
