<?php

// Start Sessions
session_start();




// Configuration
$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => '',
        'db' => 'dbi290400'
    ),
    'remember' => array(
        'c_name' => 'hash',
        'c_expire' => 604800
    ),
    'session' => array(
        'session_name' => 'user',
        'token_name' => 'csrf_token'
    )
);

// Require another classes
spl_autoload_register(function($class) {
    require_once 'classes/' . $class . '.php';
});

require_once 'functions/function.php';

if(Cookie::exists(Config::get('remember/c_name')) && !Session::exists(Config::get('session/session_name'))){
    $hash = Cookie::get(Config::get('remember/c_name'));
    $hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));
    
    if($hashCheck->count()){
        $user = new User($hashCheck->first()->user_id);
        $user->login();
    }
}

?>