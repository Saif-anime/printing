<?php
include 'conn.php';

$ids =$_GET['id'];



if(isset($_GET['id'])){

    $sql = "DELETE FROM `computer_add` WHERE id='$ids'";
    $sql_run = mysqli_query($conn, $sql);
    if($sql_run){
        header('location:computer_all.php');
    }else{
        header('location:computer_all.php');
    }


}else{
    header('location:computer_all.php');
}












?>