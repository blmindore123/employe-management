@include('header')
<body style="background-color: #666666;">
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
  
        <form class="login100-form" id="login-form" action="{{url('/login')}}" method="post">
          @csrf

          @if (Session::has('error_msg'))
            <div class="alert alert-danger">{{ Session::get('error_msg') }}</div>
          @endif
          <span class="login100-form-title p-b-43">
            Login
          </span>
          
          <div class="wrap-input100">
            <input type="email" name="email" value="">
            <span class="focus-input100"></span>
            <span class="label-input100">Email</span>
          </div>
          
          <div class="wrap-input100">
            <input class="input100" type="password" name="password" value="" >
            <span class="focus-input100"></span>
            <span class="label-input100">Password</span>
          </div>

          <div class="container-login100-form-btn" style="margin-top:50px">
            <button class="login100-form-btn">
              Login
            </button>
            
          </div>
        </form>
        {!! JsValidator::formRequest('App\Http\Requests\LoginRequest','#login-form') !!}
        <div class="login100-more" style="background-image: url('public/images/home-maintenance-resolution.jpg');">
        </div>
      </div>
    </div>
  </div>
  @include('footer')