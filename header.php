<!DOCTYPE html>
<html lang="zxx">
   <head>
      <!-- meta tag -->
      <meta charset="utf-8">
      <title>IDeveloping Solutions</title>
      <meta name="description" content="">
      <!-- responsive tag -->
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
      <meta http-equiv="Pragma" content="no-cache" />
      <meta http-equiv="Expires" content="0" />
      <!-- favicon -->
      <link rel="apple-touch-icon" href="apple-touch-icon.html">
      <link rel="shortcut icon" type="image/x-icon" href="assets/images/fav.png">
      <!-- Bootstrap v4.4.1 css -->
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
      <!-- font-awesome css -->
      <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
      <!-- flaticon css -->
      <link rel="stylesheet" type="text/css" href="assets/fonts/flaticon.css">
      <!-- animate css -->
      <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
      <!-- owl.carousel css -->
      <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css">
      <!-- slick css -->
      <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
      <!-- off canvas css -->
      <link rel="stylesheet" type="text/css" href="assets/css/off-canvas.css">
      <!-- magnific popup css -->
      <link rel="stylesheet" type="text/css" href="assets/css/magnific-popup.css">
      <!-- Main Menu css -->
      <link rel="stylesheet" href="assets/css/rsmenu-main.css">
      <!-- spacing css -->
      <link rel="stylesheet" type="text/css" href="assets/css/rs-spacing.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="assets/css/custom-style.css">
      <link rel="stylesheet" type="text/css" href="assets/css/style.css">
     
      <!-- responsive css -->
      <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
      <link rel="stylesheet" type="text/css" href="assets/css/star.css">
      <!--[if lt IE 9]>
      <![endif]-->
   </head>
   <body class="defult-home">
      <!--Preloader area start here-->
      <div id="loader" class="loader">
         <div class="loader-container"></div>
      </div>
      <!--Preloader area End here-->
      <!-- Main content Start -->
      <div class="main-content">
      <!--Full width header Start-->
      <div class="full-width-header">
         <!--Header Start-->
         <header id="rs-header" class="rs-header style2">
            <!-- Topbar Area Start -->
            <div class="topbar-area style2">
               <div class="container">
                  <div class="row y-middle">
                     <div class="col-lg-8">
                        <ul class="topbar-contact">
                           <li>
                              <i class="flaticon-email"></i>
                              <a href="mailto:contact@idevelopingsolutions.com">contact@idevelopingsolutions.com</a>
                           </li>
                           <li>
                              <i class="flaticon-call"></i>
                              <a href="tel:+91-186-3590033"> +91-186-3590033</a>
                           </li>
                        </ul>
                     </div>
                     <div class="col-lg-4 text-right">
                        <div class="toolbar-sl-share">
                           <ul>
                              <li class="opening"> <em><i class="flaticon-clock"></i> 09:00am-6:00pm</em> </li>
                              <li><a href="https://www.facebook.com/IDevelopingSolutions/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                              <li><a href="https://www.instagram.com/ideveloping2020/?igshid=ZDdkNTZiNTM%3D" target="_blank"><i class="fa fa-instagram"></i></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Topbar Area End -->
            <!-- Menu Start -->
            <div class="menu-area menu-sticky">
               <div class="container">
                  <div class="row align-items-center">
                     <div class="col-lg-2">
                        <div class="logo-part">
                           <a href="index.php"><img src="assets/images/home/logo-dark.png" alt=""></a>
                        </div>
                        <div class="mobile-menu">
                           <a href="#" class="rs-menu-toggle rs-menu-toggle-close secondary">
                           <i class="fa fa-bars"></i>
                           </a>
                        </div>
                     </div>
                     <div class="col-lg-10 text-right">
                        <div class="rs-menu-area">
                           <div class="main-menu">
                              <nav class="rs-menu pr-20 md-pr-0">
                                 <ul class="nav-menu">
                                    <li>
                                       <a href="index.php" >Home</a>
                                    </li>
                                    <li class=""> 
                                    <!-- menu-item-has-children -->
                                       <a href="about.php">About</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                       <a href="services.php">Services</a>
                                       <ul class="sub-menu">
                                          <li><a href="software-development.php">Software Development</a> </li>
                                          <li><a href="web-development.php">Web Development</a> </li>
                                          <li><a href="app-development.php">App Development</a> </li>
                                          <li><a href="ecommerce.php">Ecommerce</a></li>
                                       </ul>
                                    </li>
                                    <li>
                                       <a href="portfolio.php">Our portfolio</a>
                                    </li>
                                    <li>
                                       <a href="contact.php">Contact Us</a>
                                    </li>
                                 </ul>
                                 <!-- //.nav-menu -->
                              </nav>
                           </div>
                           <!-- //.main-menu -->
                           <div class="expand-btn-inner search-icon hidden-md">
                              <ul>
                                 <li><a class="quote-btn" href="contact.php" onclick="showModel();">Get A Quote</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Menu End -->
         </header>
         <!--Header End-->
      </div>
      <div class="snow-container"></div>
      <style>
         .snow-container {
         position: fixed;
         top: 0;
         left: 0;
         overflow: hidden;
         width: 100vw;
         height: 100vh;
         z-index: 99999;
         pointer-events: none;
      }

.snowflake {
    position: absolute;
    background-color: white;
    border-radius: 50%;
    opacity: 0.8;
    pointer-events: none;
}

@keyframes fall {
    0% {
        opacity: 0;
        transform: translateY(0);
    }
    10% {
        opacity: 1;
    }
    100% {
        opacity: 0.5;
        transform: translateY(100vh);
    }
}

@keyframes diagonal-fall {
    0% {
        opacity: 0;
        transform: translate(0, 0);
    }
    10% {
        opacity: 1;
    }
    100% {
        opacity: 0.25;
        transform: translate(10vw, 100vh);
    }
}
      </style>

      <script>
         document.addEventListener("DOMContentLoaded", function () {
    const snowContainer = document.querySelector(".snow-container");

    const particlesPerThousandPixels = 0.1;
    const fallSpeed = 1.25;
    const pauseWhenNotActive = true;
    const maxSnowflakes = 200;
    const snowflakes = [];

    let snowflakeInterval;
    let isTabActive = true;

    function resetSnowflake(snowflake) {
        const size = Math.random() * 10 + 1;
        const viewportWidth = window.innerWidth - size; // Adjust for snowflake size
        const viewportHeight = window.innerHeight;

        snowflake.style.width = `${size}px`;
        snowflake.style.height = `${size}px`;
        snowflake.style.left = `${Math.random() * viewportWidth}px`; // Constrain within viewport width
        snowflake.style.top = `-${size}px`;

        const animationDuration = (Math.random() * 3 + 2) / fallSpeed;
        snowflake.style.animationDuration = `${animationDuration}s`;
        snowflake.style.animationTimingFunction = "linear";
        snowflake.style.animationName =
            Math.random() < 0.5 ? "fall" : "diagonal-fall";

        setTimeout(() => {
            if (parseInt(snowflake.style.top, 10) < viewportHeight) {
                resetSnowflake(snowflake);
            } else {
                snowflake.remove(); // Remove when it goes off the bottom edge
            }
        }, animationDuration * 1000);
    }

    function createSnowflake() {
        if (snowflakes.length < maxSnowflakes) {
            const snowflake = document.createElement("div");
            snowflake.classList.add("snowflake");
            snowflakes.push(snowflake);
            snowContainer.appendChild(snowflake);
            resetSnowflake(snowflake);
        }
    }

    function generateSnowflakes() {
        const numberOfParticles =
            Math.ceil((window.innerWidth * window.innerHeight) / 1000) *
            particlesPerThousandPixels;
        const interval = 5000 / numberOfParticles;

        clearInterval(snowflakeInterval);
        snowflakeInterval = setInterval(() => {
            if (isTabActive && snowflakes.length < maxSnowflakes) {
                requestAnimationFrame(createSnowflake);
            }
        }, interval);
    }

    function handleVisibilityChange() {
        if (!pauseWhenNotActive) return;

        isTabActive = !document.hidden;
        if (isTabActive) {
            generateSnowflakes();
        } else {
            clearInterval(snowflakeInterval);
        }
    }

    generateSnowflakes();

    window.addEventListener("resize", () => {
        clearInterval(snowflakeInterval);
        setTimeout(generateSnowflakes, 1000);
    });

    document.addEventListener("visibilitychange", handleVisibilityChange);
});

      </script>