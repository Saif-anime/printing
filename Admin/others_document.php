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
                    <li class="breadcrumb-item active">Other Information</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->


        <?php
include "conn.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate inputs
    $id = $_POST['id'];
    $black_white = $_POST['black_white'];
    $full_color = $_POST['full_color'];
    $single_side = $_POST['single_side'];
    $both_side = $_POST['both_side'];
    $spiral_binding = $_POST['spiral_binding'];
    $delivery_charge = $_POST['delivery_charge'];

 
   

    // Prepare the SQL query to update the data

    $sql = "UPDATE `other_information_document` SET `black_white` = ?, `full_color` = ?, `single_side` = ?, `both_side` = ?, `spiral_binding` = ?, `delivery_charge`= ? WHERE `id` = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssssi", $black_white, $full_color, $single_side, $both_side, $spiral_binding,$delivery_charge, $id);
        
        if ($stmt->execute()) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Congratulations!</strong> Form updated successfully.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Sorry!</strong> There was an error updating your form. Please try again.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
        }
        
        $stmt->close();
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Sorry!</strong> There was an error preparing the statement. Please try again.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
    }
    
    $conn->close();
}
?>


        <!-- form here  -->


        <!-- post - secure , get -> unsecure , search  -->
        <!-- General Form Elements -->





        <?php
include 'conn.php'; // Include the database connection file

// SQL query to select all data from the other_information_document table
$sql = "SELECT * FROM `other_information_document`";

// Execute the query
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
   
    while($row = $result->fetch_assoc()) {



        ?>
        <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>"> <!-- Hidden field for ID -->
            <label for="inputText" class="col-sm-2 col-form-label">
                <h3>1. Colors Price</h3>
            </label>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Black & White </label>
                <div class="col-sm-10">
                    <input type="number" name="black_white" value="<?php echo $row['black_white']; ?>" class="form-control">
                </div>

            </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Full Color </label>
                <div class="col-sm-10">
                    <input type="number" name="full_color" value="<?php echo $row['full_color']; ?>" class="form-control">
                </div>

            </div>

            <label for="inputText" class="col-sm-4 col-form-label">
                <h3>2. Printing Side Price</h3>
            </label>

            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Single Side </label>
                <div class="col-sm-10">
                    <input type="number" name="single_side" value="<?php echo $row['single_side']; ?>" class="form-control">
                </div>

            </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Both Side</label>
                <div class="col-sm-10">
                    <input type="number" name="both_side" value="<?php echo $row['both_side']; ?>" class="form-control">
                </div>

            </div>





            <label for="inputText" class="col-sm-4 col-form-label">
                <h3>3. Spiral Binding Price</h3>
            </label>

            <div class="row mb-3">
                <label for="inputText"  class="col-sm-2 col-form-label">Spiral Binding</label>
                <div class="col-sm-10">
                    <input type="number" value="<?php echo $row['spiral_binding']; ?>" name="spiral_binding" class="form-control">
                </div>
            </div>


            <label for="inputText" class="col-sm-4 col-form-label">
                <h3>3. Delivery Charges</h3>
            </label>

            <div class="row mb-3">
                <label for="inputText"  class="col-sm-2 col-form-label">Delivery Charges</label>
                <div class="col-sm-10">
                    <input type="number" value="<?php echo $row['delivery_charge']; ?>" name="delivery_charge" class="form-control">
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
   
}

// Close the connection
$conn->close();
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