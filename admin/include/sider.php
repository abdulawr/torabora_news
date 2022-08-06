  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">توره بوړه وېبپاڼه</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
           
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./dashboard" class="nav-link <?php if($page=="home"){echo "active";}?>">
                  <i class="far fa-address-card nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
             
            </ul>
          </li>

        
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-blog"></i>
              <p>
                Blog
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">

            <li class="nav-item">
                <a href="writeBlog" class="nav-link">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Write Blog</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="blogList" class="nav-link">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Blog List</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="addNewBlogCategory" class="nav-link">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>New Blog Category</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="blogCategoryList" class="nav-link">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Blog Category List</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                News
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">

            <li class="nav-item">
                <a href="AddNews" class="nav-link">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Add News</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="NewsList" class="nav-link">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>News List</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="NewHeadlineList" class="nav-link">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>News Headline List</p>
                </a>
              </li>

            <li class="nav-item">
                <a href="AddCity" class="nav-link">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Add City</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="ShowCityLIst" class="nav-link">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>City List</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="AddNewsCategory" class="nav-link">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Add New Category</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="ShowNewsCategory" class="nav-link">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>New Category List</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-photo-video"></i>
              <p>
                Videos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="uploadVideo" class="nav-link">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Upload Video</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="videoList" class="nav-link">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Video List</p>
                </a>
              </li>

            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-music"></i>
              <p>
                Audio
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="UploadAudio" class="nav-link">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Upload Audio</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="ShowAudioList" class="nav-link">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Audio List</p>
                </a>
              </li>

            </ul>
          </li>



          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                Control Section
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="updateProfile" class="nav-link">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Update Profile</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="companyInfo" class="nav-link">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Company Info</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="contact" class="nav-link">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>User Emails</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="Subscribers" class="nav-link">
                  <i class="fas fa-arrow-right nav-icon"></i>
                  <p>Subscribers</p>
                </a>
              </li>

            </ul>
          </li>


        
                   
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>