<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--
    - primary meta tag
  -->
  <title>IQube Tutor</title>
  <meta name="title" content="EduWeb - The Best Program to Enroll for Exchange">
  <meta name="description" content="This is an education html template made by codewithsadee">
  <!--
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="<?php echo URLROOT?>/assets/css/Landing.css">
  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700;800&family=Poppins:wght@400;500&display=swap"
    rel="stylesheet">
  <!--
    - preload images
  -->
  <link rel="preload" as="image" href="./assets/images/hero-bg.svg">
  <link rel="preload" as="image" href="./assets/images/hero-banner-1.jpg">
  <link rel="preload" as="image" href="./assets/images/hero-banner-2.jpg">
  <link rel="preload" as="image" href="./assets/images/hero-shape-1.svg">
  <link rel="preload" as="image" href="./assets/images/hero-shape-2.png">
</head>
<body id="top">
  <!--
    - #HEADER
  -->
  <header class="header" data-header>
    <div class="container">
      <a href="#" class="logo">
        <img src="<?php echo URLROOT?>/assets/img/iqube.png" width="50" height="50" alt="EduWeb logo">
      </a>
      <nav class="navbar" data-navbar>
        <div class="wrapper">
          <a href="#" class="logo">
            <img src="<?php echo URLROOT?>/assets/img/iqube.png" width="162" height="50" alt="EduWeb logo">
          </a>
          <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
            <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
          </button>
        </div>
        <ul class="navbar-list">
          <li class="navbar-item">
            <a href="<?php echo URLROOT;?>" class="navbar-link" data-nav-link>Home</a>
          </li>
          <li class="navbar-item">
            <a href="#about" class="navbar-link" data-nav-link>About</a>
          </li>
          <li class="navbar-item">
            <a href="#courses" class="navbar-link" data-nav-link>Study Materials</a>
          </li>
          <li class="navbar-item">
            <a href="<?php echo URLROOT;?>/Landing/be_an_IQube_tutor" class="navbar-link" data-nav-link>IQube Tutor</a>
          </li>
          <li class="navbar-item">
            <a href="#" class="navbar-link" data-nav-link>Contact</a>
          </li>
        </ul>
      </nav>
      <div class="header-actions">
        <button class="header-action-btn" aria-label="toggle search" title="Search">
          <ion-icon name="search-outline" aria-hidden="true"></ion-icon>
        </button>
<?php if(!Auth::is_logged_in()){?>
        <a href="<?php echo URLROOT?>/Landing/Login_as_a_tutor" class="btn has-before">
          <span class="span">Tutor Login </span>
          <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
        </a>
        <?php }?>
        <?php if(Auth::is_logged_in()&& Auth::is_tutor()){?>
        <a href="<?php echo URLROOT?>/tutor" class="btn has-before">
          <span class="span">Back to dashboard</span>
          <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
        </a>
        <?php }?>
        <button class="header-action-btn" aria-label="open menu" data-nav-toggler>
          <ion-icon name="menu-outline" aria-hidden="true"></ion-icon>
        </button>
      </div>
      <div class="overlay" data-nav-toggler data-overlay></div>
    </div>
  </header>
  <main>
    <article>
      <!--
        - #HERO
      -->
      <section class="section hero has-bg-image" id="home" aria-label="home"
        style="background-image: url('./assets/images/hero-bg.svg')">
        <div class="container">
          <div class="hero-content">
            <h1 class="h1 section-title">
            Join IQube as a <span class="span">Tutor</span>
            </h1>
            <p class="hero-text">
Doesn't have an account?
            <a href="#" class="btn has-before">
              <span class="span">Signup today</span>
              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </a>
          </div>
          <figure class="hero-banner">
            <div class="img-holder one" style="--width: 270; --height: 300;">
              <img src="<?php echo URLROOT?>/assets/img/iqube.png" width="270" height="300" alt="hero banner" class="img-cover">
            </div>
          </figure>
        </div>
      </section>
      <!--
        - #CATEGORY
      -->
    <div class="footer-bottom">
      <div class="container">
        <p class="copyright">
          Copyright 2022 All Rights Reserved by <a href="#" class="copyright-link">codewithsadee</a>
        </p>
      </div>
    </div>
  </footer>
  <!--
    - #BACK TO TOP
  -->
  <a href="#top" class="back-top-btn" aria-label="back top top" data-back-top-btn>
    <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
  </a>
  <!--
    - custom js link
  -->
  <script src="./assets/js/script.js" defer></script>
  <!--
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>