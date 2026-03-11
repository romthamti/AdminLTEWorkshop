<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-info">
    <div class="card-header text-center">
      <a href="./index2.html" class="h1"><b>BC</b>KSU</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form id="frmAddUser" name="frmAddUser" action="registerprocess.php" method="post">
        <div class="input-group mb-3">
          <input id="inputFullname" name="inputFullname" type="text" class="form-control" placeholder="Full name" novalidate>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="inputemail" name="inputemail" type="email" class="form-control" placeholder="Email" novalidate>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="inputpass" name="inputpass" type="password" class="form-control" placeholder="Password" novalidate>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="inputconfirmpass" name="inputconfirmpass" type="password" class="form-control" placeholder="Retype password" novalidate>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="chkAgreeTerms" name="chkAgreeTerms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button id="btnRegis" name="btnRegis" type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     

      <a href="index.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jQuery Validate -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

<!-- Bootstrap -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./dist/js/adminlte.min.js"></script>

<!-- Validate Script -->
<script>
$(document).ready(function(){

  $('#frmAddUser').validate({
    rules: {
      inputFullname:{
        required: true,
        minlength: 10
      },
      inputemail:{
        required: true,
        email: true
      },
      inputpass: {
        required: true,
        minlength: 5
      },
      inputconfirmpass:{
        required: true,
        minlength: 5
      },
      chkAgreeTerms:{
        required: true
      }
    },
    messages:{
      inputFullname:{
        required: "กรุณาระบุ ชื่อ",
        minlength: "กรุณาระบุ อย่างน้อย 10 ตัว"
      },
      inputemail:{
        required: "กรุณาระบุ อีเมล",
        email: "กรุณาตรวจสอบอีเมล"
      },
      inputpass:{
        required: "กรุณาระบุ รหัสผ่าน",
        minlength: "กรุณาระบุ อย่างน้อย 5 ตัว"
      },
      inputconfirmpass:{
        required: "กรุณายืนยันรหัสผ่าน",
        equalTo: "รหัสผ่านไม่ตรงกัน"
      },
      chkAgreeTerms:{
        required: "กรุณายอมรับเงื่อนไข"
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
<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
</body>
</html>
