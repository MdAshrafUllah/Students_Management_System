<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Management System</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script src="js/bootstrap.min.js"></script>
  <script src="js/juqery_latest.js"></script>
</head>

<body class="p-3 mb-2 #E5E5E5 text-Black">
  <div class="container align-center">
    <div class="row">
      <div class="col-md-12">
        <h5 style="text-align: center; padding-top: 50px; font-size: 35px">
          Student Management Syatem
        </h5>
      </div>
    </div>
  </div>
  <br /><br /><br /><br /><br /><br />
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <form action="" method="post" style="text-align: center">
          <input style="
              height: 250px;
              width: 250px;
              padding: 105px 0px;
              background-color: gray;
              border-color: transparent;
              font-size: 25px;
            " class="btn btn-primary" type="submit" value="Admin" name="admin_login">
        </form>
      </div>
      <div class="col-md-4" style="text-align: center">
        <form action="" method="post">
          <input class="btn btn-primary" type="submit" value="Teachers" name="teacher_login" style="
              height: 250px;
              width: 250px;
              padding: 105px 0px;
              background-color: #33c353;
              border-color: transparent;
              font-size: 25px;">
        </form>
      </div>
      <div class=" col-md-4" style="text-align: center">
        <form action="" method="post">
          <input class="btn btn-primary" type="submit" value="Students" name="student_login" style="
              height: 250px;
              width: 250px;
              padding: 105px 0px;
              background-color: #f13838;
              border-color: transparent;
              font-size: 25px;
            ">
        </form>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['admin_login'])) {
    header("Location: admin_login.php");
  }
  if (isset($_POST['teacher_login'])) {
    header("Location: teacher_login.php");
  }
  if (isset($_POST['student_login'])) {
    header("Location: student_login.php");
  }
  ?>
</body>

</html>