
<?php 
include 'style.php';

session_start();
error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: group.php");
}

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
  $result = mysqli_query($conn, $sql);
  if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['username'];
    header("Location: group.php");
  } else {
    echo "<script>alert('កំហុស!!! Email ហើយនិងលេខសម្ងាត់ មិនត្រឺមត្រវ')</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="platform.php" class="h1"><b>Group4</b>PROJECT</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">ចូលទៅកាន់គេហទំព័រផ្លូវការ</p>

      <form action="" method="POST">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="បញ្ចូលEmail" value="<?php echo $email; ?>" required>
          <div class="input-group-append">
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
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button  type="submit" name="submit" class="btn btn-primary btn-block">ចូល</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    
      <!-- /.social-auth-links -->
      <p class="mb-0">
        <a href="register.php" class="text-center">បង្កើតគណន័យថ្មី</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
