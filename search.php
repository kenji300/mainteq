<?php
require_once 'core/init.php';
 
//Create new user object
$user = new User();

 if(!$user->isLoggedIn()) {
        Redirect::to('index.php');
        }

$search_term = false;
$search_results = false;

if(isset($_GET['search']))
{


  require_once('classes/search.php');

  $search = new search();

  $search_term = $_GET['search'];


  $search_results = $search->search($search_term);

}



?>

<!doctype html>
<html lang="en-US">


<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>User Profile </title>
  
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <script src='http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js'></script>
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>

<style type="text/css">
  input[type=text] {
    width: 180px;
    height: 32px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;

 
}
 element.style{
padding-left: 0px;
  }

/* When the input field gets focus, change its width to 100% */
input[type=text]:focus {
    width: 400px;
}
</style>
</head>

<body>
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
          
  
  <div class="w">
    <div id="content" class="clearfix">
    <h1>Welcome to the search page.</h1><br> 
    <h3>from here, you can look into the status about the unit that is being repaired</h3><br>

      
      <section id="bio">
      <form action="" method="get">
      <input type="text" name="search" placeholder="Search RMA number or Reference number.">
      <button type="submit" class="btn btn-default">Search</button>
      </form>
       <table>
          <tr>
            <th>Rma number</th>
            <th>Reference number</th>
            <th>Serial number</th>
            <th>Status</th>
            <th>Tracking</th>
          </tr>

          <?php if(!$search_results) {?>
          <tr>
            <td colspan="5"> Please search</td>
          </tr>
          <?php 
          } else { foreach ($search_results['results'] as $search_result) :  ?>
           
          <tr>
            <td><?php echo $search_result->{'RMA No'} ;?> </td>
            <td><?php echo $search_result->cust_ref_no;?> </td>
            <td><?php echo $search_result->{'Original SN'};?> </td>
            <td><?php echo $search_result->{'UID Status'};?> </td>
            <td><a href="http://wwwapps.ups.com/WebTracking/track?track=yes&trackNums={<?php echo $search_result->{'Tracking No'}; ?>}"><?php echo $search_result->{'Tracking No'}; ?></a></td>
          </tr>
          <?php endforeach; }?>


            
        </table>
        
      </section>
      
      
        
        
        
        
      </section>
    </div><!-- @end #content -->
  </div><!-- @end #w -->
<script type="text/javascript">
$(function(){
  $('#profiletabs ul li a').on('click', function(e){
    e.preventDefault();
    var newcontent = $(this).attr('href');
    
    $('#profiletabs ul li a').removeClass('sel');
    $(this).addClass('sel');
    
    $('#content section').each(function(){
      if(!$(this).hasClass('hidden')) { $(this).addClass('hidden'); }
    });
    
    $(newcontent).removeClass('hidden');
  });
});
</script>
</body>

</html>
