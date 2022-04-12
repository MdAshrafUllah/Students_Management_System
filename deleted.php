<?php
$conn = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($conn, 'sms');
if (isset($_POST['del_student_info'])) {

    $query = "delete form students where student_Id ='$_POST[del_student]'";
    $query_run = mysqli_query($conn, $query);
    if ($query) {
        echo '<script type="text/javascript">alert("Deleted data Successfully");</script>';
        header("Location:admin_dashboard.php");
    } else {
        echo '<script type="text/javascript">
                                                alert("Fail To deleted");</script>';
    }
}
