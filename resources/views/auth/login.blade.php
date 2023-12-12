@extends('auth.Layout._layout')
@section('title')ورود به متروبین@endsection
@section('Content')
    <div class="container-fluid" style="background: url('{{ asset('images/login/login.jpg') }}') no-repeat; background-size: cover;">
        <div class="row">
            <div class="col-md-4 mt-5">
                @if ($errors->any())
                @foreach ($errors->all() as $error )
                   <div id="erroralert" class="alert alert-danger" role="alert">
                        <button class="close float-left" onclick="closeAlert()" type="button">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>خطا!</strong> {{ $error  }}
                    </div>
                @endforeach
             @endif
          </div>
            <div class="col-md-4 col-sm-12">
                <center>
                    <div class="form-container">
                        <form class="form" method="POST" action="{{ route('login') }}">
                            <h3>ورود</h3>
                            @csrf
                            <div class="form-group">
                                <label for="mobile">موبایل</label>
                                <input id="mobile" type="text" class="form-control mb-0" name="mobile"
                                    value="{{ old('mobile') }}" placeholder="شماره همراه خود را وارد کنید"
                                    autocomplete="mobile" autofocus required>
                            </div>
                            <div class="form-group">
                                <label for="password">رمز عبور</label>
                                <input id="password" name="password" type="password"
                                    class="form-control mb-0 @error('password') is-invalid @enderror" id="exampleInputرمز عبور2"
                                    placeholder="رمز عبور" required autocomplete="current-password">
                            </div>
                            <div class="form-group">
    
                                <label class="container">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <svg viewBox="0 0 64 64" height="2em" width="2em">
                                        <path d="M 0 16 V 56 A 8 8 90 0 0 8 64 H 56 A 8 8 90 0 0 64 56 V 8 A 8 8 90 0 0 56 0 H 8 A 8 8 90 0 0 0 8 V 16 L 32 48 L 64 16 V 8 A 8 8 90 0 0 56 0 H 8 A 8 8 90 0 0 0 8 V 56 A 8 8 90 0 0 8 64 H 56 A 8 8 90 0 0 64 56 V 16"
                                            pathLength="575.0541381835938" class="path"></path>
                                    </svg>
                                    <span class="ml-2" for=""> مرا به خاطر بسپار</span>
                                </label>
                            </div>
                            <center>
                                <button type="submit" class="form-submit-btn">ورود</button>
                            </center>
                        </form>
                    </div>
                </center>
            </div>
        </div>
    </div>
@endsection