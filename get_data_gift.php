<?php
include "./Admin/conn.php";

if(isset($_POST['value'])){
    $selectedValue = $_POST['value'];

    
$sql = "SELECT * FROM `gift_print` WHERE id='$selectedValue'";
$sql_run = mysqli_query($conn, $sql);

$row = mysqli_num_rows($sql_run);

if($row>0){
    while($data = mysqli_fetch_array($sql_run)){
        echo $data['price'];
    }
}else{
    echo "No data found";
}


}else{
    echo "No data found";
}





?>