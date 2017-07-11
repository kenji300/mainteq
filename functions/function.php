<?php

// Securing HTML Form Input (XSS ATTACK)    
function escape($string){
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}

?>