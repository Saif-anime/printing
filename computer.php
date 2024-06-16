<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Online Computer Store India</title>
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








        <!-- Portfolio Section -->
        <section id="portfolio" class="portfolio section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Computer Accessories</h2>
                <p>GET BEST COMPUTER ACCESSORIES</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                    <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-Mouse">Mouse</li>
                        <li data-filter=".filter-Keyboard">Keyboard</li>
                        <li data-filter=".filter-Monitar">Monitar</li>
                        <li data-filter=".filter-Computer">Computer</li>
                        <li data-filter=".filter-Others">Others</li>
                    </ul><!-- End Portfolio Filters -->

                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">


                        <?php
                             

                             include "./Admin/conn.php";
     
                             $sql = "SELECT * FROM `computer_add`";
                             $sql_run = mysqli_query($conn, $sql);
     
                             $row = mysqli_num_rows($sql_run);
     
                             if($row>0){
                                 $i = 1;
     
                                 while($data = mysqli_fetch_array($sql_run)){
                                 
                    
                    ?>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-<?php echo $data['cate'] ?>">
                            <img src="./Admin/<?php echo $data['img'] ?>" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4><?php echo $data['title'] ?></h4>
                                <p><?php echo $data['price'] ?> ₹</p>
                                <p><?php echo $data['cate'] ?> </p>
                                <a href="./Admin/<?php echo $data['img'] ?>" title="<?php echo $data['title'] ?>"
                                    data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>

                            </div>
                        </div><!-- End Portfolio Item -->

                        <?php
                        
                    }





}


?>

                    </div><!-- End Portfolio Container -->

                </div>

            </div>

        </section><!-- /Portfolio Section -->








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