<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome!</title>

    <!-- Bootstrap -->
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js'></script>

	<!-- <link href="css/style.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="css/style.css" type="text/css" />

    


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
                      <a class="navbar-brand" href="index.php">HovenPedia</a>
                       <ul class="nav navbar-nav navbar-right tinggi kanan">
                           <li><a href="index.php#about">About</a></li>   
                           <li><a href="index.php">Home</a></li> 
                           <li class="dropdown hover_drop_down">
                               <a href="index.php#tips" >Tips <b class="caret"></b></a>
                               <ul class="dropdown-menu">
                                   <li><a href="food.html">Food</a></li>
                                   <li><a href="lodgings.html">Lodging</a></li>
                                   <li><a href="groceries.html">Groceries</a></li>
                               </ul>
                           </li>
                            <li class="dropdown">
                               <a href="index.php#hotspots">Hot Spots <b class="caret"></b></a>
                               <ul class="dropdown-menu">
                                   <li><a href="sights.html">Sights</a></li>
                                   <li><a href="eat.html">Eat & Drink</a></li>
                               </ul>
                           </li>
                           <li><a href="my Life.html">My Life</a></li>
                           <li><a href="login.php">Log in</a></li>
                           <li><a href="register.php">Register</a></li>

                           
                           
                      </ul>
                  </div>
              </nav>
          </header>
          <!-- end of header -->

            <div id="tips" class="container"> 
                <!-- tips -->
                <div  class="page-header">
                    <h1>Survival Tips in Eindhoven</h1>
                    <p class="lead">There is nobody in the world when moving already knows the place to move to. Unless they already been there. This website will give you tips about surviving in eindhoven.</p>
                </div>
                <div class="tips">
                    <div class="post">
                        <h2>Food</h2>
                        <p>If you want to survive you gotta eat right?  </p>
                        <p><a class="btn btn-default" href="food.html" role="button">More &raquo;</a></p>
                    </div>
                    <div class="post">
                        <h2>Lodging</h2>
                        <p>What's the point of moving if you have nothing to move to? </p>
                        <p><a class="btn btn-default" href="lodgings.html" role="button">More &raquo;</a></p>
                    </div>
                    <div class="post">
                        <h2>Groceries</h2>
                        <p>Well Now you're not a tourist anymore, you gotta do the groceries right? </p>
                        <p><a class="btn btn-default" href="groceries.html" role="button">More &raquo;</a></p>
                    </div>                    
                </div>
                <!-- end of tips -->
                <div id = "video" class="Video" style='width: 560px;height: 315px;margin: auto;'>
                
       <h1><iframe width="560" height="315" src="http://www.youtube.com/embed/Jfvui6IDaIw" frameborder="0" allowfullscreen></iframe></h1> 
                </div>
                
                <!-- about -->
                <div id="about" class="about">

                    
                    <div class="deskripsi">
                        <h1><img src="images/WP_20130605_003.jpg" width= 500 height = 300 class="img-circle"/></h1>
						<h2>I Am Rizky</h2>
                        <h3>A student of Fontys Hogeschool ICT living in Eindhoven</h3>
                    </div>
                            
                </div>
				<!-- end of about -->
				
				<!-- hotspots -->
				<div id="hotspots" class="hotspots">
				<ul class="rig columns-3">
	<li><a href="sights.html#stadium">
		<img src="http://www.psv.nl/upload/80f1b30a-afd8-4ac8-bf7d-18690d316791_PhilipsStadion336-2.jpg" class="img-rounded"/>
		<h3>Philips stadium</h3>
		<p>Football fans, REJOICE!!!!</p>
        </a>
	</li>
	<li>
        <a href="sights.html#Van">
		<img src="images/Van_Abbe_Musseum.jpg" class="img-rounded"/>
		<h3>Van Abbemuseum</h3>
		<p>You like art? go here then.</p>
            </a>
	</li>
	<li><a href="sights.html#evo">
		<img src="images/Evoluon.jpg" class="img-rounded"/>
		<h3>Evoluon</h3>
		<p>Where else could you see a building that look like a UFO</p>
        </a>
	</li>
	<li><a href="eat.html#soho">
		<img src="http://www.capiton-ehv.nl/wp-content/uploads/2011/01/Rest.-Soho-2-Ehv.-213x162.jpg" class="img-rounded"/>
		<h3>Soho</h3>
		<p>Wok and sushi. What's not to like</p>
        </a>
	</li>
	<li><a href="eat.html#oriental">
		<img src="http://www.kebabreporters.com/wp-content/uploads/2013/06/IMG_20130608_115901.jpg"           width="162" height="213" class="img-rounded"/>
		<h3>Oriental pizza and shoarma</h3>
		<p>You haven't really tasted spare ribs if you haven't go to this place. </p>
        </a>
	</li>
	<li><a href="eat.html#hizmet">
		<img src="images/Bakkerij-Hizmet.jpg" class="img-rounded"/>
		<h3>Hizmet</h3>
		<p>The place where turkish food is served fast, good, and cheap.</p>
        </a>
	</li>
</ul>
				</div>
				<!-- end of hotspots -->


            
      
      
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
      <script src="js/modernizr.js"></script>
  </body>
</html>