<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Management System</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/admin_login.css" />
    <script src="js/bootstrap.min.js"></script>
    <script src="js/juqery_latest.js"></script>
</head>

<body>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <h4 style="padding-top: 10px; position: absolute;">Admin Login</h4>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <input type="text" name="email" class="form-control input_user" placeholder="Email">
                        </div>
                        <div class="input-group mb-2">
                            <input type="password" name="password" class="form-control input_pass" placeholder="Password">
                        </div>
                        <div class="justify-content-center mt-3 login_container" style="border-radius:20px!important;">
                            <button style="margin-left:50px;" type="submit" name="submit" class="btn login_btn">Agree</button>
                        </div>
                    </form>
                </div>
                <div class="mt-4 text-center">
                    <a href="index.php" style="color:black; text-decoration: none;">Back to Menu</a>
                </div>
            </div>
        </div>
    </div>

    <?php
    session_start();
    if (isset($_POST['submit'])) {
        $connection = mysqli_connect("localhost", "root", "");
        $db = mysqli_select_db($connection, "sms");
        $query = "select * from admin where email = '$_POST[email]'";
        $query_run = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($query_run)) {
            if ($row['email'] == $_POST['email']) {
                if ($row['password'] == $_POST['password']) {
                    $_SESSION['email'] =  $row['email'];
                    $_SESSION['name'] = $row['name'];
                    header("Location: admin_dashboard.php");
                } else {
    ?>
                    <center class="align-middle">Wrong Password !!</center>
    <?php
                }
            }
        }
    }
    ?>

</body>

</html>