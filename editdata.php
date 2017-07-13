<?php
    require_once 'core/init.php';
    //Create new User object
    $user = new User();

    //Check if user is logged in
    if(!$user->isLoggedIn()) {
        Redirect::to('index.php');
    }
//Check input
if(Input::exists()){
    //Checking token if match
    if(Token::check(Input::get('token'))) {
        //New validate object
        $validate = new Validate();
        //Checking textbox
        $validation = $validate->check($_POST, array(
            'name' => array(
                'required' => true,
               

            ),
            'email' => array(
                'required' => true,
                
                ),
            'first_Name' => array(
                'required' => true,
                
            ),
            'last_Name' => array(
                'required' => true,
               
            ),
            'email' => array(
               'reuired' => true
            ),
            'address_line_1' => array(
                'required' => true,
                
            ),
            'city' => array(
                'required' => true,
               
            ),
            'postal_code' => array(
                'required' => true,
                
            ),
            'country' => array(
                'required' => true,
                ),
             'email' => array(
                'required' => true
            )

        ));
        
        if($validation->passed()) {
            
            try {
                //Put the filled data to the database
                $user->update(array(
                   'first_name' => Input::get('first_name'),
                   'last_name' => Input::get('last_name'),
                   'address_line_1' => Input::get('address_line_1'),
                   'address_line_2' => Input::get('address_line_2'),
                   'city' => Input::get('city'),
                   'region' => Input::get('region'),
                   'zip_code' => Input::get('zip_code'),
                   'country' => Input::get('country'),
                   'region' => Input::get('region'),
                   'email' => Input::get('email')
                ));
                Redirect::to('profile2.php');
                
            } catch (Exception $e) {
                die($e->getMessage());
            }
            //error message if the textbox rule is ot fulfilled
        } else {
            foreach($validation->errors() as $error){
                echo $error, '<br>';
            }
        }

    }
}

?>

<form action="" method="post">
    <div class="field">
        

        <label for="name">First Name</label>
        <input type="text" name="first_name" id="first_name" placeholder="<?php echo escape($user->data()->first_name); ?>" value="" required><br>

        <label for="name">Last Name</label>
        <input type="text" name="last_name" id="last_name" placeholder="<?php echo escape($user->data()->last_name); ?>" value="" required><br>

        <label for="name">Address </label>
        <input type="text" name="address_line_1" id="address_line_1" placeholder="<?php echo escape($user->data()->address_line_1); ?>" value="" required><br>

        <label for="name">Address 2</label>
        <input type="text" name="address_line_2" id="address_line_2" placeholder="<?php echo escape($user->data()->address_line_2); ?>" value=""><br>

        <label for="name">City</label>
        <input type="text" name="city" id="city" placeholder="<?php echo escape($user->data()->city); ?>" value="" required><br>

        <label for="name">Region</label>
        <input type="text" name="region" id="region" placeholder="<?php echo escape($user->data()->region); ?>" value="" ><br>

        <label for="name">Postal/Zip Code</label>
        <input type="text" name="zip_code" id="zip_code" placeholder="<?php echo escape($user->data()->zip_code); ?>" value="" required><br>


        <span>Country:</span>
                <select id="country" name="country" method='post'>
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

        <label for="e-mail">E-mail</label>
        <input type="text" name="email" placeholder="<?php echo escape($user->data()->email); ?>" value=""><br>
                
        <input type="submit" value="Update">
        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    </div>
</form>