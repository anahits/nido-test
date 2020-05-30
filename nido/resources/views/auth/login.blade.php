<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', session('locale')) }}">
<head>
 @include('admin.layouts.head') 

</head>
<body class="hold-transition login-page">

<div class="login-box">
  <div class="login-logo">
    <a href="/adminlte/index2.html"><b>{{ config('app.name', 'Nido') }}</b></a>
  </div>

       
  <!-- /.login-logo -->
  <div class="card">
    <div class="float-right">
            <ul class="d-flex list-unstyled float-right">
    @foreach (config('app.available_locales') as $locale)
              <li class="nav-item"><a class="nav-link"
               href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), [$locale, isset(\Illuminate\Support\Facades\Route::current()->originalParameters()['company']) ? \Illuminate\Support\Facades\Route::current()->originalParameters()['company']: (isset(\Illuminate\Support\Facades\Route::current()->originalParameters()['employee']) ? \Illuminate\Support\Facades\Route::current()->originalParameters()['employee'] : '')]) }}"
                @if(app()->getLocale() == $locale) style="font-weight: bold; text-decoration: underline" @endif>
                    <p class="text">{{ strtoupper($locale) }}</p>
                  </a>
                </li>
            @endforeach
</ul>
</div>
    <div class="card-body login-card-body">
      <p class="login-box-msg">{{ trans('dashboard.login')}}</p>


        <form method="POST" action="{{ route('login', app()->getLocale() ) }}">
                        @csrf

        <div class="input-group mb-3">
<input id="email" type="email" placeholder="{{ trans('dashboard.email')}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
           <input id="password" placeholder="{{ trans('dashboard.password')}}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row float-right">
   
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary">{{ trans('dashboard.sign_in')}}</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
                                
      <p class="mb-1">
        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request' , app()->getLocale()) }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

 @include('admin.layouts.footer') 

</body>
</html>

