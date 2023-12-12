@extends('Home.Layouts._layout')
@section('Content')
    <main id="main" class="site-main">
        <div class="container-fluid p-0">
            <div class="map-container" style=" left: 0px;">
                <div class="container">
                    <div class="row about-us-row text-center align-items-center">
                        <div class="col-md-12">
                            <div class=" text-left iq-title-box iq-title-default">
                               <center> <h2 class="iq-title">اینجا با ما تماس بگیرید</h2></center>
                               <div class="text-center iq-title-box iq-box iq-title-default"> 
                             </div>
                             <div class="wrapper">
                                <form action="" method="post" class="wpcf7-form init" novalidate="novalidate" data-status="init">
                                   <div class="contact-form contact-style">
                                      <div class="row">
                                         <div class="col-md-6">
                                            <div class="cfield">
                                               <span class="wpcf7-form-control-wrap your-name">
                                               <input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="نام و نام خانوادگی">
                                               </span>
                                            </div>
                                         </div>
                                         <div class="col-md-6">
                                            <div class="cfield">
                                               <span class="wpcf7-form-control-wrap tel-478">
                                               <input type="tel" name="tel-478" value="" size="40" maxlength="140" minlength="10" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel" aria-required="true" aria-invalid="false" placeholder="شماره تماس">
                                               </span>
                                            </div>
                                         </div>
                                         <div class="col-md-12">
                                            <div class="cfield">
                                               <span class="wpcf7-form-control-wrap your-message">
                                               <textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="پیام شما"></textarea>
                                               </span>
                                            </div>
                                         </div>
                                         <div class="col-md-12">
                                            <button id="submit" name="submit" type="submit" value="Send" class="btn btn-light mb-3">
                                            <span class="iq-btn-text-holder">ارسال پیام</span>
                                            <span class="iq-btn-icon-holder">
                                            <i aria-hidden="true" class="ion ion-plus"></i>
                                            </span>
                                            <br>
                                            </button>
                                         </div>
                                      </div>
                                   </div>
                                   <div class="wpcf7-response-output" aria-hidden="true"></div>
                                </form>
                             </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="svg-header">
                <div class="svg-mini-header">
                    <div class="text-center iq-title-box iq-title-default">
                        <h2 class="iq-title">
                            همکاری با بهترین ها
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row text-center d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="image-box">
                        <p>
                            با افتخار به شما خواهش می‌کنیم تا در دنیای جذاب و هیجان‌انگیز سینما و تلویزیون ایران و جهان،
                            همراه متروبین باشید. اینجا، دنیایی پر از زیبایی‌ها، داستان‌های فراموش‌نشدنی و هنرهای تجسمی است
                            که شما را به سفری خاص در دل قلب هنر سینما دعوت می‌کند.

                            در متروبین، امکان دانلود آخرین فیلم‌ها و سریال‌های ایران و جهان با کیفیت بالا و زیرنویس فارسی و
                            دوبله را دارید. ما با افتخار به عنوان منبعی معتبر و قابل اعتماد در ارائه بهترین محتواهای سینمای
                            ایران و جهان برای شما و همراهان عزیز شما حاضریم.

                            متروبین، جایی که شعار ما این است: "هنر را با شما تجربه کنید". امیدواریم که با ارائه بهترین
                            انتخاب‌ها و خدمات ممکن، شما را در مسیری پر از هنر و سرگرمی همراهی کنیم.

                            سپاس از حضور شما در متروبین. همیشه منتظر بازخوردهای گرم و دلنشین شما هستیم
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
