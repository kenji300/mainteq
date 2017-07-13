<?php
require_once 'core/init.php';

$user = new User();
?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome!</title>

    <!-- Bootstrap -->
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js'></script>
    <script>
      $(document).ready(function () {
        $('.bxslider').bxSlider({
          auto: true,
          autoControls: true
        });
      });
    </script>

    <!-- <link href="css/style.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <style>
      body,
      html {
        height: 100%;
      }

      .parallax {
        /* The image used */
        background-image: url('images/mainteq.jpg');

        /* Full height */
        height: 100%;
        width: 100%;

        /* Create the parallax scrolling effect */
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
      }
      /* Turn off parallax scrolling for tablets and phones. Increase the pixels if needed */

      @media only screen and (max-device-width: 1024px) {
        .parallax {
          background-attachment: scroll;
        }
      }

      .parallax2 {
        /* The image used */
        background-image: url('images/mainteq.jpg');

        /* Full height */
        height: 100%;
        width: 100%;
        min-height: 500px;
        /* Create the parallax scrolling effect */
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
      }
      /* Turn off parallax scrolling for tablets and phones. Increase the pixels if needed */

      @media only screen and (max-device-width: 1024px) {
        .parallax {
          background-attachment: scroll;
        }
      }
    </style>




    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="container-fluid" style="padding: 0;">

    <!-- header start -->
    <header>
      <nav class="navbar navbar-fixed-top" role="navigation">
        <div class="container">
          <a class="navbar-brand" href="index.php#tips">MAINTEQ</a>
          <ul class="nav navbar-nav navbar-right tinggi kanan">
            <li><a href="index.php#tips">Home</a></li>
            <li><a href="index.php#about">About</a></li>
            <li><a href="index.php#service">Services</a></li>
            <li><a href="report.php">File a Complaint</a></li>


            <?php 
                           // if user is not logged in
                           if($user->isLoggedIn()) { ?>
            <li class="dropdown">
              <a href="">Hi <?php echo escape($user->data()->first_name); ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="profile2.php">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
              </ul>

              <?php
                           } else { ?>
                <li class="dropdown">
                  <a href="login.php">Login</a>
                  <ul class="dropdown-menu">
                    <li><a href="register.php">Register</a></li>
                  </ul>
                  <?php } ?>

          </ul>
        </div>
      </nav>
    </header>
    <!-- end of header -->

    <div id="home" class="parallax vertical-center">
      <div class="slider_content_outer" style="position: relative; height: 100%;">
        <div class="slider_content skrollable skrollable-between" style="position: absolute; width: 98%; left: 0%; top: 33%; opacity: 1;"
          data-0=" opacity: 1; width:98%; left:0.0%; top:33%; position: absolute" data-300=" opacity: 0; left:0.0%; top:23%;">
          <div style="text-align: center" class="text all_at_once subtitle_bellow_title no_separator">
            <div>
              <h2 style="    text-shadow: 1px 1px 2px rgba(0,0,0,.4); color: #ffffff;font-size: 64px;line-height: 90px;font-style: normal;font-weight: 600;letter-spacing: -4px;text-transform: none;"><span style="">We make your <span style="color:#0075ff">product</span> better</span>
              </h2>
            </div>
            <div>
              <h4 style="     text-shadow: 1px 1px 2px rgba(0,0,0,.4);color: #ffffff;font-size: 26px;font-style: normal;font-weight: 600"><span>Monitor, Projectors, and large display format? we repair it all.</span></h4>
            </div>
            <p class="q_slide_text"><span></span></p><a class="qbutton" style="" href="#about">Learn more</a></div>
        </div>
      </div>
    </div>
    <div class="container-fluid" style="padding:0;">
      <div class="container">
        <div id="about" style="padding-top: 100px; padding-bottom: 100px" class="row">
          <div class="col-md-6">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active" style="background-image: url(images/1.jpg)  ">
                </div>

                <div class="item" style="background-image: url(images/2.jpg)  ">
                </div>

                <div class="item" style="background-image: url(images/mainteq.jpg)  ">
                </div>

                <div class="item" style="background-image: url(images/mainteq2.jpg)  ">
                </div>
              </div>

              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="sr-only">Previous</span>
               </a>
              <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          <div class="col-md-6">
            <h1>THIS IS WHERE YOU PUT WHAT YOU ARE</h1>
            <br>
            <p>You have to find lodgings if you want to live alone away from your parents, or just moved to another country.
              This is the tips to find lodgings in eindhoven</p>
            <p>There are many sites that can give you lodgings in eindhoven, and the price are varied too. but, remember you
              must find your lodgings before you move to eindhoven, because if you do, you won't have the problem of searching
              a lodgings after moving.</p>
            <p>Here are the list of sites that can give you lodgings in eindhoven.</p>
          </div>
        </div>

      </div>

      <div class="container-fluid" style="background: #f8f8f8; padding-top: 10px; padding-bottom: 80px;">
        <div class="container" id="service">
          <div class="row" class="service" style="margin-top: 50px;">
            <div class="col-md-12 text-center" style="padding-bottom: 50px">
              <h1>Services</h1>
            </div>
            <div class="col-md-4 text-center">
              <img src="images/screen.png" class="img-rounded" />
              <h3>Monitor Repair</h3>
            </div>
            <div class="col-md-4 text-center">
              <img src="images/projector.png" class="img-rounded" />
              <h3>Projector Repair</h3>
            </div>
            <div class="col-md-4 text-center">
              <img src="images/remote-control.png" class="img-rounded" />
              <h3>Digital Signage Repair</h3>
            </div>
          </div>
          <div class="row" class="service" style="margin-top: 50px;">
            <div class="col-md-4 text-center">
              <img src="images/onsite-repair.png" class="img-rounded" />
              <h3>On-Site Repair</h3>
            </div>
            <div class="col-md-4 text-center">
              <img src="images/event-installation.png" class="img-rounded" />
              <h3>Event Installation</h3>
            </div>
            <div class="col-md-4 text-center">
              <img src="images/tft-repair.png" class="img-rounded" />
              <h3>TFT Repair</h3>
            </div>
          </div>
        </div>
      </div>

      <div class="parallax2">
       <div class="slider_content_outer" style="position: relative; height: 100%;">
        <div class="slider_content skrollable skrollable-between" style="position: absolute; width: 98%; left: 0%; top: 33%; opacity: 1;"
          data-0=" opacity: 1; width:98%; left:0.0%; top:33%; position: absolute" data-300=" opacity: 0; left:0.0%; top:23%;">
          <div style="text-align: center; margin-top: 150px" class="text all_at_once subtitle_bellow_title no_separator">
            <div>
              <h2 style="text-shadow: 1px 1px 2px rgba(0,0,0,.4); color: #ffffff;font-size: 64px;line-height: 90px;font-style: normal;font-weight: 600;letter-spacing: -4px;text-transform: none;"><span style="">Want to file <span style="color:#0075ff">complaint</span>?</span>
              </h2>
            </div>

            <p class="q_slide_text"><span></span></p><a class="qbutton" style="" href="report.php">Report Here</a></div>
        </div>
      </div>
      </div>
      <div class="container-fluid" style="background: #f8f8f8; padding-top: 10px; padding-bottom: 80px;">
        <div class="container" id="contact">
          <div class="row" class="service" style="margin-top: 50px;">
            <div class="col-md-12 text-center" style="">
                            <span style="color: #0075ff; font-weight: bold; font-size: 2em;">MainteQ</span><br>
                            Email: <a href="mailto:Info@mainteq-eu.com&#8203;">Info@mainteq-eu.com&#8203;</a>
															<br>
															T: +31 (0) 499 750 200
            </div>
            <div class="col-md-12">

            </div>
          </div>
        </div>
      </div>


    </div>



    <script>
      $(document).ready(function () {
        // Activate Carousel
        $("#myCarousel").carousel();

        // Enable Carousel Indicators
        $(".item1").click(function () {
          $("#myCarousel").carousel(0);
        });
        $(".item2").click(function () {
          $("#myCarousel").carousel(1);
        });
        $(".item3").click(function () {
          $("#myCarousel").carousel(2);
        });
        $(".item4").click(function () {
          $("#myCarousel").carousel(3);
        });

        // Enable Carousel Controls
        $(".left").click(function () {
          $("#myCarousel").carousel("prev");
        });
        $(".right").click(function () {
          $("#myCarousel").carousel("next");
        });
      });
    </script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/jquery.bxslider.js"></script>
    <script src="js/jquery.bxslider.min.js"></script>

  </body>

  </html>