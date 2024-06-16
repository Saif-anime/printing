  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
              <a class="nav-link " href="admin.php">
                  <i class="bi bi-grid"></i>
                  <span>Dashboard</span>
              </a>
          </li><!-- End Dashboard Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#components-gift" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-menu-button-wide"></i><span>Gift Section </span><i
                      class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="components-gift" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="gift_product_add.php">
                          <i class="bi bi-circle"></i><span>Add Gift Product</span>
                      </a>
                  </li>
                  <li>
                      <a href="all_gift_product.php">
                          <i class="bi bi-circle"></i><span>All Gift Product</span>
                      </a>
                  </li>

              </ul>
          </li><!-- End Components Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" href="photo_order.php">
                  <i class="bi bi-person"></i>
                  <span>Photo Order Page</span>
              </a>
          </li><!-- End Profile Page Nav -->


          
          <li class="nav-item">
              <a class="nav-link collapsed" href="document_order.php">
                  <i class="bi bi-person"></i>
                  <span>Document Order Page</span>
              </a>
          </li><!-- End Profile Page Nav -->


          
          <li class="nav-item">
              <a class="nav-link collapsed" href="gift_order.php">
                  <i class="bi bi-person"></i>
                  <span>Gift Order Page</span>
              </a>
          </li><!-- End Profile Page Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#components-photo" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-menu-button-wide"></i><span>Photo Section </span><i
                      class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="components-photo" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="photo_add.php">
                          <i class="bi bi-circle"></i><span>Add Photo Size</span>
                      </a>
                  </li>
                  <li>
                      <a href="all_photo.php">
                          <i class="bi bi-circle"></i><span>All Photo Size</span>
                      </a>
                  </li>

              </ul>
          </li><!-- End Components Nav -->


          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#components-computer" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-menu-button-wide"></i><span>Computer Accessories Section </span><i
                      class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="components-computer" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="computer_add.php">
                          <i class="bi bi-circle"></i><span>Add Computer </span>
                      </a>
                  </li>
                  <li>
                      <a href="computer_all.php">
                          <i class="bi bi-circle"></i><span>All Computer</span>
                      </a>
                  </li>

              </ul>
          </li><!-- End Components Nav -->


          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#components-document" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-menu-button-wide"></i><span>Documents Section </span><i
                      class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="components-document" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="paper_type_add.php">
                          <i class="bi bi-circle"></i><span>Add Paper Type </span>
                      </a>
                  </li>
                  <li>
                      <a href="paper_type_all.php">
                          <i class="bi bi-circle"></i><span>All Paper Type</span>
                      </a>
                  </li>
                  <li>
                      <a href="paper_size_add.php">
                          <i class="bi bi-circle"></i><span>Add Paper Size</span>
                      </a>
                  </li>
                  <li>
                      <a href="paper_size_all.php">
                          <i class="bi bi-circle"></i><span>All Paper Size </span>
                      </a>
                  </li>
                  <li>
                      <a href="others_document.php">
                          <i class="bi bi-circle"></i><span>Add Other Details</span>
                      </a>
                  </li>

              </ul>
          </li><!-- End Components Nav -->




          <li class="nav-heading">Pages</li>

          <li class="nav-item">
              <a class="nav-link collapsed" href='admin_user_profile.php?id=<?php echo $_SESSION['admin_id']; ?>'>
                  <i class="bi bi-person"></i>
                  <span>Profile</span>
              </a>
          </li><!-- End Profile Page Nav -->


       
         

      </ul>

  </aside><!-- End Sidebar-->