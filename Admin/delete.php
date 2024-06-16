<?php
include 'conn.php';

$ids =$_GET['id'];

// sql injuction 

if(isset($_GET['id'])){

    $sql = "DELETE FROM `add_blog` WHERE id='$ids'";
    $sql_run = mysqli_query($conn, $sql);
    if($sql_run){
        header('location:all_blog.php');
    }else{
        echo "delete not succ";
    }


}else{
    header('location:all_blog.php');
}












?>