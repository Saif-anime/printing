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
            <h1>Order Details</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->



        <!-- form here  -->
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> Order Details </h5>

                    <?php
                    include "conn.php";
                    if(isset($_GET['type']) && isset($_GET['id'])){

                        $type = $_GET['type'];
                        $id = $_GET['id'];

                        if($type == 'photo'){

                            

                            

// Prepare and execute the SQL query
$sql = " SELECT 
po.id AS photo_id, 
po.payment_id AS photo_payment_id, 
po.size AS photo_size, 
po.file AS photo_file, 
po.date AS photo_date, 
po.status AS photo_status, 
p.*, 
pp.*, 
u.*
FROM 
photo_order po
JOIN 
payments p ON po.payment_id = p.id
JOIN 
photo_print pp ON po.size = pp.id
JOIN 
users u ON p.userid = u.id
WHERE po.id = '$id'";  // Ensure the join condition matches your database schema

$result = mysqli_query($conn, $sql);


// print_r($result);

// Check if the query was successful
if ($result) {
    // Fetch and display the results
    while ($row = mysqli_fetch_assoc($result)) {
       
        // print_r($row);

        ?>

        <?php
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $status = $_POST['complete_status'];
            $sql_update = "UPDATE `photo_order` SET `status`='$status' WHERE id='$id'";
            $sql_update_run = mysqli_query($conn, $sql_update);
            if($sql_update_run){
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Congratulations!</strong> Update Order Status.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }else{
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Sorry</strong> Try Again.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }

        }

        ?>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="inputText" class="col-form-label fw-bold">Customer Details</label>
                            </br>
                            <label for="inputText" class="col-form-label"><?php echo $row['name']; ?></label>
                            </br>
                            <label for="inputText" class="col-form-label"><?php echo $row['email']; ?></label>
                            </br>
                            <label for="inputText" class="col-form-label"><?php echo $row['number']; ?></label>
                        </div>
                        <div class="col-md-4">
                            <label for="inputText" class="col-form-label fw-bold">Shipping Address</label>
                            <label for="inputText" class="col-form-label"><?php echo $row['address']; ?></label>
                            <label for="inputText" class="col-form-label">Contact No:
                                <?php echo $row['contact']; ?></label>
                        </div>

                        <div class="col-md-4">
                            <label for="inputText" class="col-form-label fw-bold">Order Details</label>

                            </br> <label for="inputText" class="col-form-label">Order Date:
                                <?php echo $row['photo_date']; ?></label>
                            </br>
                            <label for="inputText" class="col-form-label">Order Total:
                                <?php echo $row['amount']; ?></label>
                        </div>
                        <br>
                        <div class="col-md-6">
                            <label for="inputText" class="col-form-label fw-bold">Photo Details Printing</label>

                            </br> <label for="inputText" class="col-form-label">Photo Size:

                                <?php echo $row['photo_size']; ?></label>
                            </br>


                            <a target="_blank" href="../<?php echo $row['photo_file'];?>"><img width="400px"
                                    height="400px" src="../<?php echo $row['photo_file'];?>" alt="payment"></a>
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-form-label fw-bold">Payment Info</label>

                            </br> <label for="inputText" class="col-form-label">Payment Status:
                                <button class="btn btn-sm btn-success">
                                    <?php echo $row['payment_status']; ?></button></label>
                            </br>
                            <label for="inputText" class="col-form-label fw-bold">UPI Ref Id:
                                <?php echo $row['upi_ref_id']; ?></label>

                            <a target="_blank" href="../<?php echo $row['upi_img'];?>"><img width="400px" height="400px"
                                    src="../<?php echo $row['upi_img'];?>" alt="payment"></a>
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-form-label fw-bold">Order Complete Details</label>

                            <form method="post" enctype="multipart/form-data">



                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-12 col-form-label">Order Delivery
                                        Status</label>
                                    <div class="col-sm-10">
                                        <div class="col-md-12">
                                            <select name="complete_status" id="paper_size" class="form-control">
                                                <option value="0">---------Select Order Delivery Status-------</option>
                                                <option>pending</option>
                                                <option>completed</option>
                                                <option>cancel</option>


                                            </select>

                                        </div>
                                    </div>
                                </div>










                                <div class="row mb-3">

                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>

                            </form><!-- End General Form Elements -->


                        </div>
                    </div>


                    <?php


    

   

    }
} else {
    // Handle query error
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);












                        }else if($type == 'document'){




                            // Prepare and execute the SQL query
$sql = "SELECT 
po.id AS doc_id, 
po.payment_id AS doc_payment_id, 
po.paper_size AS doc_paper_size, 
po.paper_type AS doc_paper_type, 
po.file AS doc_file, 
po.date AS doc_date, 
po.status AS doc_status,
po.color AS doc_color,
po.side AS doc_side,
po.spiral_binding AS doc_spiral_binding,
po.no_of_copy AS doc_no_of_copy,
po.no_of_page AS doc_no_of_page,
po.userid AS doc_userid,
p.*, 
u.*,
psa.*,
pta.*
FROM 
document po
JOIN 
payments p ON po.payment_id = p.id
JOIN 
paper_size_add psa ON po.paper_size = psa.id
JOIN 
paper_type_add pta ON po.paper_type = pta.id
JOIN 
users u ON po.userid = u.id WHERE
po.id = '$id'";  // Ensure the join condition matches your database schema

$result = mysqli_query($conn, $sql);

// print_r($result);
// Check if the query was successful
if ($result) {
    // Fetch and display the results
    while ($row = mysqli_fetch_assoc($result)) {
       
        // print_r($row);

        ?>
          <?php
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $status = $_POST['complete_status'];
            $sql_update = "UPDATE `document` SET `status`='$status' WHERE id='$id'";
            $sql_update_run = mysqli_query($conn, $sql_update);
            if($sql_update_run){
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Congratulations!</strong> Update Order Status.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }else{
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Sorry</strong> Try Again.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }

        }

        ?>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="inputText" class="col-form-label fw-bold">Customer Details</label>
                            </br>
                            <label for="inputText" class="col-form-label"><?php echo $row['name']; ?></label>
                            </br>
                            <label for="inputText" class="col-form-label"><?php echo $row['email']; ?></label>
                            </br>
                            <label for="inputText" class="col-form-label"><?php echo $row['number']; ?></label>
                        </div>
                        <div class="col-md-4">
                            <label for="inputText" class="col-form-label fw-bold">Shipping Address</label>
                            <label for="inputText" class="col-form-label"><?php echo $row['address']; ?></label>
                            <label for="inputText" class="col-form-label">Contact No:
                                <?php echo $row['contact']; ?></label>
                        </div>

                        <div class="col-md-4">
                            <label for="inputText" class="col-form-label fw-bold">Order Details</label>

                            </br> <label for="inputText" class="col-form-label">Order Date:
                                <?php echo $row['doc_date']; ?></label>
                            </br>
                            <label for="inputText" class="col-form-label">Order Total:
                                <?php echo $row['amount']; ?></label>
                        </div>
                        <br>
                        <div class="col-md-6">
                            <label for="inputText" class="col-form-label fw-bold">Document Details Printing</label>

                            </br> <label for="inputText" class="col-form-label">Paper Size:

                                <?php echo $row['paper_size']; ?></label>
                            </br>
                            <label for="inputText" class="col-form-label">Paper Type:

<?php echo $row['paper_type']; ?></label>
</br>
                            <label for="inputText" class="col-form-label">NO of Copy :

                                <?php echo $row['doc_no_of_copy']; ?></label>
                            </br>
                        
                            <label for="inputText" class="col-form-label">NO of Pages :

                                <?php echo $row['doc_no_of_page']; ?></label>
                            </br>
                            <label for="inputText" class="col-form-label">Color:

                                <?php echo $row['doc_color']; ?></label>
                            </br>
                            <label for="inputText" class="col-form-label">Spiral Binding:

<?php echo $row['doc_spiral_binding']; ?></label>
</br>
<label for="inputText" class="col-form-label">Side:

<?php echo $row['doc_side']; ?></label>
</br>


                            <a target="_blank" href="../<?php echo $row['doc_file'];?>"><img width="400px"
                                    height="400px" src="../<?php echo $row['doc_file'];?>" alt="payment"></a>
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-form-label fw-bold">Payment Info</label>

                            </br> <label for="inputText" class="col-form-label">Payment Status:
                                <button class="btn btn-sm btn-success">
                                    <?php echo $row['payment_status']; ?></button></label>
                            </br>
                            <label for="inputText" class="col-form-label fw-bold">UPI Ref Id:
                                <?php echo $row['upi_ref_id']; ?></label>

                            <a target="_blank" href="../<?php echo $row['upi_img'];?>"><img width="400px" height="400px"
                                    src="../<?php echo $row['upi_img'];?>" alt="payment"></a>
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-form-label fw-bold">Order Complete Details</label>

                            <form method="post" enctype="multipart/form-data">



                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-12 col-form-label">Order Delivery
                                        Status</label>
                                    <div class="col-sm-10">
                                        <div class="col-md-12">
                                            <select name="complete_status" id="paper_size" class="form-control">
                                                <option value="0">---------Select Order Delivery Status-------</option>



                                                <option>pending</option>

                                                <option>completed</option>
                                                <option>cancel</option>








                                            </select>

                                        </div>
                                    </div>
                                </div>








                                <div class="row mb-3">

                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>

                            </form><!-- End General Form Elements -->


                        </div>
                    </div>


                    <?php


    

   

    }

}


                        }else if ($type == 'gift'){

// Prepare and execute the SQL query
$sql = "
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
gp.*, 
u.*
FROM 
gift_order gi
JOIN 
payments p ON gi.payment_id = p.id
JOIN 
gift_print gp ON gi.product = gp.id
JOIN 
users u ON p.userid = u.id
WHERE 
gi.id = '$id'";  // Ensure the join condition matches your database schema

$result = mysqli_query($conn, $sql);

// print_r($result);
// Check if the query was successful
if ($result) {
    // Fetch and display the results
    while ($row = mysqli_fetch_assoc($result)) {
       
        // print_r($row);

        ?>
          <?php
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $status = $_POST['complete_status'];
            $sql_update = "UPDATE `gift_order` SET `status`='$status' WHERE id='$id'";
            $sql_update_run = mysqli_query($conn, $sql_update);
            if($sql_update_run){
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Congratulations!</strong> Update Order Status.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }else{
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Sorry</strong> Try Again.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }

        }

        ?>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="inputText" class="col-form-label fw-bold">Customer Details</label>
                            </br>
                            <label for="inputText" class="col-form-label"><?php echo $row['name']; ?></label>
                            </br>
                            <label for="inputText" class="col-form-label"><?php echo $row['email']; ?></label>
                            </br>
                            <label for="inputText" class="col-form-label"><?php echo $row['number']; ?></label>
                        </div>
                        <div class="col-md-4">
                            <label for="inputText" class="col-form-label fw-bold">Shipping Address</label>
                            <label for="inputText" class="col-form-label"><?php echo $row['address']; ?></label>
                            <label for="inputText" class="col-form-label">Contact No:
                                <?php echo $row['contact']; ?></label>
                        </div>

                        <div class="col-md-4">
                            <label for="inputText" class="col-form-label fw-bold">Order Details</label>

                            </br> <label for="inputText" class="col-form-label">Order Date:
                                <?php echo $row['gift_time']; ?></label>
                            </br>
                            <label for="inputText" class="col-form-label">Order Total:
                                <?php echo $row['amount']; ?></label>
                        </div>
                        <br>
                        <div class="col-md-6">
                            <label for="inputText" class="col-form-label fw-bold">Gift Details Printing</label>

                            </br> <label for="inputText" class="col-form-label">Product Name:

                                <?php echo $row['title']; ?></label>
                            </br>
                            <label for="inputText" class="col-form-label">Quantity :

                                <?php echo $row['gift_qty']; ?></label>
                            </br>
                            <label for="inputText" class="col-form-label">Color:

                                <?php echo $row['gift_color']; ?></label>
                            </br>


                            <a target="_blank" href="../<?php echo $row['gift_product_photo'];?>"><img width="400px"
                                    height="400px" src="../<?php echo $row['gift_product_photo'];?>" alt="payment"></a>
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-form-label fw-bold">Payment Info</label>

                            </br> <label for="inputText" class="col-form-label">Payment Status:
                                <button class="btn btn-sm btn-success">
                                    <?php echo $row['payment_status']; ?></button></label>
                            </br>
                            <label for="inputText" class="col-form-label fw-bold">UPI Ref Id:
                                <?php echo $row['upi_ref_id']; ?></label>

                            <a target="_blank" href="../<?php echo $row['upi_img'];?>"><img width="400px" height="400px"
                                    src="../<?php echo $row['upi_img'];?>" alt="payment"></a>
                        </div>
                        <div class="col-md-6">
                            <label for="inputText" class="col-form-label fw-bold">Order Complete Details</label>

                            <form method="post" enctype="multipart/form-data">



                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-12 col-form-label">Order Delivery
                                        Status</label>
                                    <div class="col-sm-10">
                                        <div class="col-md-12">
                                            <select name="complete_status" id="paper_size" class="form-control">
                                                <option value="0">---------Select Order Delivery Status-------</option>



                                                <option>pending</option>

                                                <option>completed</option>
                                                <option>cancel</option>








                                            </select>

                                        </div>
                                    </div>
                                </div>








                                <div class="row mb-3">

                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>

                            </form><!-- End General Form Elements -->


                        </div>
                    </div>


                    <?php


    

   

    }
} else {
    // Handle query error
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);




                        }



                    }
                    
                    
                    ?>


                </div>
            </div>





        </div>




        <!-- delete  -->
        <!-- active 
        deactive  -->








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