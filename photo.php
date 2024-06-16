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

        <!-- Hero Section -->
        <section id="hero" class="hero section">

        <img src="assets/img/slider.webp" alt="" data-aos="fade-in">

            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <h2 data-aos="fade-up" data-aos-delay="100">WE PRINT ALL DOCUMENT ONLINE.</h2>
                        <p data-aos="fade-up" data-aos-delay="200">India's First Online Document Printing Store</p>
                    </div>
                    <div class="col-lg-5">
                        <a href="" class="btn btn-outline-light rounded-none px-3 mt-5" style="    border: 2px solid white !important;
    border-radius: 2px !important;">PRINT NOW</a>
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->








        <!-- Contact Section -->
        <section id="contact" class="contact section">




            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Photo Print</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->




            <?php
include "./Admin/conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method
    $paper_size = $_POST['paper_size'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $amount = $_POST['amount'];
    $ref_id = $_POST['ref_id'];

    $userid = $_SESSION['userid'];

    // Check if the payment is already done
    $sql_read = "SELECT * FROM `payments` WHERE upi_ref_id=? AND payment_status='success'";
    $stmt = $conn->prepare($sql_read);
    $stmt->bind_param("s", $ref_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>This Payment Already Done!</strong> Please Try Again.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    } else {
        $photo_file = $_FILES['photo_file'];
        $payment_file = $_FILES['payment_file'];

        $photo_file_name = $photo_file['name'];
        $photo_file_error = $photo_file['error'];
        $photo_file_path = $photo_file['tmp_name'];

        $payment_file_name = $payment_file['name'];
        $payment_file_error = $payment_file['error'];
        $payment_file_path = $payment_file['tmp_name'];

        $time = date("d-m-Y") . "-" . time();
        $photo_file_name_update = $time . "-" . str_replace(' ', '', $photo_file_name);
        $payment_file_name_update = $time . "-" . str_replace(' ', '', $payment_file_name);

        if ($photo_file_error == 0 && $payment_file_error == 0) {
            $photo_upload_dir = "frontupload/" . $photo_file_name_update;
            $payment_file_upload_dir = "frontupload/" . $payment_file_name_update;

            // Move the files to the upload directory
            $move_photo = move_uploaded_file($photo_file_path, $photo_upload_dir);
            $move_payment = move_uploaded_file($payment_file_path, $payment_file_upload_dir);

            if ($move_photo && $move_payment) {
                $timecreated = date("d-m-Y");

                // Insert into payments table
                $sql_payment = "INSERT INTO `payments`(`address`, `amount`, `payment_status`, `contact`, `upi_ref_id`, `upi_img`, `time`) VALUES (?, ?, 'success', ?, ?, ?, ?)";
                $stmt_payment = $conn->prepare($sql_payment);
                $stmt_payment->bind_param("ssssss", $address, $amount, $phone, $ref_id, $payment_file_upload_dir, $timecreated);
                $stmt_payment->execute();

                // Get the last inserted payment ID
                $payment_id = $stmt_payment->insert_id;
                $status = 'pending';
                
                // Insert into product table
                $sql_product = "INSERT INTO `photo_order`(`payment_id`, `size`, `file`, `status`, `date`, `userid`) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt_product = $conn->prepare($sql_product);
                $stmt_product->bind_param("ssssss", $payment_id, $paper_size, $photo_upload_dir, $status, $timecreated, $userid);
                $stmt_product->execute();

                if ($stmt_payment && $stmt_product) {
                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Congratulations!</strong> Your File Upload Successfully.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                } else {
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Sorry!</strong> Please Try Again.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                }
            } else {
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Sorry!</strong> File Upload Error.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Sorry!</strong> File Error.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
    }
    $stmt->close();
    $conn->close();
}
?>




            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-4">

                        <img src="assets/img/bar_code.jpg" alt="" class="img-fluid">

                    </div>

                    <div class="col-lg-8">
                        <form method="post" enctype="multipart/form-data" class="php-email-forms" data-aos="fade-up"
                            data-aos-delay="200">
                            <div class="row gy-4">

                                <div class="col-md-12">
                                    <select name="paper_size" id="paper_size" class="form-control">
                                        <option value="0">---------Select Photo Size-------</option>
                                        <?php

include "./Admin/conn.php";

$sql = "SELECT * FROM `photo_print`";
$sql_run = mysqli_query($conn, $sql);

$row = mysqli_num_rows($sql_run);

if($row>0){

    while($data = mysqli_fetch_array($sql_run)){

       

        echo " <option value=".$data['id'].">".$data['photo_size']."</option> ";

    }

}


?>







                                    </select>

                                </div>
                                <div class="col-md-12">
                                    <input type="file" class="form-control" name="photo_file" required="">
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="address"
                                        placeholder="Delivery Address" required="">
                                </div>
                                <div class="col-md-12">
                                    <input type="number" class="form-control" name="phone"
                                        placeholder="Enter the Contact Number" required="">
                                </div>
                                <div class="col-md-12">
                                    <label>Total Amount (Note:- Delivery Charge also included) </label>
                                    <input type="text" id="amount" class="form-control" name="amount" readonly
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="ref_id"
                                        placeholder="UPI Reference Id " required="">
                                </div>








                                <div class="col-md-12">
                                    <label>UPI Payment Photo Upload</label>
                                    <input type="file" class="form-control" name="payment_file" required="">
                                </div>










                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>

                                    <button type="submit">Submit</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>

        </section><!-- /Contact Section -->

    </main>

    <div id="result"></div>
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


<script>
$(document).ready(function() {
    $('#paper_size').change(function() {
        var selectedValue = $(this).val();

        $.ajax({
            url: 'get_data_photo.php',
            type: 'POST',
            data: {
                value: selectedValue
            },
            success: function(response) {

                if (response == 'No data found') {
                    $('#amount').val('User Select wrong Value');
                } else {
                    $('#amount').val(parseInt(response) + parseInt("<?php echo $_SESSION['delivery_charge']?>")); // inlcluded delivery charged
                }

            }
        });
    });
});
</script>

</html>


