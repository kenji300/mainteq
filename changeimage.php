<?php
    require_once 'core/init.php';

    //Create user object
    $user = new User();

    //Checking if user is logged in
    if(!$user->isLoggedIn()) {
        Redirect::to('index.php');
    }
if(isset($_FILES['image']))
{
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];   
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    $extensions = array("jpeg","jpg","png"); 		
    if(in_array($file_ext,$extensions )=== false){
     $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    if($file_size > 2097152){  
    $errors[]='File size must be exactly 2 MB';
    }				
    if(empty($errors)==true){
        move_uploaded_file($file_tmp,"images/".$file_name);
        echo "Success";
         $user->update(array(
                'image' => $file_name));
         Redirect::to('profile2.php');

       
    }else{
        print_r($errors);
    }
}
    

?>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="image" />
    <input type="submit"/>
</form>
