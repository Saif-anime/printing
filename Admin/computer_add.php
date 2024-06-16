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
                    <li class="breadcrumb-item active">Computer Accessories</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->


        <?php

include "conn.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method

    $title = $_POST['title'];
    $price = $_POST['price'];
    $cate = $_POST['cate'];
    $file = $_FILES['file'];

    $file_name = $file['name'];
    $file_erro = $file['error'];
    $file_path = $file['tmp_name'];
    $time = date("d-m-Y")."-".time();
    
    
    $file_name_update = $time."-".$stripped = str_replace(' ', '', $file_name);




    if($file_erro == 0){

        $upload_dir = "uploads/".$file_name_update;

        // tmp_name ,upload dir

        $move_file = move_uploaded_file($file_path,  $upload_dir);


      
    $sql = "INSERT INTO `computer_add`(`img`, `price`, `title`, `time`, `cate`) VALUES ('$upload_dir','$price','$title','$time','$cate')";
    $sql_run = mysqli_query($conn, $sql);

    if($sql_run){
        echo "succesfull computer add";
    }else{
        echo "blog add nhi hai";
    }





    }else{
        echo "file error";
    }














}




?>

        <!-- form here  -->


        <!-- post - secure , get -> unsecure , search  -->
        <!-- General Form Elements -->
        <form method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Product' Name</label>
                <div class="col-sm-10">
                    <input type="text" name="title" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="number" name="price" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                    <div class="col-md-12">
                        <select name="cate" id="paper_size" class="form-control">
                            <option value="0">---------Select Photo Size-------</option>



                            <option>Computer</option>
                            <option>Keyboard</option>
                            <option>Mouse</option>
                            <option>Others</option>





                        </select>

                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Computer Images</label>
                <div class="col-sm-10">
                    <input type="file" name="file" class="form-control">
                </div>
            </div>







            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Submit Button</label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit Form</button>
                </div>
            </div>

        </form><!-- End General Form Elements -->







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