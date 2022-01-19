
<!DOCTYPE html>
<html lang="en">
<head>
 @include('admin.head')
</head>
<style>
    body{
        background-image: url("/template/images/Picture1.jpg");
        background-repeat: no-repeat;
        background-size:100% ;
    }
</style>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Chào mừng trở lại</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">đăng nhâp để tiếp tục</p>
        @include('admin.alert')
      <form action="/users/login/store" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="">
            <div class="icheck-primary">
              <input type="checkbox" name="remember" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
        <div class="row">

          <!-- /.col -->
          <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block">Đăng Nhập</button>
          </div>
          <div class="col-6">
            <button class="btn btn-primary btn-block"><a class="text-white" href="/users/singup">Đăng kí</a></button>
          </div>
          <!-- /.col -->
        </div>
        @csrf
      </form>


    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

@include('admin.footer')
</body>
</html>
