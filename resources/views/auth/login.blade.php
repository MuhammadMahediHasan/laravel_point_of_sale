
<link rel="stylesheet" type="text/css" href="{{asset('backend_asset/login_css/style2.css')}}">
<div class="login-wrap">
  <div class="login-html">
    <h1 style="text-align: center;color: white;">Sign In</h1>
    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab"></label>
    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
    <div class="login-form">
      <div class="sign-in-htm">
        <div class="group">
        <form method="POST" action="{{ route('login') }}">
                    @csrf
          <label for="user" class="label">Username</label>
          <input id="email" type="email" class="input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
          @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong style="color: red; font-size: 13px;">{{ $errors->first('email') }}</strong>
            </span>
          @endif
        </div>
        <div class="group">
          <label for="pass" class="label">Password</label>
          <input id="password" type="password" class="input form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" data-type="password" name="password" required>
          @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
          @endif
        </div>
        <div class="group">
        <input id="check" type="checkbox" class="check form-check-input" name="remember" id="remember check" {{ old('remember') ? 'checked' : '' }} >

         <!--  <input class="check form-check-input" type="checkbox" name="remember" id="remember check" {{ old('remember') ? 'checked' : '' }} checked> -->

          <label for="check"><span class="icon"></span> Keep me Signed in</label>
        </div>
        <div class="group">
          <button type="submit" class="btn btn-primary button">
            {{ __('Sign In') }}
          </button>
        </div>
        <div class="hr"></div>
        <div class="foot-lnk">
          @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
          @endif
        </div>
      </div>
    </div>
  </form>
      
    </div>
  </div>
</div>
