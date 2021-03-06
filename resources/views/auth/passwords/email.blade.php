@include('css')
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-box-body">
    @if(Session::has('messageinsert'))
                <div class="callout callout-success">
                {{ Session::get('messageinsert') }}
                </div>
                @endif
    <p class="login-box-msg">Forgot Password</p>

     <form role="form" method="POST" action="{{route('post_forgot_pass')}}">
      {{ csrf_field() }}

      <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
        <input type="email" name="email" class="form-control" placeholder="Email" value="{{Request::old('email')}}">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        {{($errors->has('email')) ? $errors->first('email') : ''}}
      </div>

      <div class="row">
        <!-- /.col -->
        <div class="social-auth-links text-center">
        <button type="submit" class="btn btn-primary btn-block btn-flat">
            Send Password Reset Link
        </button>
    </div>
        <!-- /.col -->
      </div>
    </form>

    
    <!-- /.social-auth-links -->

  </div>
  <!-- /.login-box-body -->
</div>
</body>