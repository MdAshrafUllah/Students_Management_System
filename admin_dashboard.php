<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deshboard</title>
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
                                    <input style="margin-bottom: 10px;" class="button" type="submit" name="new_teacher" value="Add New Teacher">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input style="margin-bottom: 10px;" class="button" type="submit" name="new_student" value="Add New Student">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input style="margin-bottom: 10px;" class="button" type="submit" name="search_teachers" value="Search Teachers">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input style="margin-bottom: 10px;" class="button" type="submit" name="edit_teachers" value="Edit Teachers">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input style="margin-bottom: 10px;" class="button" type="submit" name="search_students" value="Search Students">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input style="margin-bottom: 10px;" class="button" type="submit" name="edit_students" value="Edit Students">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input style="margin-bottom: 10px;" class="button" type="submit" name="deleted_data" value="Deleted data">
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
                if (isset($_POST['search_teachers'])) {
                ?>
                    <div class="align-items-center d-flex justify-content-center ps-5 pt-5">
                        <h5>Search Teacher Information</h5>
                    </div>
                    <div class="align-items-center d-flex justify-content-center pb-3 ps-5 pt-3">
                        <form action="" method="post">
                            Enter Teacher ID:&nbsp;&nbsp;&nbsp;<input class="text-uppercase" type="text" name="teachers_id">&nbsp;&nbsp;&nbsp;<input name="teachers_search" class="btn btn-success" type="submit" value="Search">
                        </form>
                    </div>
                    <?php
                }
                if (isset($_POST['teachers_search'])) {
                    $query = "select * from teachers where teachers_id = '$_POST[teachers_id]'";
                    $query_run = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($query_run)) {
                    ?>
                        <div class="align-items-center d-flex justify-content-center ps-5 pt-5">
                            <h5>Search Teacher Information</h5>
                        </div>
                        <div class="align-items-center d-flex justify-content-center pb-3 ps-5 pt-3">
                            <form action="" method="post">
                                Enter Teacher ID:&nbsp;&nbsp;&nbsp;<input class="text-uppercase" type="text" name="teachers_id">&nbsp;&nbsp;&nbsp;<input name="teachers_search" class="btn btn-success" type="submit" value="Search">
                            </form>
                        </div>
                        <div style="padding: 0px 25px;">
                            <table>
                                <tr>
                                    <td class="col-form-label"><b>Teacher ID &nbsp;&nbsp;&nbsp;</b></td>
                                    <td><input class="text-uppercase" type="text" value=" <?php echo $row['teachers_id'] ?>" disabled></td>
                                </tr>
                                <tr>
                                    <td class="col-form-label"><b>Teacher Name &nbsp;&nbsp;&nbsp;</b></td>
                                    <td><input type="text" value=" <?php echo $row['name'] ?>" disabled></td>
                                </tr>
                                <tr>
                                    <td class="col-form-label"><b>Department &nbsp;&nbsp;&nbsp;</b></td>
                                    <td><input class="text-uppercase" type="text" value=" <?php echo $row['department'] ?>" disabled></td>
                                </tr>
                                <tr>
                                    <td class="col-form-label"><b>Father's Name &nbsp;&nbsp;&nbsp;</b></td>
                                    <td><input type="text" value=" <?php echo $row['father_name'] ?>" disabled></td>
                                </tr>
                                <tr>
                                    <td class="col-form-label"><b>Mother's Name &nbsp;&nbsp;&nbsp;</b></td>
                                    <td><input type="text" value=" <?php echo $row['mother_name'] ?>" disabled></td>
                                </tr>
                                <tr>
                                    <td class="col-form-label"><b>Email &nbsp;&nbsp;&nbsp;</b></td>
                                    <td><input type="text" value=" <?php echo $row['email'] ?>" disabled></td>
                                </tr>
                                <tr>
                                    <td class="col-form-label"><b>Mobile &nbsp;&nbsp;&nbsp;</b></td>
                                    <td><input type="text" value=" <?php echo $row['Mobile'] ?>" disabled></td>
                                </tr>
                                <tr>
                                    <td class="col-form-label"><b>Password &nbsp;&nbsp;&nbsp;</b></td>
                                    <td><input type="text" value=" <?php echo $row['password'] ?>" disabled></td>
                                </tr>
                            </table>
                        </div>
                <?php
                    }
                }
                ?>


                <?php
                if (isset($_POST['edit_teachers'])) {
                ?>
                    <div class="align-items-center d-flex justify-content-center ps-5 pt-5">
                        <h5>Edit Teacher Information</h5>
                    </div>
                    <div class="align-items-center d-flex justify-content-center pb-3 ps-5 pt-3">
                        <form action="" method="post">
                            Enter Teacher ID:&nbsp;&nbsp;&nbsp;<input class="text-uppercase" type="text" name="teachers_id">&nbsp;&nbsp;&nbsp;<input name="teachers_search_edit" class="btn btn-success" type="submit" value="Search">
                        </form>
                    </div>
                    <?php
                }
                if (isset($_POST['teachers_search_edit'])) {
                    $query = "select * from teachers where teachers_id = '$_POST[teachers_id]'";
                    $query_run = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($query_run)) {
                    ?>
                        <div class="align-items-center d-flex justify-content-center ps-5 pt-5">
                            <h5>Edit Teacher Information</h5>
                        </div>
                        <center>
                            <p style="color: red;">If you want to change a single data, then make sure to put others as same as they are.</p>
                        </center>
                        <div style="padding: 0px 25px;">
                            <form action="" method="post">
                                <table>
                                    <tr>
                                        <td class="col-form-label"><b>Teacher ID &nbsp;&nbsp;&nbsp;</b></td>
                                        <td><input class="text-uppercase" type="text" value="<?php echo $row['teachers_id'] ?>" disabled></td>
                                        <td><input class="text-uppercase" type="text" name="teachers_id"></td>
                                    </tr>
                                    <tr>
                                        <td class="col-form-label"><b>Teacher Name &nbsp;&nbsp;&nbsp;</b></td>
                                        <td><input type="text" value="<?php echo $row['name'] ?>" disabled></td>
                                        <td><input type="text" name="up_teacher_name"></td>
                                    </tr>
                                    <tr>
                                        <td class="col-form-label"><b>Department &nbsp;&nbsp;&nbsp;</b></td>
                                        <td><input class="text-uppercase" type="text" value="<?php echo $row['department'] ?>" disabled></td>
                                        <td><input class="text-uppercase" type="text" name="up_tdepartment"></td>
                                    </tr>
                                    <tr>
                                        <td class="col-form-label"><b>Father's Name &nbsp;&nbsp;&nbsp;</b></td>
                                        <td><input type="text" value="<?php echo $row['father_name'] ?>" disabled></td>
                                        <td><input type="text" name="up_tfather_name"></td>
                                    </tr>
                                    <tr>
                                        <td class="col-form-label"><b>Mother's Name &nbsp;&nbsp;&nbsp;</b></td>
                                        <td><input type="text" value="<?php echo $row['mother_name'] ?>" disabled></td>
                                        <td><input type="text" name="up_tmother_name"></td>
                                    </tr>
                                    <tr>
                                        <td class="col-form-label"><b>Email &nbsp;&nbsp;&nbsp;</b></td>
                                        <td><input type="text" value="<?php echo $row['email'] ?>" disabled></td>
                                        <td><input type="text" name="up_temail"></td>
                                    </tr>
                                    <tr>
                                        <td class="col-form-label"><b>Mobile &nbsp;&nbsp;&nbsp;</b></td>
                                        <td><input type="text" value="<?php echo $row['Mobile'] ?>" disabled></td>
                                        <td><input type="text" name="up_tmobile"></td>
                                    </tr>
                                    <tr>
                                        <td class="col-form-label"><b>Password &nbsp;&nbsp;&nbsp;</b></td>
                                        <td><input type="text" value="<?php echo $row['password'] ?>" disabled></td>
                                        <td><input type="text" name="up_tpass"></td>
                                    </tr>
                                    <tr>
                                        <td><br>
                                            <input class="btn btn-success" type="submit" name="up_teacher_info" value="Agree">&nbsp;&nbsp;&nbsp;
                                            <input class="btn btn-danger" type="submit" name="disagree" value="Disagree">
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
                if (isset($_POST['search_students'])) {
                ?>
                    <div class="align-items-center d-flex justify-content-center ps-5 pt-5">
                        <h5>Search Student Information</h5>
                    </div>
                    <div class="align-items-center d-flex justify-content-center pb-3 ps-5 pt-3">
                        <form action="" method="post">
                            Enter Student ID:&nbsp;&nbsp;&nbsp;<input class="text-uppercase" type="text" name="student_Id">&nbsp;&nbsp;&nbsp;<input name="students_search" class="btn btn-success" type="submit" value="Search">
                        </form>
                    </div>
                    <?php
                }
                if (isset($_POST['students_search'])) {
                    $query = "select * from students where student_Id = '$_POST[student_Id]'";
                    $query_run = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($query_run)) {
                    ?>
                        <div class="align-items-center d-flex justify-content-center ps-5 pt-5">
                            <h5>Search Student Information</h5>
                        </div>
                        <div class="align-items-center d-flex justify-content-center pb-3 ps-5 pt-3">
                            <form action="" method="post">
                                Enter Student ID:&nbsp;&nbsp;&nbsp;<input class="text-uppercase" type="text" name="student_Id">&nbsp;&nbsp;&nbsp;<input name="student_search" class="btn btn-success" type="submit" value="Search">
                            </form>
                        </div>
                        <div style="padding: 0px 25px;">
                            <table>
                                <tr>
                                    <td class="col-form-label"><b>Student ID</b></td>
                                    <td><input class="text-uppercase" type="text" value=" <?php echo $row['student_Id'] ?>" disabled></td>
                                </tr>
                                <tr>
                                    <td class="col-form-label"><b>Student Name</b></td>
                                    <td><input type="text" value=" <?php echo $row['name'] ?>" disabled></td>
                                </tr>
                                <tr>
                                    <td class="col-form-label"><b>Semester</b></td>
                                    <td><input type="text" value=" <?php echo $row['semester'] ?>" disabled></td>
                                </tr>
                                <tr>
                                    <td class="col-form-label"><b>Father's Name</b></td>
                                    <td><input type="text" value=" <?php echo $row['father_name'] ?>" disabled></td>
                                </tr>
                                <tr>
                                    <td class="col-form-label"><b>Mother's Name</b></td>
                                    <td><input type="text" value=" <?php echo $row['mother_name'] ?>" disabled></td>
                                </tr>
                                <tr>
                                    <td class="col-form-label"><b>Email</b></td>
                                    <td><input type="text" value=" <?php echo $row['email'] ?>" disabled></td>
                                </tr>
                                <tr>
                                    <td class="col-form-label"><b>Mobile</b></td>
                                    <td><input type="text" value=" <?php echo $row['mobile'] ?>" disabled></td>
                                </tr>
                                <tr>
                                    <td class="col-form-label"><b>Password</b></td>
                                    <td><input type="text" value=" <?php echo $row['password'] ?>" disabled></td>
                                </tr>
                            </table>
                        </div>
                <?php
                    }
                }
                ?>


                <?php
                if (isset($_POST['edit_students'])) {
                ?>
                    <div class="align-items-center d-flex justify-content-center ps-5 pt-5">
                        <h5>Edit Student Information</h5>
                    </div>
                    <div class="align-items-center d-flex justify-content-center pb-5 ps-5 pt-3">
                        <form action="" method="post">
                            Enter Student ID:&nbsp;&nbsp;&nbsp;<input class="text-uppercase" type="text" name="student_Id">&nbsp;&nbsp;&nbsp;<input name="students_search_edit" class="btn btn-success" type="submit" value="Search">
                        </form>
                    </div>
                    <?php
                }
                if (isset($_POST['students_search_edit'])) {
                    $query = "select * from students where student_Id = '$_POST[student_Id]'";
                    $query_run = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($query_run)) {
                    ?>
                        <div class="align-items-center d-flex justify-content-center ps-5 pt-5">
                            <h5>Edit Student Information</h5>
                        </div>
                        <center>
                            <p style="color: red;">If you want to change a single data, then make sure to put others as same as they are.</p>
                        </center>
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
                                            <a class="btn btn-danger" href="admin_dashboard.php" role="button">Disagree</a>
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
                if (isset($_POST['new_teacher'])) {
                ?>
                    <div class="align-items-center d-flex justify-content-center ps-5 pt-5">
                        <h5>Add New Teacher</h5>
                    </div>
                    <div style="padding: 0px 25px;">
                        <form action="" method="post">
                            <table>
                                <tr>
                                    <td class="col-form-label"><b>Teacher ID</b></td>
                                    <td><input class="text-uppercase" type="text" value="" name="nw_teacher_Id" required></td>
                                </tr>
                                <tr>
                                    <td class="col-form-label"><b>Teacher Name</b></td>
                                    <td><input type="text" value="" name="nw_teacher_name" required></td>
                                </tr>
                                <tr>
                                    <td class="col-form-label"><b>Department</b></td>
                                    <td><input class="text-uppercase" type="text" value="" name="nw_teacher_department" required></td>
                                </tr>
                                <tr>
                                    <td class="col-form-label"><b>Father's Name</b></td>
                                    <td><input type="text" value="" name="nw_teacher_father_name" required></td>
                                </tr>
                                <tr>
                                    <td class="col-form-label"><b>Mother's Name</b></td>
                                    <td><input type="text" value="" name="nw_teacher_mother_name" required></td>
                                </tr>
                                <tr>
                                    <td class="col-form-label"><b>Email</b></td>
                                    <td><input type="text" value="" name="nw_teacher_email" required></td>
                                </tr>
                                <tr>
                                    <td class="col-form-label"><b>Mobile</b></td>
                                    <td><input type="text" value="" name="nw_teacher_mobile" required></td>
                                </tr>
                                <tr>
                                    <td class="col-form-label"><b>Password</b></td>
                                    <td><input type="text" value="" name="nw_teacher_password" required></td>
                                </tr>
                                <tr>
                                    <td><br>
                                        <input class="btn btn-success" type="submit" name="add_nw_teacher" value="Agree">&nbsp;&nbsp;&nbsp;
                                        <a class="btn btn-danger" href="admin_dashboard.php" role="button">Disagree</a>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                <?php
                }
                if (isset($_POST['add_nw_teacher'])) {
                    $connection = mysqli_connect("localhost", "root", "");
                    $db = mysqli_select_db($connection, "sms");
                    $newteacherid = $_POST['nw_teacher_Id'];
                    $newteachername = $_POST['nw_teacher_name'];
                    $newteacherdm = $_POST['nw_teacher_department'];
                    $newteacherfname = $_POST['nw_teacher_father_name'];
                    $newteachermname = $_POST['nw_teacher_mother_name'];
                    $newteacheremail = $_POST['nw_teacher_email'];
                    $newteachermobile = $_POST['nw_teacher_mobile'];
                    $newteacherpass = $_POST['nw_teacher_password'];
                    $sql = "INSERT INTO teachers(teachers_id,name,department,father_name,mother_name,email,Mobile,password) VALUES ('$newteacherid','$newteachername','$newteacherdm','$newteacherfname','$newteachermname','$newteacheremail','$newteachermobile','$newteacherpass')";
                    $result = mysqli_query($connection, $sql);
                    if ($sql) {
                        echo '<script type="text/javascript">
                        alert("New Teacher Successfully");</script>';
                    } else {
                        echo '<script type="text/javascript">
                        alert("Fail To Add New Teacher");</script>';
                    }
                ?>

                <?php
                }
                ?>


                <?php
                if (isset($_POST['new_student'])) {
                ?>
                    <div class="align-items-center d-flex justify-content-center ps-5 pt-5">
                        <h5>Add New Student</h5>
                    </div>
                    <div style="padding: 0px 25px;">
                        <form action="" method="post">
                            <table>
                                <tr>
                                    <td class="col-form-label"><b>Student ID</b></td>
                                    <td><input class="text-uppercase" type="text" value="" name="nw_student_Id" required></td>
                                </tr>
                                <tr>
                                    <td class="col-form-label"><b>Student Name</b></td>
                                    <td><input type="text" value="" name="nw_student_name" required></td>
                                </tr>
                                <tr>
                                    <td class="col-form-label"><b>Semester</b></td>
                                    <td><input type="text" value="" name="nw_student_semester" required></td>
                                </tr>
                                <tr>
                                    <td class="col-form-label"><b>Father's Name</b></td>
                                    <td><input type="text" value="" name="nw_student_father_name" required></td>
                                </tr>
                                <tr>
                                    <td class="col-form-label"><b>Mother's Name</b></td>
                                    <td><input type="text" value="" name="nw_student_mother_name" required></td>
                                </tr>
                                <tr>
                                    <td class="col-form-label"><b>Email</b></td>
                                    <td><input type="text" value="" name="nw_student_email" required></td>
                                </tr>
                                <tr>
                                    <td class="col-form-label"><b>Mobile</b></td>
                                    <td><input type="text" value="" name="nw_student_mobile" required></td>
                                </tr>
                                <tr>
                                    <td class="col-form-label"><b>Password</b></td>
                                    <td><input type="text" value="" name="nw_student_password" required></td>
                                </tr>
                                <tr>
                                    <td><br>
                                        <input class="btn btn-success" type="submit" name="add_nw_student" value="Agree">&nbsp;&nbsp;&nbsp;
                                        <input class="btn btn-danger" type="submit" name="disagree" value="Disagree">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                <?php
                }
                if (isset($_POST['add_nw_student'])) {
                    $connection = mysqli_connect("localhost", "root", "");
                    $db = mysqli_select_db($connection, "sms");
                    $newstudentid = $_POST['nw_student_Id'];
                    $newstudentname = $_POST['nw_student_name'];
                    $newstudentsm = $_POST['nw_student_semester'];
                    $newstudentfname = $_POST['nw_student_father_name'];
                    $newstudentmname = $_POST['nw_student_mother_name'];
                    $newstudentemail = $_POST['nw_student_email'];
                    $newstudentmobile = $_POST['nw_student_mobile'];
                    $newstudentpass = $_POST['nw_student_password'];
                    $sql = "INSERT INTO students(student_Id,name,semester,father_name,mother_name,email,mobile,password) VALUES ('$newstudentid','$newstudentname','$newstudentsm','$newstudentfname','$newstudentmname','$newstudentemail','$newstudentmobile','$newstudentpass')";
                    $result = mysqli_query($connection, $sql);

                    if ($sql) {
                        echo '<script type="text/javascript">
                        alert("New Student Successfully");</script>';
                    } else {
                        echo '<script type="text/javascript">
                        alert("Fail To Add New Student");</script>';
                    }
                ?>

                <?php
                }
                ?>

                <?php
                if (isset($_POST['deleted_data'])) {
                ?>
                    <div class="align-items-center d-flex justify-content-center ps-5 pt-5">
                        <h5>Deleted Student Or Teacher Data</h5>
                    </div>
                    <div class="align-items-center d-flex justify-content-center pb-5 ps-5 pt-3">
                        <form action="" method="post">
                            Enter ID:&nbsp;&nbsp;&nbsp;<input class="text-uppercase" type="text" name="del_student">&nbsp;&nbsp;&nbsp;<input name="search_del" class="btn btn-danger" type="submit" value="Deleted">
                        </form>
                    </div>
                <?php
                }
                if (isset($_POST['search_del'])) {
                    $del_student = $_POST['del_student'];
                    $query = "delete from students where student_Id = '$del_student'";
                    $query_run = mysqli_query($connection, $query);
                }
                ?>
            </div>
        </div>
    </section>
</body>

</html>
<?php
$conn = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($conn, 'sms');
if (isset($_POST['up_teacher_info'])) {
    $id = $_POST['teachers_id'];

    $query = "UPDATE teachers SET name='$_POST[up_teacher_name]',department='$_POST[up_tdepartment]',father_name='$_POST[up_tfather_name]',mother_name='$_POST[up_tmother_name]',email='$_POST[up_temail]',mobile='$_POST[up_tmobile]',password='$_POST[up_tpass]' WHERE teachers_id='$_POST[teachers_id]'";
    $query_run = mysqli_query($conn, $query);

    if ($query) {
        echo '<script type="text/javascript">
        alert("Details Edited Successfully");</script>';
    } else {
        echo '<script type="text/javascript">
        alert("Fail To update");</script>';
    }
}
?>

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
    } else {
        echo '<script type="text/javascript">
        alert("Fail To update");</script>';
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