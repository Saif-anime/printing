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

    <title>Dashboard - Printing House </title>
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
                    <li class="breadcrumb-item active">Order</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">















                        <!-- Recent Sales -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">



                                <div class="card-body">
                                    <h5 class="card-title">Orders</h5>

                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>

                                                <th scope="col">Customer's Name</th>
                                                <th scope="col">Document / Photo / File</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Types</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
include "conn.php";





// gift 


// Prepare and execute the SQL query
$sql_gift = "
    SELECT 
        gi.id AS gift_id, 
        gi.payment_id AS gift_payment_id, 
        gi.product AS gift_product, 
        gi.product_photo AS gift_product_photo, 
        gi.color AS gift_color, 
        gi.qty AS gift_qty, 
        gi.time AS gift_time, 
        gi.status AS gift_status, 
        p.*, 
        u.*
    FROM 
        gift_order gi
    JOIN 
        payments p ON gi.payment_id = p.id
    JOIN 
        users u ON p.userid = u.id";
$result_gift = mysqli_query($conn, $sql_gift);

// Check if the query was successful
if ($result_gift) {
    $i=1;
    // Fetch and display the results
    while ($row_gift = mysqli_fetch_assoc($result_gift)) {
    //    print_r($row_gift);


        echo " <tr>
      
        <td>".$i."</td>
        <td>".$row_gift['name']."</td>
        <td> <a class='btn btn-sm btn-secondary' target='_blank' href='../".$row_gift['gift_product_photo']."'>View Files</a></td>
      
        <td>".$row_gift['amount']."</td>
        <td>gift print</td>";
        if($row_gift['gift_status']== 'pending'){
            echo "<td><a class='btn btn-sm btn-warning'>".$row_gift['gift_status']."</a></td>";
        }
        if($row_gift['gift_status'] == 'completed'){
            echo "<td><a class='btn btn-sm btn-success'>".$row_gift['gift_status']."</a></td>";
        }
        if($row_gift['gift_status'] == 'cancel'){
            echo "<td><a class='btn btn-sm btn-danger'>".$row_gift['gift_status']."</a></td>";
        }

   
       echo "
        <td><a href='single_order.php?id=".$row_gift['gift_id']."&type=gift'>View</a></td>
       
    </tr>";

$i+=1;
    }
} else {
    // Handle query error
    echo "Error: " . mysqli_error($conn);
}









// Close the database connection
mysqli_close($conn);
?>








                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div><!-- End Recent Sales -->



                    </div>
                </div><!-- End Left side columns -->

                <!-- Right side columns -->










            </div>
        </section>

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