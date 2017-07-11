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
            'status' => array(
                'required' => true,
                'min' => 2,
                'max' => 50
            )
        ));
        
        if($validation->passed()) {
            
            try {
                //Put the filled data to the database
                $user->update(array(
                    'status' => Input::get('status')
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
    <link rel="stylesheet" href="css/textbox.css" type="text/css" />
    <form id="paper" method="post" action="">

        <div id="margin" align="center">Add something if you will</div>
        <p align= "center"><textarea placeholder="Enter something funny." id="text" name="status" rows="4" style="overflow: hidden; word-wrap: break-word; resize: none; height: 160px; "></textarea></p>  
        <br>
        <p align= "center"><input type="submit" value="Update"></p>
        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
        
    </form>

</div>