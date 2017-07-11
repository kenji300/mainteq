<?php


//This function will display the registration form



$date = date('D, M, Y');



//This function will register users data

function register(){


//Connecting to database

$connect = mysql_connect("localhost", "kenji300", "terjamin");

if(!$connect){

die(mysql_error());

}


//Selecting database

$select_db = mysql_select_db("ita2dummy", $connect);

if(!$select_db){

die(mysql_error());

}


//Collecting info

$username = $_REQUEST['username'];

$password = $_REQUEST['password'];

$name = $_REQUEST['name'];

$email = $_REQUEST['email'];

$date = $_REQUEST['date'];


//Here we will check do we have all inputs filled


if(empty($username)){

die("Please enter your username!<br>");

}


if(empty($password)){

die("Please enter your password!<br>");

}

if(empty($name)){

	die("you have a name don't you?");
}


if(empty($email)){

die("Please enter your email!");

}


//Let's check if this username is already in use


$user_check = mysql_query("SELECT username FROM users WHERE username='$username'");

$do_user_check = mysql_num_rows($user_check);


//Now if email is already in use


$email_check = mysql_query("SELECT email FROM users WHERE email='$email'");

$do_email_check = mysql_num_rows($email_check);


//Now display errors


if($do_user_check > 0){

die("Username is already in use!<br>");

}


if($do_email_check > 0){

die("Email is already in use!");

}



//If everything is okay let's register this user


$insert = mysql_query("INSERT INTO users (username, password, name, email) VALUES ('$username', '$password', '$name', '$email')");

if(!$insert){

die("There's little problem: ".mysql_error());

}


echo $username.", you are now registered. Thank you!<br><a href=login.php>Login</a> | <a href=index.php>Index</a>";


}


switch($act){


default;




case "register";

register();

break;


}


?> 
<form action='?act=register' method='post'>

<p>Username: <input type='text' name='username' size='30'><br></p>

<p>Password: <input type='password' name='password' size='30'><br></p>

<p>Name: <input type='text' name='name' size='30'><br></p>

<p>Email: <input type='text' name='email' size='30'><br>

<input type='hidden' name='date' value='$date'>

<input type='submit' value='Register'>

</form>

