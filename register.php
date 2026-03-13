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

      <form id="frmAddUser" name="frmAddUser" action="register_insert.php" method="post">
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
              <label for="chkAgreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" id="btnRegis" name="btnRegis" class="btn btn-primary btn-block">Register</button>
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script>

  
  $('#frmAddUser').validate({
    rules: {
      inputFullname: {
        required: true,
        minlength: 10,
      },
      inputemail: {
        required: true,
        email: true,
      },
      inputpass: {
        required: true,
        minlength: 6
      },
        inputconfirmpass: {
        required: true,
        minlength: 6,
        
      },
      chkAgreeTerms: {
        required: true,

      }
    },
    messages: {
      inputName: {
        required: "กรุณากรอกชื่อลงทะเบียน ",
        name: "กรุณาตรวจสอบชื่อ"
      },
      inputemail: {
        required: "กรุณากรอกอีเมล",
        email: "กรุณาตรวจสอบรูปแบบอีเมล"
      },
      inputpass: {
        required: "กรุณากรอกรหัสผ่าน",
        minlength: "กรุณากรอกรหัสผ่านอย่างน้อย 6 ตัวอักษร"
      },
      inputconfirmpass: {
        required: "กรุณากรอกรหัสผ่าน",
        minlength: "กรุณากรอกรหัสผ่านอย่างน้อย 6 ตัวอักษร",
        equalTo: "รหัสผ่านไม่ตรงกันกรุณากรอกใหม่อีกครั้ง"
      },
      chkAgreeTerms: "กรุณาอ่านข้อตกลงก่อนรับเงื่อนไข"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.input-group').append(error);
      element.closest('.icheck-primary').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
</script>
<script>

$('#togglePass').click(function () {
    let input = $('#inputPass');

    if (input.attr('type') === 'password') {
        input.attr('type', 'text');
        $(this).removeClass('fa-eye');
        $(this).addClass('fa-eye-slash');
    } else {
        input.attr('type', 'password');
        $(this).removeClass('fa-eye-slash');
        $(this).addClass('fa-eye');
    }
});

$('#toggleConfirmPass').click(function () {
    let input = $('#inputConfrimPass');

    if (input.attr('type') === 'password') {
        input.attr('type', 'text');
        $(this).removeClass('fa-eye');
        $(this).addClass('fa-eye-slash');
    } else {
        input.attr('type', 'password');
        $(this).removeClass('fa-eye-slash');
        $(this).addClass('fa-eye');
    }
});

</script>
</body>
</html>
