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
                'min' => 2,
                'max' => 50

            ),
            'email' => array(
                'required' => true,
                'min' => 10,
                'max' => 50, 
                )
        ));
        
        if($validation->passed()) {
            
            try {
                //Put the filled data to the database
                $user->update(array(
                    'name' => Input::get('name'),
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
        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo escape($user->data()->name); ?>">
        <label for="e-mail">E-mail</label>
        <input type="text" name="email" value="<?php echo escape($user->data()->email); ?>">

        
        <input type="submit" value="Update">
        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    </div>
</form>