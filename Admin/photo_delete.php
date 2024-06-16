<?php
include 'conn.php';

$ids =$_GET['id'];



if(isset($_GET['id'])){

    $sql = "DELETE FROM `photo_print` WHERE id='$ids'";
    $sql_run = mysqli_query($conn, $sql);
    if($sql_run){
        header('location:all_photo.php');
    }else{
        header('location:all_photo.php');
    }


}else{
    header('location:all_photo.php');
}












?>