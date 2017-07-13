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
                <legend>Choose Type</legend>
                <div class="form-group ">
                    <label class="control-label " for="Brand">
       Brand
      </label>
                    <select class="select form-control" id="Brand" name="Brand">
       <option value="AOC">
        AOC
       </option>
       <option value="Iiyama">
        Iiyama
       </option>
       <option value="Philips">
        Philips
       </option>
       <option value="Sharp">
        Sharp
       </option>
      </select>
                </div>
                <div class="form-group ">
                    <label class="control-label " for="Product_type">
       Product type
      </label>
                    <select class="select form-control" id="Product_type" name="Product_type">
       <option value="LCD Monitor">
        LCD Monitor
       </option>
       <option value="Projector">
        Projector
       </option>
       <option value="Digital Signage">
        Digital Signage
       </option>
      </select>
                </div>
                <br><br>
                <legend>Product Details</legend>
                <div class="form-group ">
                    <label class="control-label " for="Serial_numbers">
       Serial Number
      </label>
                    <input class="form-control" id="Serial_numbers" name="Serial_numbers" placeholder="Product serial number" type="text" />
                </div>
                <div class="form-group ">
                    <label class="control-label " for="Model_Name">
       Model Name
      </label>
                    <input class="form-control" id="Model_Name" name="Model_Name" placeholder="Product Model" type="text" />
                </div>
                <div class="form-group ">
                    <label class="control-label " for="Purchase_Date">
       Purchase Date
      </label>
                    <input class="form-control" type="date" id="Purchase_Date" name="Purchase_Date" placeholder="MM/DD/YYYY" type="text" />
                </div>
                <div class="form-group ">
                    <label class="control-label " for="Complaint_Details">
       Complain Details
      </label>
                    <textarea class="form-control" cols="40" id="Complaint_Details" name="Complaint_Details" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Upload Photo</label>
                    <input type="file" name="files[]" multiple="multiple" />
                    <p class="help-block">Max 3 Files.</p>
                </div>
                <br><br>
                <legend>Your Details</legend>
                <div class="form-group ">
                    <label class="control-label " for="First_Name">
       First Name
      </label>
                    <input class="form-control" id="First_Name" name="First_Name" placeholder="Your first name" type="text" />
                </div>
                <div class="form-group ">
                    <label class="control-label " for="Last_Name">
       Last Name
      </label>
                    <input class="form-control" id="Last_Name" name="Last_Name" placeholder="Your last name" type="text" />
                </div>
                <div class="form-group ">
                    <label class="control-label requiredField" for="Email">
       Email
       <span class="asteriskField">
        *
       </span>
      </label>
                    <input class="form-control" id="Email" name="Email" placeholder="Your email address" type="text" />
                </div>
                <br><br>
                <legend>Pickup Address</legend>
                <div class="form-group ">
                    <label class="control-label " for="Address_line_1">
       Address line 1
      </label>
                    <input class="form-control" id="Address_line_1" name="Address_line_1" type="text" />
                </div>
                <div class="form-group ">
                    <label class="control-label " for="Address_line_2">
       Incident Address Line 2
      </label>
                    <input class="form-control" id="Address_line_2" name="Address_line_2" type="text" />
                </div>
                <div class="form-group ">
                    <label class="control-label " for="name4">
       City
      </label>
                    <input class="form-control" id="name4" name="City" type="text" />
                </div>
                <div class="form-group ">
                    <label class="control-label " for="Region">
       Region
      </label>
                    <input class="form-control" id="Region" name="Region" type="text" />
                </div>
                <div class="form-group ">
                    <label class="control-label " for="Postal_code">
       Postal Code
      </label>
                    <input class="form-control" id="Postal_code" name="Postal_code" type="text" />
                </div>
                <div class="form-group ">
                    <label class="control-label " for="Country">
       Country
      </label>
                    <select class="select form-control" id="Country" name="Country">
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
      </select>
                </div>
                <br><br>
                <legend>Shipment Address</legend>
                <div class="form-group ">
                    <label class="control-label " for="Incident_Address_line_1">
       Address line 1
      </label>
                    <input class="form-control" id="Incident_Address_line_1" name="Incident_Address_line_1" type="text" />
                </div>
                <div class="form-group ">
                    <label class="control-label " for="Incident_Address_line_2">
       Incident Address Line 2
      </label>
                    <input class="form-control" id="Incident_Address_line_2" name="Incident_Address_line_2" type="text" />
                </div>
                <div class="form-group ">
                    <label class="control-label " for="name4">
       City
      </label>
                    <input class="form-control" id="name4" name="Incident_City" type="text" />
                </div>
                <div class="form-group ">
                    <label class="control-label " for="Incident_Region">
       Region
      </label>
                    <input class="form-control" id="Incident_Region" name="Incident_Region" type="text" />
                </div>
                <div class="form-group ">
                    <label class="control-label " for="Incident_Postal_code">
       Postal Code
      </label>
                    <input class="form-control" id="Incident_Postal_code" name="Incident_Postal_code" type="text" />
                </div>
                <div class="form-group ">
                    <label class="control-label " for="Incident_Country">
       Country
      </label>
                    <select class="select form-control" id="Incident_Country" name="Incident_Country">
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
      </select>
                </div>
                <div class="form-group">
                    <div>
                        <button class="btn btn-primary " name="btnSubmit" type="submit">
        Submit
       </button>
                    </div>
                </div>
            </form>
        </div>
