@include('css')
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Reset Password</p>

     <form role="form" method="post" action="{{ route('post_reset_pass') }}">
       <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $email or old('email') }}">
         @if ($errors->has('email'))
          <span class="help-block">
             <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
        <input type="password" name="password" class="form-control" placeholder="Password">
        @if ($errors->has('password'))
         <span class="help-block">
           <strong>{{ $errors->first('password') }}</strong>
         </span>
         @endif
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <input type="password" name="password_confirmation" class="form-control" placeholder="Retype Password">
        @if ($errors->has('password_confirmation'))
         <span class="help-block">
           <strong>{{ $errors->first('password_confirmation') }}</strong>
         </span>
         @endif
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="hidden" name="token" value="{{ $token }}">
          {{ csrf_field() }}
          <button type="submit" class="btn btn-primary btn-block btn-flat">Reset</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

   
  </div>
  <!-- /.login-box-body -->
</div>
</body>