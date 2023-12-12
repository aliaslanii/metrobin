@extends('auth.Layout._layout')
@section('title')ثبت نام در متروبین@endsection
@section('Content')
   <div class="container-fluid bg-auth">
      <div class="row">
         <div class="col-md-4 mt-5">
               @if ($errors->any())
               @foreach ($errors->all() as $error )
                  <div class="alert alert-danger" role="alert">
                     <strong>خطا!</strong> {{ $error  }}
                     <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                     </div>
               @endforeach
            @endif
         </div>
         <div class="col-md-4 col-sm-12">
               <center>
                  <div class="form-container">
                     <form class="form" action="{{ route('register') }}" method="POST">
                           <h3>ورود</h3>
                           @csrf
                           <div class="form-group">
                           <label for="Name">نام و نام خانوادگی</label>
                           <input id="Name" type="text" class="form-control mb-0" name="name" value="{{ old('Name') }}" placeholder="نام و نام خانوادگی خود را وارد کنید"
                              autocomplete="mobile" autofocus required>
                        </div>
                           <div class="form-group">
                              <label for="mobile">موبایل</label>
                              <input id="mobile" type="text" class="form-control mb-0" name="mobile" value="{{ old('mobile') }}" placeholder="شماره همراه خود را وارد کنید"
                                 autocomplete="mobile" autofocus required>
                           </div>
                           <div class="form-group">
                              <label for="password">رمز عبور</label>
                              <input id="password" name="password" type="password"
                                 class="form-control mb-0 @error('password') is-invalid @enderror" id="exampleInputرمز عبور2"
                                 placeholder="رمز عبور" required autocomplete="current-password">
                           </div>
                           <div class="form-group">
                           <label for="password">تکرار رمز عبور</label>
                           <input id="password" name="password_confirmation" type="password"
                                 class="form-control mb-0 @error('password') is-invalid @enderror" id="exampleInputرمز عبور2"
                                 placeholder="تکرار رمز عبور" required autocomplete="current-password">
                        </div>
                           <center>
                              <button type="submit" class="form-submit-btn">عضویت</button>
                           </center>
                     </form>
                  </div>
               </center>
         </div>
      </div>
   </div>
@endsection