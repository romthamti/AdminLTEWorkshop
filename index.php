<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BC KSU | Log in </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-success">
    <div class="card-header text-center">
      <a href="index.php" class="h1"><b>BC</b>KSU</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form id="frmlogin" name="frmlogin" action="verifyUser.php" method="post" novalidate>
        <div class="input-group mb-3">
          <input id="inputEmail" name="inputEmail" type="email" class="form-control" placeholder="Email" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="inputPass" name="inputPass" type="password" class="form-control" placeholder="Password" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-success btn-block" >Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      
      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
 <!-- โหลด jQuery ก่อน -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- โหลด jquery validate -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

<!-- Bootstrap -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./dist/js/adminlte.min.js"></script>
<script>
$(document).ready(function(){

  $('#frmlogin').validate({
    rules: {
      inputEmail:{
        required: true,
        email: true
      },
      inputPass: {
        required: true,
        minlength: 5
      }
    },
    messages:{
      inputEmail:{
        required: "กรุณาระบุ อีเมล",
        email: "กรุณาตรวจสอบอีเมล"
      },
      inputPass: {
        required: "กรุณาระบุ รหัสผ่าน",
        minlength: "กรุณาระบุ อย่างน้อย 5 ตัว"
      }
    },

    errorElement: 'span',
    errorClass: 'invalid-feedback',

    highlight: function(element) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function(element) {
      $(element).removeClass('is-invalid');
    },

    errorPlacement: function(error, element) {
      if (element.closest('.input-group').length) {
        error.insertAfter(element.closest('.input-group'));
      } else {
        error.insertAfter(element);
      }
    }

  });

});
</script>

</body>
</html>
