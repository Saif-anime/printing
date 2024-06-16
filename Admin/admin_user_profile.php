<?php
session_start();

if(!isset($_SESSION['admin_id'])){
  header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Gift Product Add - Printing House </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

    <?php

include './component/navbar.php';
include './component/sidebar.php';

?>



    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->


        <?php
                include "conn.php";
                $ids =$_GET['id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method

 
    $fullname = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
   


      
    $sql = "UPDATE `users` SET `name`='$fullname',`email`='$email',`number`='$phone',`pass`='$pass' WHERE id='$ids'";
    $sql_run = mysqli_query($conn, $sql);

    if($sql_run){

        $_SESSION['admin_id'] =  $ids;
        $_SESSION['admin_name'] = $fullname;
        
        $_SESSION['email_admin'] = $email;
     
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Congratulations!</strong> Your Profile Updated.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
    }else{
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Sorry !</strong> Something went wrong !
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }








}


    ?>




        <!-- form here  -->
        <?php


include 'conn.php';

$ids =$_GET['id'];


if($_GET['id']){


    $sql = "SELECT * FROM `users` WHERE id='$ids' AND is_admin='1'";
    $sql_run = mysqli_query($conn, $sql);

    $row = mysqli_num_rows($sql_run);

    if($row > 0){

        while($f = mysqli_fetch_array($sql_run)){

?>


        <!-- post - secure , get -> unsecure , search  -->
        <!-- General Form Elements -->
        <form method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" value="<?php echo $f['name']; ?>" name="name" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" value="<?php echo $f['email']; ?>" name="email" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <input type="number" value="<?php echo $f['number']; ?>" name="phone" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="text" name="pass" value="<?php echo $f['pass']; ?>" class="form-control">
                </div>
            </div>










            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Submit Button</label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit Form</button>
                </div>
            </div>

        </form><!-- End General Form Elements -->

        <?php


}




}else{
echo "no data exist";
}



}
?>





    </main><!-- End #main -->



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>