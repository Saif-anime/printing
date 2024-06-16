<?php
include 'conn.php';

$ids =$_GET['id'];



if(isset($_GET['id'])){

    $sql = "DELETE FROM `paper_type_add` WHERE id='$ids'";
    $sql_run = mysqli_query($conn, $sql);
    if($sql_run){
        header('location:paper_type_all.php');
    }else{
        header('location:paper_type_all.php');
    }


}else{
    header('location:paper_type_all.php');
}












?>