<?php
session_start();

if(!isset($_SESSION['userid'])){
  header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Online Document Printing Store India</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page">
    <!-- navbar here  -->
    <?php
include "./components/navbar.php";
 ?>

    <div class="sticky-container">
        <ul class="sticky">
            <li>
                <img src="assets/img/facebook-circle.png" width="32" height="32">
                <p><a href="https://www.facebook.com/codexworld" target="_blank">Like Us on<br>Facebook</a></p>
            </li>
            <li>
                <img src="assets/img/twitter-circle.png" width="32" height="32">
                <p><a href="https://twitter.com/codexworldblog" target="_blank">Follow Us on<br>Twitter</a></p>
            </li>
            <li>
                <img src="assets/img/gplus-circle.png" width="32" height="32">
                <p><a href="https://plus.google.com/codexworld" target="_blank">Follow Us on<br>Google+</a></p>
            </li>
            <li>
                <img src="assets/img/linkedin-circle.png" width="32" height="32">
                <p><a href="https://www.linkedin.com/company/codexworld" target="_blank">Follow Us on<br>LinkedIn</a>
                </p>
            </li>
            <li>
                <img src="assets/img/youtube-circle.png" width="32" height="32">
                <p><a href="http://www.youtube.com/codexworld" target="_blank">Subscribe on<br>YouYube</a></p>
            </li>
            <li>
                <img src="assets/img/what_app.webp" width="32" height="32">
                <p><a href="https://api.whatsapp.com/message/WADLUX3FBOWJE1?autoload=1&app_absent=0" target="_blank">Message me<br>Whats app</a></p>
            </li>
        </ul>
    </div>


    <main class="main">

















        <!-- Contact Section -->
        <section id="contact" class="contact section mt-5">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Your Order Print List</h2>
                <!-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> -->
            </div><!-- End Section Title -->



            <div class="container">

                <table class="table">
                    <thead>
                        <tr>

                            <th scope="col">User Name</th>
                            <th scope="col">Document / Photo / Filet</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Types</th>
                            <th scope="col">Status</th>
                        </tr>

                    </thead>
                    <tbody>

                        <?php
include "./Admin/conn.php";

$id = $_SESSION['userid'];

$sql = "
    SELECT 
        po.id AS photo_id, 
        po.payment_id AS photo_payment_id, 
        po.size AS photo_size, 
        po.file AS photo_file, 
        po.date AS photo_date, 
        po.status AS photo_status, 
        po.userid AS photo_userid, 
        p.*, 
        u.*
    FROM 
        photo_order po
    JOIN 
        payments p ON po.payment_id = p.id
    JOIN 
        users u ON p.userid = u.id WHERE po.userid='$id'";

$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Fetch and display the results
    while ($row = mysqli_fetch_assoc($result)) {
        // print_r($row);
       

        echo " <tr>
      

        <td>".$row['name']."</td>
        <td> <a class='btn btn-sm btn-secondary' target='_blank' href='../".$row['photo_file']."'>View Files</a></td>
      
        <td>".$row['amount']."</td>
        <td>photo print</td>";

if($row['photo_status']== 'pending'){
    echo "<td><a class='btn btn-sm btn-warning'>".$row['photo_status']."</a></td>";
}
if($row['photo_status'] == 'completed'){
    echo "<td><a class='btn btn-sm btn-success'>".$row['photo_status']."</a></td>";
}
if($row['photo_status'] == 'cancel'){
    echo "<td><a class='btn btn-sm btn-danger'>".$row['photo_status']."</a></td>";
}


        
        echo "
      
       
    </tr>";


    }
} else {
    // Handle query error
    echo "Error: " . mysqli_error($conn);
}






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
        gi.userid AS userid, 
        p.*, 
        u.*
    FROM 
        gift_order gi
    JOIN 
        payments p ON gi.payment_id = p.id
    JOIN 
        users u ON p.userid = u.id WHERE gi.userid='$id'";
$result_gift = mysqli_query($conn, $sql_gift);

// Check if the query was successful
if ($result_gift) {
    // Fetch and display the results
    while ($row_gift = mysqli_fetch_assoc($result_gift)) {
    //    print_r($row_gift);

        echo " <tr>
      
       
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
       
       
    </tr>";


    }
} else {
    // Handle query error
    echo "Error: " . mysqli_error($conn);
}








$sql_doc = "SELECT 
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
    users u ON po.userid = u.id WHERE po.userid='$id'";


$result_doc = mysqli_query($conn, $sql_doc);


// Check if the query was successful
if ($result_doc) {
    // Fetch and display the results
    while ($row_doc = mysqli_fetch_assoc($result_doc)) {
        // print_r($row_doc);
       

        echo " <tr>
      
      
        <td>".$row_doc['name']."</td>
        <td> <a class='btn btn-sm btn-secondary' target='_blank' href='../".$row_doc['doc_file']."'>View Files</a></td>
      
        <td>".$row_doc['amount']."</td>
        <td>document print</td>";
        if($row_doc['doc_status']== 'pending'){
            echo "<td><a class='btn btn-sm btn-warning'>".$row_doc['doc_status']."</a></td>";
        }
        if($row_doc['doc_status'] == 'completed'){
            echo "<td><a class='btn btn-sm btn-success'>".$row_doc['doc_status']."</a></td>";
        }
        if($row_doc['doc_status'] == 'cancel'){
            echo "<td><a class='btn btn-sm btn-danger'>".$row_doc['doc_status']."</a></td>";
        }
      
        echo "
      
       
    </tr>";


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



        </section><!-- /Contact Section -->

    </main>


    <?php
    include "./components/footer.php";
    ?>


    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>