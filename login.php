<?php 
    require_once 'core/init.php';
    $user = new User();


    if(Input::exists()) {
        
            $validate = new Validate();
            $validation = $validate->check($_POST, array(
                'username' => array('required' => true),
                'password' => array('requred' => true)
            ));
            
            if($validation->passed()){
                $user = new User();
                
                $remember = (Input::get('remember') === 'on') ? true : false;
                $login = $user->login(Input::get('username'), Input::get('password'));
                
                if($login){

                    Session::flash('');
                    Redirect::to('index.php');

                } else {
                    echo 'Logging in failed';
                }
            } else {
                foreach($validation->errors() as $error){
                    echo $error, '<br>';
                }
            }
            
    
    }
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
  *
{
margin:0px;
padding:0px;
}
  
body{
background:#67809F;
position:relative;
padding:20px;
font-family:verdana;
} 
                                
#loginform
{
width:550px;
height:auto;
position:relative;
margin:0 auto;
}

input
{
display:block;

border-radius:5px;
background: #333333;
width:85%;
padding:12px 20px 12px 10px;
border:none;
color:#929999;                       
box-shadow:inset 0px 1px 5px #272727;
font-size:0.8em;
-webkit-transition:0.5s ease;
-moz-transition:0.5s ease;
-o-transition:0.5s ease;
-ms-transition:0.5s ease;
transition:0.5s ease; 
}

input:focus
{
-webkit-transition:0.5s ease;
-moz-transition:0.5s ease;
-o-transition:0.5s ease;
-ms-transition:0.5s ease;
transition:0.5s ease;  
box-shadow: 0px 0px 5px 1px #161718;
}

button
{
background: #ff5f32;
border-radius:50%;
border:10px solid #222526;
font-size:0.9em;
color:#fff;
font-weight:bold;
cursor:pointer;
width:85px;
height:85px;
position:absolute;
right: -42px;
top: 54px;
text-align:center;
-webkit-transition:0.5s ease;
-moz-transition:0.5s ease;
-o-transition:0.5s ease;
-ms-transition:0.5s ease;
transition:0.5s ease;
}

button:hover
{
background:#222526;
border-color:#ff5f32;
-webkit-transition:0.5s ease;
-moz-transition:0.5s ease;
-o-transition:0.5s ease;
-ms-transition:0.5s ease;
transition:0.5s ease;
}

button i
{
font-size:20px;
-webkit-transition:0.5s ease;
-moz-transition:0.5s ease;
-o-transition:0.5s ease;
-ms-transition:0.5s ease;
transition:0.5s ease;
}

button:hover i
{
color:#ff5f32;
-webkit-transition:0.5s ease;
-moz-transition:0.5s ease;
-o-transition:0.5s ease;
-ms-transition:0.5s ease;
transition:0.5s ease;
}
  
*:focus{outline:none;}
::-webkit-input-placeholder {
color:#929999;
}

:-moz-placeholder { /* Firefox 18- */
color:#929999; 
}

::-moz-placeholder {  /* Firefox 19+ */
color:#929999;  
}

:-ms-input-placeholder {  
color:#929999; 
}

h1
{
text-align:center;
color:#fff;
font-size:13px;
padding:12px 0px;
}

#note
{
color:#88887a;
font-size: 0.8em;
text-align:left;
padding-left:5px;
}


a
{
color:#88887a;
text-decoration:none;
-webkit-transition:0.5s ease;
-moz-transition:0.5s ease;
-o-transition:0.5s ease;
-ms-transition:0.5s ease;
transition:0.5s ease;
}

a:hover
{
color:#fff;
margin-left:5px;
-webkit-transition:0.5s ease;
-moz-transition:0.5s ease;
-o-transition:0.5s ease;
-ms-transition:0.5s ease;
transition:0.5s ease;
}

#mainlogin
{
top: 150px;
width:250px;
height:170px;
padding:0px 12px;
position:relative;
background:#6BB9F0;
border-radius:3px;
margin: 0 auto;
}

#connect
{
font-weight: bold;
color: #fff;
font-size: 13px;
text-align: left;
font-family: verdana;
padding-top:10px;
}

#or
{
position:absolute;
left: -25px;
top: 10px;
background:#222222;
text-shadow:0 2px 0px #121212;
color:#999999;
width:40px;
height:40px;
text-align:center;
border-radius:50%;
font-weight:bold;
line-height:38px;
font-size: 13px;
}

</style>
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
                              <a href="">Hi <?php echo escape($user->data()->name); ?> <b class="caret"></b></a> 
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
 <div id="tips" class="container"> 
  <!-- tips -->
  <div id="mainlogin" >

  <h1>Log in </h1>
  <form action="" method="post">
  <input type="text" name="username" id="username" placeholder="username or email" value="" class="login">
  <input type="password" name="password" id="password" placeholder="password" value="">
  <button type="submit">Login</button>
  </form>
  <div id="note"><a href="register.php">Not a member yet? Register now<a/></div>
  </div>
</div>
</body>