<?php
include 'conn.php';

$ids =$_GET['id'];



if(isset($_GET['id'])){

    $sql = "DELETE FROM `gift_print` WHERE id='$ids'";
    $sql_run = mysqli_query($conn, $sql);
    if($sql_run){
        header('location:all_gift_product.php');
    }else{
        header('location:all_gift_product.php');
    }


}else{
    header('location:all_gift_product.php');
}












?>