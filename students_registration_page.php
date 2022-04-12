<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Students Registration</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/admin_login.css" />
    <script src="js/bootstrap.min.js"></script>
    <script src="js/juqery_latest.js"></script>
</head>

<body>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card" style="height: 500px;">
                <div class="d-flex justify-content-center">
                    <h4 style="padding-top: 25px; position: absolute;">Students Registration</h4>
                </div>
                <div class="d-flex justify-content-center form_container" style="margin-top: 80px;">
                    <form action="" method="post">
                        <div class="input-group mb-2">
                            <input type="text" name="su_id" class="form-control input_user" placeholder="Id">
                        </div>
                        <div class="input-group mb-2">
                            <input type="text" name="sr_name" class="form-control input_user" placeholder="name">
                        </div>
                        <div class="input-group mb-2">
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
                <div class="mt-3">
                    <div class="d-flex justify-content-center links text-center">
                        <p>Already Have Account!<br />Please <span href="" style="fornt-color:#207819;"><a href="student_login.php">Login</a></span></p>
                    </div>
                    <div class="text-center">
                        <a href="index.php" style="color:black; text-decoration: none;">Back to Menu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $connection = mysqli_connect("localhost", "root", "");
        $db = mysqli_select_db($connection, "sms");
        $uid = $_POST['su_id'];
        $usname = $_POST['sr_name'];
        $uemail = $_POST['email'];
        $upass = $_POST['password'];

        $sql = "INSERT INTO students(student_Id,name,email,password) VALUES('$uid','$usname','$uemail','$upass')";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            header("Location: student_login.php");
        } else {
            echo "error : " . $sql;
        }
    }
    ?>

</body>

</html>