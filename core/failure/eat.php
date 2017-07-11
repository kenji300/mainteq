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
                <div id="hizmet" class="post">
                
                <h1>Hizmet Bakkerij</h1>
                

                <hr>
                <img src="http://winkelhartoudwoensel.nl/wp-content/uploads/2013/08/Bakkerij-Hizmet.jpg" class="img-responsive">
                <hr>
                <p class="lead">At first Glance it looks like a normal turkish fast food restaurant. </p>
                <p>If you really think that, Ohh boy how wrong you are. This place sells first class bread. But hey, who cares about bread anyway. The truth is that i like how cheap the food is in here and how delicious it is. What's more is that the kapsalon in this place is the tasties kapsalon i ever tasted in my life. And the price is only 5.50 euros, cheap for a big portion of kapsalon. All the foods here is Halal too, and i mean all of them.</p>
       
                <hr>

                </div>
                
                <div id="oriental" class="post">
                
                <h1>Oriental Pizza Shoarma</h1>
                

                <hr>
                <img src="http://www.kebabreporters.com/wp-content/uploads/2013/06/IMG_20130608_115901.jpg" class="img-responsive">
                <hr>
                <p class="lead">Again it looks like normal turkish slash pizzera restaurant.</p>
                <p>And again how wrong you are to think of that. even though it's more expensive than hizmet, the spare ribs here is to die for. even people from another city sometimes just come here to buy the spare ribs from this restaurant. Be careful though, if you want halal food, ask them to make it Halal first.</p>
       
                <hr>

                </div>
                
                <div id="soho" class="post">
                
                <h1>SOHO</h1>
                

                <hr>
                <img src="http://www.capiton-ehv.nl/wp-content/uploads/2011/01/Rest.-Soho-2-Ehv.-213x162.jpg" class="img-responsive">
                <hr>
                <p class="lead">Popular place for take away wok (Asian stir fry dishes with noodles or rice) or sushi,</p>
                <p>but you can also eat in the restaurant. Think fast food place with an Asian touch. A simple stir-fry dish. served in a card board cup is a cheap but quite filling meal. It can get crowded here around lunch or dinner time, but Soho has a second location just opposite the train station where it's often less crowded. All you can eat sushi is €21.50 for dinner. € 6.50.</p>
       
                <hr>

                </div>

            </div>

            <div class="col-md-4">
                <div class="well">
                    <h4>Eating place to go</h4>
                    <p>Well one of the difference between visiting another country and living in one is that you have to buy groceries for your daily needs. There are many stores that you can buy groceries from in Eindhoven</p>
                    <p>Here are the list of stores that you can buy groceries from in eindhoven.</p>
                </div>
                <!-- /well -->
                <div class="well">
                    <h4>List</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-unstyled">
                                <li><a href="#hizmet">Hizmet Bakkerij</a>
                                </li>
                                <li><a href="#oriental">Oriental Pizza Shoarma</a>
                                </li>
                                <li><a href="#soho">SOHO</a>
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