<?php
include "config.php";

if(empty($_FILES['logo']['name'])){
    $file_name = $_POST['old-image'];
}else{
    $error = array();

    $file_name = $_FILES['logo']['name'];
    $file_size = $_FILES['logo']['size'];
    $file_tmp = $_FILES['logo']['tmp_name'];
    $file_type = $_FILES['logo']['type'];
    $file_ext = strtolower(end(explode('. ',$file_name)));
    
    // $extentions = array("jpeg","jpg","png");

    // if(in_array($file_ext,$extentions) == false){
    //     $error[] = "This extention file not allowed, please choose a JPG or PNG file.";
    // }
    if($file_size > 2097152){
        $error[] = "File size must be 2MB or Lower.";
    }
    if(empty($error) == true){
        move_uploaded_file($file_tmp, "images/".$file_name);
    }else{
       print_r($error);
       die(); 
    }
}

$spl = "UPDATE settings SET websitename = '{$_POST["post_title"]}',logo = '{$_POST["logo"]}',footerdesc = '{$_POST["postdesc"]}'";
$result = mysqli_query($conn, $spl);
if($result){
    header("Location: http://localhost/cmsProject/admin/setting.php");
}else{
    echo "Query Failed";
}
?>