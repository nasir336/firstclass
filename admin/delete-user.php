<?php
include('config.php');
$userid = $_GET['id'];
$sql = "DELETE FROM user WHERE user_id = {$userid}";
if(mysqli_query($conn,$sql)){
    header("location: http://localhost/cmsProject/admin/users.php");
}

?>