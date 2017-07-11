<?php
require_once 'core/init.php';

include('classes/csv.php');
//Create new user object
$user = new User();
$csv = new csv();
$admin_search_results =  false;



if(isset($_POST["submit"]))
{
  
 
  $csv->import($_FILES['file']['tmp_name']);

}

if(isset($_POST['download'])) 
{
  $csv->export();
}

if (isset($_GET['week'])) 
{

  require_once('classes/search.php');
  $search = new search();
  $date_data = $_GET['week'];
  $admin_search_results = $search->adminsearch($date_data);

  
}




?>

<!doctype html>
<html lang="en-US">


<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>User Profile </title>
  <meta name="profile<?php echo escape($user->data()->first_name); ?>" content="sukelu">
  
  
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <link rel="stylesheet" href="css/week-picker-view.css" type="text/css" />
  <script src='http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js'></script>
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="js/week-picker.js"></script>



<style type="text/css">
  input[type=week] {
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
    <h1>Welcome to admin page.</h1><br> 
    <h3>from here, you can look into the status of cases, and also perform some data management</h3><br>

    

      <nav id="profiletabs">
        <ul class="clearfix">
          <li><a href="#cases" class="sel">Cases</a></li>
          <li><a href="#data">Upload Data</a></li>
        </ul>
      </nav>
      
      <section id="cases">
        <form method='get'>
          <input data-weekpicker="weekpicker" readonly=""  data-week_start="1" data-months="1" name="week" id='week_range' />
          <span class="add-on" data-weekpicker="weekpicker" data-target="#week_range">
            <i class="icon-th"></i>
          </span>
          <button type="submit" class="btn btn-default">Search</button><br>
        </form>



     
       <table>
          <tr>
            <th>Date</th>
            <th>Number of submitted cases</th>
          </tr>

          <?php if(!$admin_search_results) { ?>
          <tr>
            <td colspan="2">please select date first</td>
          </tr>
          <?php } else { foreach ($admin_search_results['results'] as $admin_search_result){ ?>

          <tr>
            <td><?php echo date('Y-m-d', strtotime($admin_search_result->{'Date of complaint'}))?></td>
            <td><?php echo $admin_search_result->case_count;?></td>
          </tr> 
         
         <?php } } ?>
          </table>
  

  
    




        <br>
        <form method="post">
         <button class="btn btn-default" type="submit" name="download" role="button" style="background-color: gray; color: white; border: transparent;" value="donwload">Click here to Download the full data</button>
         </form>

      </section>
      
      
      <section id="data" class="hidden">
      <p>You can upload the data from crystal report here.</p>
      <p>please note that it only accepts .csv file</p>
      <form name="import" method="post" enctype="multipart/form-data"> 
      <input type="file" name="file" /><br>

       
      <button type="submit" name="submit" value="import">Upload</button>
      

      </form>  
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

