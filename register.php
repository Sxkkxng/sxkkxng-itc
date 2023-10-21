<?php 
include 'style.php';
session_start();

error_reporting(0);

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $cpassword = md5($_POST['cpassword']);

  if ($password == $cpassword) {
    $sql = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if (!$result->num_rows > 0) {
      $sql = "INSERT INTO user (username, email, password)
          VALUES ('$username', '$email', '$password')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        header("Location: index.php");
        echo "<script>alert('អបអរសាទរ!! អ្នកបងកើតAccountបានេជោគជ័យ')</script>";
        $username = "";
        $email = "";
        $_POST['password'] = "";
        $_POST['cpassword'] = "";
      } else {
        echo "<script>alert('កំហុស! មានអ្វីមួយខុសប្រកក្រដី')</script>";
      }
    } else {
      echo "<script>alert('កំហុស! Email ធ្លាប់បានចុះឈ្មោះរួចម្ដងហើយ')</script>";
    }
    
  } else {
    echo "<script>alert('លេខសម្ងាត់មិនត្រឹមត្រូវ.')</script>";
  }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="css/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index.php" class="h1"><b>Groupr4</b>PROJECT</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">ចុះឈ្មោះសមាជិកថ្មី</p>

      <form action="" method="POST">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="បញ្ចូលឈ្មោះពេញ" value="<?php echo $username; ?>">
          <div class="input-group-append" required>
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="បញ្ចូលEmail" value="<?php echo $email; ?>">
          <div class="input-group-append" required>
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="បញ្ចូលលេខសម្ងាត់" value="<?php echo $_POST['password']; ?>" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="cpassword" class="form-control" placeholder="បញ្ចូលលេខសម្ងាត់ម្ដងទៀត" value="<?php echo $_POST['cpassword']; ?>" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
        
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block">ចុះឈ្មោះ</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <a href="index.php" class="text-center">ខ្ញុំបានចុះឈ្មោះរួចហើយ</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
