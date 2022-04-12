<!DOCTYPE html>
<html lang="en">

<head>
    <title>Deshboard</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/admin_deshboard.css" />
    <script src="js/bootstrap.min.js"></script>
    <script src="js/juqery_latest.js"></script>

    <?php
    session_start();
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "sms");
    ?>
</head>

<body class="bg">
    <section class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="text-center mb-5 mt-5">
                    <h5> <?php echo $_SESSION['name']; ?> </h5>
                    <small> <?php echo $_SESSION['email']; ?> </small>
                </div>
                <div class="container buttons">
                    <form action="" method="post">
                        <table>
                            <tr>
                                <td>
                                    <input style="margin-bottom: 10px;" class="button" type="submit" name="edit_students" value="Edit information">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input style="margin-bottom: 10px;" class="button" type="submit" name="search_result" value="Your Result">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="button bg-danger text-white" type="submit" name="logout" value="Logout">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <div class="col-md-8 right-container" style="margin-top: 152px;">

                <?php
                if (isset($_POST['edit_students'])) {
                ?>
                    <div class="align-items-center d-flex justify-content-center ps-5 pt-5">
                        <h5>Edit Your Information</h5>
                    </div>
                    <center>
                        <p style="color: red;">If you want to change a single data, then make sure to put others as same as they are.</p>
                    </center>
                    <?php
                    $query = "select * from students where student_Id = '$_SESSION[student_Id]'";
                    $query = "select * from students where email = '$_SESSION[email]'";
                    $query_run = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($query_run)) {
                    ?>
                        <div style="padding: 0px 25px;">
                            <form action="" method="post">
                                <table>
                                    <tr>
                                        <td class="col-form-label"><b>Student ID</b></td>
                                        <td><input class="text-uppercase" type="text" value="<?php echo $row['student_Id'] ?>" disabled></td>
                                        <td><input class="text-uppercase" type="text" name="student_Id"></td>
                                    </tr>
                                    <tr>
                                        <td class="col-form-label"><b>Student Name</b></td>
                                        <td><input type="text" value="<?php echo $row['name'] ?>" disabled></td>
                                        <td><input type="text" name="up_student_name"></td>
                                    </tr>
                                    <tr>
                                        <td class="col-form-label"><b>Semester</b></td>
                                        <td><input type="text" value="<?php echo $row['semester'] ?>" disabled></td>
                                        <td><input type="text" name="up_student_semester"></td>
                                    </tr>
                                    <tr>
                                        <td class="col-form-label"><b>Father's Name</b></td>
                                        <td><input type="text" value="<?php echo $row['father_name'] ?>" disabled></td>
                                        <td><input type="text" name="up_student_father_name"></td>
                                    </tr>
                                    <tr>
                                        <td class="col-form-label"><b>Mother's Name</b></td>
                                        <td><input type="text" value="<?php echo $row['mother_name'] ?>" disabled></td>
                                        <td><input type="text" name="up_student_mother_name"></td>
                                    </tr>
                                    <tr>
                                        <td class="col-form-label"><b>Email</b></td>
                                        <td><input type="text" value="<?php echo $row['email'] ?>" disabled></td>
                                        <td><input type="text" name="up_student_email"></td>
                                    </tr>
                                    <tr>
                                        <td class="col-form-label"><b>Mobile</b></td>
                                        <td><input type="text" value="<?php echo $row['mobile'] ?>" disabled></td>
                                        <td><input type="text" name="up_student_mobile"></td>
                                    </tr>
                                    <tr>
                                        <td class="col-form-label"><b>Password</b></td>
                                        <td><input type="text" value="<?php echo $row['password'] ?>" disabled></td>
                                        <td><input type="text" name="up_student_password"></td>
                                    </tr>
                                    <tr>
                                        <td><br>
                                            <input class="btn btn-success" type="submit" name="up_student_info" value="Agree">&nbsp;&nbsp;&nbsp;
                                            <a class="btn btn-danger" href="student_dashboard.php" role="button">Disagree</a>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                <?php
                    }
                }
                ?>

                <?php
                if (isset($_POST['search_result'])) {
                ?>
                    <div class="align-items-center d-flex justify-content-center ps-5 pt-5">
                        <h5>Your Result</h5>
                    </div>
                    <?php
                    $query = "select * from results where student_Id = '$_SESSION[student_Id]'";
                    $query_run = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($query_run)) {
                    ?>
                        <div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">S:NO</th>
                                        <th scope="col">Bangla</th>
                                        <th scope="col">Math</th>
                                        <th scope="col">ICT</th>
                                        <th scope="col">Science</th>
                                        <th scope="col">Social Science</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td><?php echo $row['bangla'] ?></td>
                                        <td><?php echo $row['math'] ?></td>
                                        <td><?php echo $row['science'] ?></td>
                                        <td><?php echo $row['ict'] ?></td>
                                        <td><?php echo $row['social_science'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <center>
                                <?php
                                if ($row['bangla'] >= 40 && $row['math'] >= 40 && $row['science'] >= 40 && $row['ict'] >= 40 && $row['social_science'] >= 40) {
                                    echo '<span style="color: green; font-size: 18px; font-weight: 700;">You Are passed</span>';
                                } else {
                                    echo '<span style="color: red; font-size: 18px; font-weight: 700;">You are Fail</span>';
                                }
                                ?>
                            </center>
                        </div>
                <?php
                    }
                }
                ?>

            </div>
            <span style="top: 10%; width: 59%; left: 35%;position:absolute;">
                <marquee behavior="" direction="">Note: Ramadan class routine will be published soon.</marquee>
            </span>
        </div>
    </section>
</body>

</html>
<?php
$conn = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($conn, 'sms');
if (isset($_POST['up_student_info'])) {
    $id = $_POST['student_Id'];

    $query = "UPDATE students SET name='$_POST[up_student_name]',semester='$_POST[up_student_semester]',father_name='$_POST[up_student_father_name]',mother_name='$_POST[up_student_mother_name]',email='$_POST[up_student_email]',mobile='$_POST[up_student_mobile]',password='$_POST[up_student_password]' WHERE student_Id='$_POST[student_Id]'";
    $query_run = mysqli_query($conn, $query);

    if ($query) {
        echo '<script type="text/javascript">
        alert("Details Edited Successfully");</script>';
        $_SERVER['PHP_SELF'];
    } else {
        echo '<script type="text/javascript">
        alert("Fail To update");</script>';
        $_SERVER['PHP_SELF'];
    }
}
?>

<?php
if (isset($_POST['logout'])) {
    header("Location:logout.php");
}
?>

<?php
if (isset($_POST['disagree'])) {
    $_SERVER['PHP_SELF'];
}
?>