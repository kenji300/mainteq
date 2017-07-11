<?php
class Config {
    
    
    // Accessing global array
    public static function get($path= null) {
        if($path){
            $config = $GLOBALS['config'];
            $path = explode('/', $path);
            
            foreach($path as $part){
                if(isset($config[$part])){
                    $config = $config[$part];
                }
            }
            
            return $config;
        }
        
        return false;
    }

}

?>