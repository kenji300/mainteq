<?php
require_once 'core/init.php';

$complaint = new Complaint();
$user = new User();

include 'classes/upload_image.php'; 
$upload_image = new uploadimage();

if(Input::exists()) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
          
            'Brand' => array(
                'required' => true,
                
            ),
            'First_Name' => array(
                'required' => true,
                
            ),
            'Last_Name' => array(
                'required' => true,
               
            ),
            'Email' => array(
               'reuired' => true
            ),
            'Address_line_1' => array(
                'required' => true,
                
            ),
            'City' => array(
                'required' => true,
               
            ),
            'Postal_code' => array(
                'required' => true,
                
            ),
            'Country' => array(
                'required' => true,
                
            ),
            'Purchase_Date' => array(
                'required' => true,
                
            ),
            'Serial_numbers' => array(
                'required' => true,
              
            ),
            'Model_Name' => array(
                'required' => true,
               
            ),
           
            'Complaint_Details' => array(
                'required' => true,
            
            )
        ));

    if($validation->passed()){
      
       
      
       
       try{
           $complaint->create(array(


           	   'cust id' => Input::get('cust id'),
           	   'Reference Number' => Input::get('Reference_Number'),
               'Date of complaint' => date('Y-m-d'),
               'Brand' => Input::get('Brand'), 
               'First Name' => Input::get('First_Name'),
               'Last Name' => Input::get('Last_Name'),
               'Email' => Input::get('Email'),
               'Address line 1' => Input::get('Address_line_1'),
               'Address line 2' => Input::get('Address_line_2'),
               'City' => Input::get('City'),
               'Region' => Input::get('Region'),
               'Postal code' => Input::get('Postal_code'),
               'Country' => Input::get('Country'),
               'Purchase Date' => Input::get('Purchase_Date'),
               'Serial numbers' => Input::get('Serial_numbers'),
               'Model Name' => Input::get('Model_Name'),
               'Incident Address line 1' => Input::get('Incident_Address_line_1'),
               'Incident City' => Input::get('Incident_City'),
               'Incident Region' => Input::get('Incident_Region'),
               'Incident Postal Code' => Input::get('Incident_Postal_Code'),
               'Incident Country' => Input::get('Incident_Country'),
               'Complaint Details' => Input::get('Complaint_Details'),
           ));
           $caseID = $complaint->get_last_id();
           echo $caseID;


           if(isset($_FILES['files']))
            {
               $filename = $_FILES['files'];
               $serialnumber = $_POST['Serial_numbers'];

               $upload = $upload_image->upload($filename, $serialnumber, $caseID);
            }

          
           

           

          if (isset($_POST['Email'])) 
            {
              $email_adress = $_POST['Email'];
              $email = $complaint->phpmailer($email_adress);
            }



           Session::flash('home', 'product have been registered, and will be redirected!');
           Redirect::to('index.php');
           
       } catch(Exception $e) {
           die($e->getMessage());
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
    
	<!-- <link href="css/style.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="css/style.css" type="text/css" />

	   <!--[endif]-->
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

          <div id="report" class="page-header2">
          	<form action="" method="post" enctype="multipart/form-data">
          	
          	<span>Brand: </span>
          	<select id="Brand" name="Brand" method="post">
          	<option>AOC</option>
          	<option>Iiyama</option>
          	<option>Philips</option>
          	<option>Sharp</option>
          	</select><br>

          	<span>Product type: </span>
          	<select id="Brand" name="Brand" method="post">
          	<option>LCD Monitor</option>
          	<option>Projector</option>
          	<option>Digital Signage</option>
          	
          	</select><br>

          	<label>Name :</label>
          	<input type="text" name="First_Name" id=" First Name" placeholder=" First name" value="<?php echo escape($user->data()->first_name); ?> ">
          	<input type="text" name="Last_Name" id=" Last Name" placeholder=" Last name" value="<?php echo escape($user->data()->last_name); ?> ">
          	<br>

          	<label>E-mail :</label>
          	<input type="text" name="Email" id="Email" placeholder="Email" value="<?php echo escape($user->data()->email); ?> "><br>

          	<label>Address :</label>
          	<input type="text" name="Address_line 1" id="Address line 1" placeholder="address" value="<?php echo escape($user->data()->address_line_1); ?> "><br>
          	<input type="text" name="Address_line 2" id="Address line 2" placeholder="address 2" value="<?php echo escape($user->data()->address_line_2); ?> "><br>
          	<input type="text" name="City" id="City" placeholder="City" value="<?php echo escape($user->data()->city); ?> ">
          	<input type="text" name="Region" id="Region" placeholder="Region" value="<?php echo escape($user->data()->region); ?> "><br>
          	<input type="text" name="Postal_code" id="Postal code" placeholder="postal/zip code" value="<?php echo escape($user->data()->zip_code); ?> "><br>

          	<span>Country:</span>
          	<select id="Country" name="Country" method='post'>
      			  <option>Netherlands</option>
      			  <option>Belgium</option>
      			  <option>Luxemburg</option> 
      			  <option>Germany</option>
      			  <option>Bulgaria</option>
      			  <option>Cyprus</option>
      			  <option>Denmark</option>
      			  <option>Estonia</option>
      			  <option>Spain</option>
      			  <option>Finland</option>
      			  <option>France</option>
      			  <option>Greece</option>

			     </select><br>

      			<label>Purchase Date :</label>
      			<input type="date" name="Purchase_Date" id="Purchase Date" placeholder="purchase date" value=""><br>

      			<label>Serial Number :</label>
          	<input type="text" name="Serial_numbers" id="Serial numbers" placeholder="serial number" value=""><br>

          	<label>Model Name :</label>
          	<input type="text" name="Model_Name" id="Model Name" placeholder="model name" value=""><br>
          	
          	<label>Incident Address :</label>
          	<input type="text" name="Incident_Address_line_1" id="Incident Address line 1" placeholder="address" value=""><br>
          	<input type="text" name="Incident_Address_line_2" id="Incident Address line 2" placeholder="address 2" value=""><br>
          	<input type="text" name="Incident_City" id="Incident City" placeholder="City" value="">
          	<input type="text" name="Incident_Region" id="Incident Region" placeholder="Region" value=""><br>
          	<input type="text" name="Incident_Postal_Code" id="Incident Postal Code" placeholder="postal/zip code" value=""><br>

          	<span>Incident Country:</span>
          	<select id="Incident_Country" method="post">
      			  <option>Netherlands</option>
      			  <option>Belgium</option>
      			  <option>Luxemburg</option> 
      			  <option>Germany</option>
      			  <option>Bulgaria</option>
      			  <option>Cyprus</option>
      			  <option>Denmark</option>
      			  <option>Estonia</option>
      			  <option>Spain</option>
      			  <option>Finland</option>
      			  <option>France</option>
      			  <option>Greece</option>

			     </select><br>

    			<textarea name="Complaint_Details" rows="5" cols="40" placeholder="Complaint Details" id="Complaint Details"></textarea><br>
    			<label>Upload Photo:</label>
    			<input type="file" name="files[]" multiple="multiple" /><br>
          

    			 
    			 <button type="submit" name="btnSubmit">Submit form</button>

        </form>
      </div>
