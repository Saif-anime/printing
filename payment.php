<?php
session_start();

if(!isset($_SESSION['paper_size']) && !isset($_SESSION['file'])){
  header('location:photo.php');
}

if(!isset($_SESSION['userid'])){
    header('Location:login.php');
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
                <img src="assets/img/pin-circle.png" width="32" height="32">
                <p><a href="https://www.pinterest.com/codexworld" target="_blank">Follow Us on<br>Pinterest</a></p>
            </li>
        </ul>
    </div>


    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">

            <img src="assets/img/slider.jpeg" alt="" data-aos="fade-in">

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
                <h2>Payment </h2>
                <!-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> -->
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-4">

                        <img src="assets/img/bar_code.jpg" alt="" class="img-fluid">

                    </div>

                    <div class="col-lg-8">
                        <form method="post" class="php-email-forms" data-aos="fade-up" data-aos-delay="200">
                            <div class="row gy-4">

                                <div class="col-md-12">
                                <input type="text" class="form-control" name="address" placeholder="Delivery Address" required="">
                                </div>
                                <div class="col-md-12">
                                <input type="number" class="form-control" name="phone" placeholder="Enter the Contact Number" required="">
                                </div>
                                <div class="col-md-12">
                                <label >Total Amount</label>
                                <input type="text" class="form-control" name="amount" value="20" readonly  required="">
                                </div>
                                <div class="col-md-12">
                                <input type="text" class="form-control" name="ref_id" placeholder="UPI Reference Id " required="">
                                </div>








                                <div class="col-md-12">
                                    <label >UPI Payment Photo Upload</label>
                                    <input type="file" class="form-control" name="file" required="">
                                </div>

                                <!-- <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Message"
                                        required=""></textarea>
                                </div> -->

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