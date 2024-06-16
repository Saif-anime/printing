
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

        <a href="home.php" class="logo d-flex align-items-center me-auto me-xl-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1 class="sitename">dwarkaprint.com</h1><span>.</span>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="index.php" class="">Home</a></li>

              
                <li><a href="document.php" class="">Document Print</a></li>
                <li><a href="gift.php" class="">Gift Print</a></li>
                <li><a href="photo.php" class="">Photo Print</a></li>
                <li><a href="computer.php" class="">Computer Accessories</a></li>
           
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
        <?php


if(!isset($_SESSION['userid'])){
 echo  '<a class="btn-getstarted" href="login.php">Login</a>';
}else{
    echo '<div class="dropdown">
    <button class="btn btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      '.$_SESSION['name'].'
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="#">'.$_SESSION['email'].'</a></li>
      <li><a class="dropdown-item" href="order.php"> Order Review</a></li>
      <li><a class="dropdown-item" href="profile.php?id='.$_SESSION['userid'].'">Profile</a></li>
      <li><a class="dropdown-item" href="logout.php">Logout</a></li>
    </ul>
  </div>';
}

?>
       

    </div>
</header>
