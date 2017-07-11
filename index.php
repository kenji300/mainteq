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
    $(document).ready(function(){
      $('.bxslider').bxSlider({
        auto: true,
        autoControls: true
      });
    });

    </script>
  
	<!-- <link href="css/style.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="css/style.css" type="text/css" />
  <style>
    .parallax { 
    /* The image used */
    background-image: url("images/mainteq.jpg");

    /* Set a specific height */
    height: 500px; 

    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
   margin-top: 93px;  
  margin-bottom: 70px;
  margin-left: -104.5px;
  margin-right: -104px;
  padding-bottom: 200px;
  padding-right: 200px;
  padding-left: 200px;
  padding-top: 100px;
}
  </style>

    


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      
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

            <div id="tips" class="container"> 
                <!-- tips -->
                <div  class="parallax" align="middle">
                  <div>
                     <ul class="rig columns-3">
                        <li style="background-color: transparent; padding-top: -300px;">
                        <h1 class="text-header"> WE MAKE YOUR PRODUCT BETTER</h1>
                         <a class="btn btn-default" href="index.php#service" role="button" style="background-color: black; color: white; border: transparent;">View Services</a>
                        </li>
                      </ul>
                  </div>
                </div>
                
                <!-- end of tips -->
              
                
                <!-- about -->
                <div id="about" class="about">
                    
                    <div class="deskripsi">


                       
                          <div class="col-md-7">
                              
                              <div class="well2">
                                  <h1>THIS IS WHERE YOU PUT WHAT YOU ARE</h1>
                                  <p>You have to find lodgings if you want to live alone away from your parents, or just moved to another country. This is the tips to find lodgings in eindhoven</p>
                                  <p>There are many sites that can give you lodgings in eindhoven, and the price are varied too. but, remember you must find your lodgings before you move to eindhoven, because if you do, you won't have the problem of searching a lodgings after moving.</p>
                                  <p>Here are the list of sites that can give you lodgings in eindhoven.</p>
                                 
                              </div>

                            </div>
                    </div>

                              <div class="col-md-5">
                                  <div class="well2">
                                       <div id="content-slider">
                                          <div id="slider">  <!-- Slider container -->
                                             <div id="mask">  <!-- Mask -->

                                             <ul>
                                             <li id="first" class="firstanimation">  <!-- ID for tooltip and class for animation -->
                                             <a> <img src="images/1.jpg" alt="med" width="500" height="320" /> </a>
                                             <div class="tooltip"> <h1>first</h1> </div>
                                             </li>

                                             <li id="second" class="secondanimation">
                                             <a> <img src="images/mainteq2.jpg" alt="aliens" width="500" height="320" /> </a>
                                             <div class="tooltip"> <h1>second</h1> </div>
                                             </li>

                                             <li id="third" class="thirdanimation">
                                             <a> <img src="images/mainteq3.jpg" alt="Snowalker" width="500" height="320"/> </a>
                                             <div class="tooltip"> <h1>third</h1> </div>
                                             </li>

                                             <li id="fourth" class="fourthanimation">
                                             <a> <img src="images/2.jpg" alt="Howling"width="500" height="320"/> </a>
                                             <div class="tooltip"> <h1>fourth</h1> </div>
                                             </li>

                                             <li id="fifth" class="fifthanimation">
                                             <a> <img src="images/3.jpg" alt="Sunbathing" width="500" height="320"/> </a>
                                             <div class="tooltip"> <h1>fifth</h1> </div>
                                             </li>
                                             </ul>

                                             </div>  <!-- End Mask -->
                                             <div class="progress-bar"></div>  <!-- Progress Bar -->
                                          </div>  <!-- End Slider Container -->
                                       </div>
                                  </div>
                              </div>
               </div>
               <!--end of about-->
       </div>
				<!-- end of about -->
				
				<!-- hotspots -->
				<div id="service" class="service" align="middle">
            <h1>SERVICES</h1>
				      <ul class="rig columns-3">
              	<li>
              		<img src="images/screen.png" class="img-rounded"/>
              		<h3>Monitor Repair</h3>
              		
              	</li>
              	<li>
              		<img src="images/projector.png" class="img-rounded"/>
              		<h3>Projector Repair</h3>
              		
              	</li>
              	<li>
              		<img src="images/remote-control.png" class="img-rounded"/>
              		<h3>Digital Signage Repair</h3>
              		
              	</li>
              	<li>
              		<img src="images/onsite-repair.png" class="img-rounded"/>
              		<h3>On-Site Repair</h3>
              		
              	</li>
              	<li>
              		<img src="images/event-installation.png" class="img-rounded"/>
              		<h3>Event Installation</h3>
              		
              	</li>
              	<li>
              		<img src="images/tft-repair.png" class="img-rounded"/>
              		<h3>TFT Repair</h3>
              		
              	</li>
              </ul>
				</div>
				<!-- end of hotspots -->

        <!--contact-->

        <div id= "contact" class="footer" align="middle">
          <ul class="rig columns-3">
              <li style="background-color: transparent; padding-top: -300px;">
                  <h2>Contact</h2>
                  <br>
                  <h4>Ekkersrijt 4134, 5692DC,
                  Son, The Netherlands</h4>
                  <h4>T: +31 (0) 499 750 200</h4>
                  <h4>E-mail: Info@mainteq-eu.com​</h4>
              </li>
          </ul>

        </div>

        <!-- The Modal -->
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" 
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  <form class="modal-content animate" action="/action_page.php">
    <div class="header">
      <h1>LOG IN</h1>
    </div>

    <div class="container">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <button type="submit">Login</button>
      <input type="checkbox" checked="checked"> Remember me
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>


          
      
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