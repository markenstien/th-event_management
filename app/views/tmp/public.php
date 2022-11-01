<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title><?php echo $pageTitle ?? COMPANY_NAME?></title>
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="<?php echo _path_tmp_root('uliya-html/css/bootstrap.css')?>"/>
  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo _path_tmp_root('uliya-html/css/style.css')?>" rel="stylesheet" />
  <!-- responsive style -->
  <link href="<?php echo _path_tmp_root('uliya-html/css/responsive.css')?>" rel="stylesheet" />

  <style>
    ul.navbar-nav {
        list-style-type: none;
    }
  </style>
</head>

<body>

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-11 offset-lg-1">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
              <a class="navbar-brand" href="index.html">
                <span><?php echo COMPANY_NAME?></span>
              </a>
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                  <ul class="navbar-nav list-unstyled">
                    <li class="nav-item active">
                      <a class="nav-link" href="<?php echo _route('home:index')?>#home">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo _route('home:index')?>#about"> About</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo _route('home:index')?>#portfolio"> Portfolio </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo _route('home:index')?>#contact">Contact Us</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo _route('auth:login')?>">Login</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo _route('user:register')?>">Register</a>
                    </li>
                  </ul>
                  <!-- <form class="form-inline">
                    <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
                  </form> -->
                </div>

              </div>
            </nav>
          </div>
        </div>
      </div>
    </header>
    <?php produce('content')?>
  <!-- end client section -->

  <!-- contact section -->

  <section class="contact_section layout_padding" id="contact">
    <div class="bg-img2">
      <img src="<?php echo _path_tmp_root('uliya-html/images/bg-img-2.png')?>" alt="">
    </div>
    <div class="container">
      <div class="heading_container">
        <h2>
          Contact Us
        </h2>
      </div>
      <div class="">
        <div class="row">
          <div class="col-md-8 mx-auto">
            <form action="">
              <div class="contact_form-container">
                <div>
                  <div>
                    <input type="text" placeholder="Name">
                  </div>
                  <div>
                    <input type="text" placeholder="Phone Number">
                  </div>
                  <div>
                    <input type="email" placeholder="Email">
                  </div>
                  <div class="">
                    <input type="text" placeholder="Message" class="message_input">
                  </div>
                  <div class=" d-flex justify-content-center ">
                    <button type="submit">
                      Send
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- end contact section -->


  <!-- info section -->
  <section class="info_section ">
    <div class="container">
      <div class="info_container">
        <div class="info_social">
          <div class="d-flex justify-content-center">
            <h4 class="">
              Follow on
            </h4>
          </div>
          <div class="social_box">
            <a href="#">
              <img src="<?php echo _path_tmp_root('uliya-html/images/fb.png')?>" alt="">
            </a>
            <a href="#">
              <img src="<?php echo _path_tmp_root('uliya-html/images/twitter.png')?>" alt="">
            </a>
            <a href="#">
              <img src="<?php echo _path_tmp_root('uliya-html/images/instagram.png')?>" alt="">
            </a>
            <a href="#">
              <img src="<?php echo _path_tmp_root('uliya-html/images/linkedin.png')?>" alt="">
            </a>
            <a href="#">
              <img src="<?php echo _path_tmp_root('uliya-html/images/dribble.png')?>" alt="">
            </a>
            <a href="#">
              <img src="<?php echo _path_tmp_root('uliya-html/images/pinterest.png')?>" alt="">
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info_section -->

  <!-- footer section -->
  <section class="container-fluid footer_section">
    <div class="container">
      <p>
        &copy; <?php echo date('Y')?> All Rights Reserved By <strong><?php echo COMPANY_NAME?></strong></a>
      </p>
    </div>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="<?php echo _path_tmp_root('uliya-html/js/jquery-3.4.1.min.js')?>"></script>
  <script type="text/javascript" src="<?php echo _path_tmp_root('uliya-html/js/bootstrap.js')?>"></script>

</body>

</html>