@extends('Home.Layouts._layout')
@section('title')وب سایت فیلم و سریال مترو بین@endsection
@section('Content')
    <main id="main" class="site-main">
        <div class="container-fluid">
            <div class="iq-main-header d-flex align-items-center justify-content-between mt-5 mt-lg-0">
                <h4 class="main-title">جست و جو : {{ $q }}</h4>
            </div>
            <ul class=" row list-inline  mb-0 iq-rtl-direction iq-rtl-list-gentag-direction ">
                @foreach ($Movies as $Movie)
                    <li class="slide-item col-lg-3 mb-4">
                        <div class="block-images position-relative">
                            <div class="img-box">
                                <img src="{{ asset('images/Cover-Movie/' . $Movie->img) }}" class="img-fluid" alt=""
                                    loading="lazy">
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
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="container">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div dir class="col-md-4"> {{ $Movies->links('Home.Layouts._pagination') }}</div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </div>
    </main>
@endsection