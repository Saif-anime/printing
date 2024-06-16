<!-- all data read  -->

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

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
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
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->




        <?php


include 'conn.php';

$ids =$_GET['id'];


if($_GET['id']){


    $sql = "SELECT * FROM `add_blog` WHERE id='$ids'";
    $sql_run = mysqli_query($conn, $sql);

    $row = mysqli_num_rows($sql_run);

    if($row > 0){

        while($f = mysqli_fetch_array($sql_run)){

?>

        <form method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" name="title" value="<?php echo $f['title']; ?>" class="form-control">
                </div>
            </div>


            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Description </label>
                <div class="col-sm-10">
                    <textarea class="form-control"  name="desc" row="5" col="5">
                    <?php echo $f['blog_desc']; ?>
                    </textarea>
                </div>
            </div>

            <img src="<?php echo $f['img'] ?>" width="100px" height="100px" alt="">

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">File </label>
                <div class="col-sm-10">
                    <input type="file"  name="file" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Submit Button</label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit Form</button>
                </div>
            </div>

        </form>

        <?php


        }




    }else{
        echo "no data exist";
    }



}



// update here 



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method

    $title = $_POST['title'];
    $desc = $_POST['desc'];
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


      
    $sql = "UPDATE `add_blog` SET `title`='$title',`blog_desc`='$desc',`img`='$upload_dir' WHERE id='$ids'";
    $sql_run = mysqli_query($conn, $sql);

    if($sql_run){
        echo "succesfull blog update";
    }else{
        echo "blog update nhi hai";
    }





    }else{
        echo "file error";
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





<!-- sql attack  -->



<!-- how many type of api  -->

payment api 
google 
youtube api 
facebook api

