@extends('Home.Layouts._layout')
@section('title')وب سایت فیلم و سریال مترو بین@endsection
@section('Link')
    <link rel="stylesheet" href="{{ load('css/plyr.css') }}" />
    <script src="{{ load('js/plyr.js') }}"></script>
@endsection
@section('Content')
    <section class="iq-main-slider site-video">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pt-0">
                        <video controls crossorigin data-poster="{{ asset('images/Cover-Movie/' . $Movie->img) }}"
                            id="player">
                            <source src="{{ asset('Movies/' . $Movie->Movie) }}" type="video/mp4" size="576" />
                            <source src="{{ asset('Movies/' . $Movie->Movie) }}" type="video/mkv" size="720" />
                            <source src="{{ asset('Movies/' . $Movie->Movie) }}" type="video/mkv" size="1080" />
                            <track kind="captions" label="فارسی" srclang="fa"
                                src="{{ asset('Movies/14020914-090901-947551.vtt') }}" default />
                            <a href="{{ asset('Movies/' . $Movie->Movie) }}" download>Download</a>
                        </video>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- MainContent -->
    <div class="main-content movi ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending-info mt-4 pt-0 pb-4">
                        <div class="row">
                            <div class="col-md-9 col-12  mb-auto">
                                <div class="d-md-flex">
                                    <h3 class="trending-text">{{ $Movie->Name }}</h3>
                                    <div class="slider-ratting d-flex align-items-center ml-md-3 ml-0">
                                        <ul
                                            class="ratting-start p-0 m-0 list-inline text-primary d-flex align-items-center justify-content-left">
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star-half" aria-hidden="true"></i></li>
                                        </ul>
                                        <span class="text-white ml-2">{{ $Movie->Imdb }}(Imdb)</span>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap align-items-center text-white text-detail flex-wrap mb-4">
                                    <span class="ml-3 font-Weight-500 genres-info">زمان : {{ $Movie->Time }}</span>
                                </div>
                                <div class="d-flex flex-wrap align-items-center text-white text-detail flex-wrap mb-4">
                                    <span class="ml-3 font-Weight-500 genres-info">سال تولید : {{ $Movie->YearS }}</span>
                                </div>
                                <div class="d-flex flex-wrap align-items-center text-white text-detail flex-wrap mb-4">
                                    <span class="ml-3 font-Weight-500 genres-info">محصول : @foreach ($Movie->Country as $Country)
                                            {{ $Country->Name }}
                                        @endforeach
                                    </span>
                                </div>
                                <div class="d-flex flex-wrap align-items-center text-white text-detail flex-wrap mb-4">
                                    <span class="ml-3 font-Weight-500 genres-info">رنج سنی :
                                        {{ $Movie->ages->Ages }}</span>
                                </div>
                                <ul class="p-0 list-inline d-flex flex-wrap align-items-center mb-3 mt-4 iq_tag-list">
                                    <li class="text-primary text-lable mr-3"><i class="fa fa-tags"
                                            aria-hidden="true"></i>ژانر ها:
                                    </li>
                                    @foreach ($Movie->genres as $genre)
                                        <li class="trending-list mr-3"><a class="title"
                                                href="tags/brother.html">{{ $genre->Name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="trailor-video col-md-3 col-12 mt-lg-0 mt-4 mb-md-0 mb-1 text-lg-right">
                                <img width="1920" height="1080" src="{{ asset('images/Cover-Movie/' . $Movie->img) }}"
                                    class="attachment-medium-large size-medium-large wp-post-image" alt=""
                                    loading="lazy" sizes="(min-width: 960px) 75vw, 100vw">
                                <span class="content btn btn-transparant iq-button">
                                    <i class="fa fa-play mr-2"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div
                        class="streamit-content-details trending-info g-border iq-rtl-direction iq-rtl-list-gentag-direction ">
                        <ul class="trending-pills-header d-flex nav nav-pills align-items-center text-center  mb-5 justify-content-center"
                            role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" data-toggle="pill" href="#dectripton-1" role="tab"
                                    aria-selected="true">توضیحات</a>
                            </li>
                            {{-- <li class="nav-item">
                      <a class="nav-link" data-toggle="pill" href="#reviw-1" role="tab" aria-selected="false">امتیاز
                         و نظرات</a>
                   </li> --}}
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#sourse-1" role="tab"
                                    aria-selected="false">کیفیت های ویدیو</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="dectripton-1" class="tab-pane fade active show" role="tabpanel">
                                <div class="description-content">
                                    <p>{{ $Movie->info }}</p>
                                </div>
                            </div>
                            <div id="reviw-1" class="tab-pane fade" role="tabpanel">
                                <div id="reviews" class="streamit-reviews">
                                    <div id="comments" class="comments-area validate-form">
                                        <p class="masvideos-noreviews mt-3">
                                            هیچ نظری هنوز ثبت نشده است
                                        </p>
                                    </div>
                                    <div id="review_form_wrapper">
                                        <div id="review_form">
                                            <div id="respond" class="comment-respond">
                                                <h3 id="reply-title" class="comment-reply-title mt-0">
                                                    اولین نظر خودتان را بنویسید “نوبت لیلی”
                                                </h3>
                                                <form class="comment-form">
                                                    <p class="comment-notes">
                                                        <span id="email-notes">ایمیل و شماره شما نمایش داده نمی شود.
                                                        </span>
                                                        <span class="required-field-message" aria-hidden="true">قسمت های
                                                            مشخص شده تکمیل شوند

                                                            <span class="required" aria-hidden="true">*</span></span>
                                                    </p>
                                                    <div class="comment-form-rating">
                                                        <label for="rating">امتیاز شما</label>
                                                        <div class="star ml-3">
                                                            <span><i class="ri-star-line"></i></span>
                                                            <span><i class="ri-star-line"></i></span>
                                                            <span><i class="ri-star-line"></i></span>
                                                            <span><i class="ri-star-line"></i></span>
                                                            <span><i class="ri-star-line"></i></span>
                                                        </div>
                                                    </div>
                                                    <p class="comment-form-comment p-0 mb-3 mt-0">
                                                        <label for="comment">نظر شما<span
                                                                class="required">*</span></label>
                                                        <textarea id="comment" name="comment" cols="45" rows="8" required=""></textarea>
                                                    </p>
                                                    <p class="comment-form-author mt-3 pr-lg-3 pr-0">
                                                        <label for="author">نام<span class="required">*</span></label>
                                                        <input id="author" name="author" type="text"
                                                            value="" size="30" required="" />
                                                    </p>
                                                    <p class="comment-form-email mt-3 pl-lg-3 pl-0">
                                                        <label for="email">ایمیل<span class="required">*</span></label>
                                                        <input id="email" name="email" type="email"
                                                            value="" size="30" required="" />
                                                    </p>
                                                    <p class="comment-form-cookies-consent">
                                                        <input id="coment-check" name="coment-check" type="checkbox"
                                                            value="yes" />
                                                        <label for="coment-check">ایمیل و اطلاعات من را برای نظرهای بعدی
                                                            ذخیر کن</label>
                                                    </p>
                                                    <p class="form-submit">
                                                        <button name="submit" type="submit" id="submit"
                                                            class="btn btn-light mb-3" value="Submit">
                                                            <span>ثبت</span>
                                                        </button>
                                                    </p>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div id="sourse-1" class="tab-pane fade" role="tabpanel">
                                <div class="source-list-content">
                                    <table class="movie-sources sources-table">
                                        <thead class="trending-pills">
                                            <tr>
                                                <th class="genres-table-heading">لینک ها</th>
                                                <th class="genres-table-heading">کیفیت</th>
                                                <th class="genres-table-heading">زبان</th>
                                                <th class="genres-table-heading">سیستم های پخش</th>
                                                <th class="genres-table-heading">تاریخ</th>
                                            </tr>
                                        </thead>
                                        <tbody class="trending-pills">
                                            <tr>
                                                <td>
                                                    <a href="movie-details.html"
                                                        class="play-source movie-play-source btn-hover iq-button"><i
                                                            class="ri-play-fill"></i>
                                                        تماشا کنید
                                                    </a>
                                                </td>
                                                <td>1080p</td>
                                                <td>english</td>
                                                <td>MediaMonkey</td>
                                                <td>2021-12-04</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="movie-details.html"
                                                        class="play-source movie-play-source btn-hover iq-button"><i
                                                            class="ri-play-fill"></i>
                                                        تماشا کنید
                                                    </a>
                                                </td>
                                                <td>800p</td>
                                                <td>english</td>
                                                <td>MusicBee</td>
                                                <td>2021-12-02</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="movie-details.html"
                                                        class="play-source movie-play-source btn-hover iq-button"><i
                                                            class="ri-play-fill"></i>
                                                        تماشا کنید
                                                    </a>
                                                </td>
                                                <td>720p</td>
                                                <td>english</td>
                                                <td>Potسیستم های پخش</td>
                                                <td>2021-11-28</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="iq-favorites" style="margin-top: 0px;" class="s-margin detail-cast-list iq-rtl-direction starring">
            <div class="container-fluid">
                <div class="row m-0">
                    <div class="col-sm-12 overflow-hidden p-0">
                        <div class="iq-main-header d-flex align-items-center justify-content-between iq-ltr-direction">
                            <h4 class="main-title">کارگردان و بازیگران</h4>
                        </div>
                    </div>
                </div>
                <ul class="inner-slider list-inline row p-0  iq-ltr-direction">
                    <li class=" slide-item iq-ltr-direction col-xl-2 col-lg-4 col-md-4 col-6">
                        <div class="cast-images position-relative row mx-0">
                            <div class="col-sm-4 col-12 img-box p-0">
                                <img src="{{ asset('images/Directorimages/' . $Movie->Directors->img) }}"
                                    class="person__poster--image img-fluid" alt="image" loading="lazy">
                            </div>
                            <div class="col-sm-8 col-12 block-description starring-desc ">
                                <h6 class="iq-title">
                                    <a href="{{ route('FindMovie', ['Type' => 'Director', 'id' => $Movie->Directors->id]) }}"
                                        tabindex="0">{{ $Movie->Directors->Name }}</a>
                                </h6>
                                <div class="video-time d-flex align-items-center my-2">
                                    <span class="text-white">کارگردان</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    @foreach ($Movie->Actor as $Actor)
                        <li class=" slide-item iq-ltr-direction col-xl-2 col-lg-4 col-md-4 col-6">
                            <div class="cast-images position-relative row mx-0">
                                <div class="col-sm-4 col-12 img-box p-0">
                                    <img src="{{ asset('images/Actorimages/' . $Actor->img) }}"
                                        class="person__poster--image img-fluid" alt="image" loading="lazy">
                                </div>
                                <div class="col-sm-8 col-12 block-description starring-desc ">
                                    <h6 class="iq-title">
                                        <a href="{{ route('FindMovie', ['Type' => 'Actor', 'id' => $Movie->Directors->id]) }}"
                                            tabindex="0">{{ $Actor->Name }}</a>
                                    </h6>
                                    <div class="video-time d-flex align-items-center my-2">
                                        <span class="text-white">بازیگر</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <section class="s-margin iq-rtl-direction iq-rtl-list-gentag-direction ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="main-title ">پیشنهادی</h4>
                        </div>
                    </div>
                </div>
                <!-- Swiper -->
                <div class="favourite-slider">
                    <div class="swiper pt-2 pt-md-4 pt-lg-4 iq-rtl-direction" data-swiper="common-slider">
                        <ul class="swiper-wrapper m-0 p-0">
                           @foreach ($SuggestionMovie as $Movie)
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
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('Script')
    <script>
        const player = new Plyr('#player', {
            i18n: {
                captions: 'زیرنویس',
                speed: 'سرعت پخش',
                disabled: 'غیرفعال',
                normal: 'عادی'
            }
        });
        const rewindButton = document.getElementById('rewindButton');
        const forwardButton = document.getElementById('forwardButton');

        rewindButton.addEventListener('click', () => {
            player.currentTime -= 5;
        });

        forwardButton.addEventListener('click', () => {
            player.currentTime += 5;
        });
    </script>
@endsection
