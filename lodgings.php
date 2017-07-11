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
    <title>Welcome</title>

    <!-- Styles -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

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
                                   <li><a href="food.php">Food</a></li>
                                   <li><a href="lodgings.php">Lodging</a></li>
                                   <li><a href="groceries.php">Groceries</a></li>
                               </ul>
                           </li>
                            <li class="dropdown">
                               <a href="index.php#hotspots">Hot Spots <b class="caret"></b></a>
                               <ul class="dropdown-menu">
                                   <li><a href="sights.php">Sights</a></li>
                                   <li><a href="eat.php">Eat & Drink</a></li>
                               </ul>
                           </li>
                           <li><a href="mylife.php">My Life</a></li>

                           <?php 
                           // if user is not logged in
                           if($user->isLoggedIn()) { ?>
                           <li class="dropdown">
                              <a href="">Hi <?php echo escape($user->data()->name); ?> <b class="caret"></b></a> 
                              <ul class="dropdown-menu">
                                <li><a href="profile2.php">Profile</a></li>
                                <li><a href="logout.php">Logout</a></li>
                              </ul>
                           
                           <?php
                           } else { ?> 
                           <li><a href="login.php">Log in</a></li>
                           <li><a href="register.php">Register</a></li>
                           <?php } ?>

                      </ul>
                  </div>
              </nav>
          </header>
    <!-- end of header -->
<div class="container">

        <div class="row">
            <div class="col-md-8">
                <div id="vest" class="post">
                
                <h1>Vestide</h1>
                

                <hr>
                <img src="https://www.vestide.nl/Vestide/img/Site/intro_logo.gif" class="img-responsive">
                <hr>
                
                <p>This housing is one of the two housings that first years will be staying at. it is popular because the cheap rent and that the electricity, water, and gas is already included in the rent. the place is good. i can say this because i live there at the moment. The place is near two campus, that is fontys and Tu/e, it is also near the centrum. the bad side is that all of the place is located in the ghetto, so you can expect people high from weed, and getting your bike stolen if you're not careful enough</p>
       
                <hr>

                </div>
                
                <div id="friend" class="post">
                
                <h1>Friendly Housing</h1>
                

                <hr>
                <img src="http://friendlyhousing.nl/images/logo.png" class="img-responsive">
                <hr>
                
                <p>the other on of the two that first years will be staying at, besides vestide that is. it is a lot more expensive than vestide's rent. But, Because of that, the place is also better than vestide's. it's not located in the ghetto too, so you can rest easy, but remember to always lock your bike. The rent, depends on your contract, included electricity, water, and gas to your rent. the downside is that sometimes the place is far from the centrum and the campus of Tu/e and fontys.</p>
       
                <hr>

                </div>
                


            </div>

            <div class="col-md-4">
                <div class="well">
                    <h4>Lodgings</h4>
                    <p>You have to find lodgings if you want to live alone away from your parents, or just moved to another country. This is the tips to find lodgings in eindhoven</p>
                    <p>There are many sites that can give you lodgings in eindhoven, and the price are varied too. but, remember you must find your lodgings before you move to eindhoven, because if you do, you won't have the problem of searching a lodgings after moving.</p>
                    <p>Here are the list of sites that can give you lodgings in eindhoven.</p>
                   
                </div>
                <!-- /well -->
                <div class="well">
                    <h4>List</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-unstyled">
                                <li><a href="#vest">Vestide</a>
                                </li>
                                <li><a href="#friend">Friendly Housing</a>
                                </li>
                                
                                
                            </ul>
                        </div>
                        
                    </div>
                </div>
                <!-- /well -->
                
            </div>
        </div>


   

    </div>
    <!-- /.container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/modernizr.js"></script>
</body>

</html>