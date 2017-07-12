<?php



class Complaint{
    private $_db,
            $_data,
            $_isLoggedIn;




     public function __construct($complaints = null) {
        $this->_db = DB::getInstance();
        
       
    }
    
    public function create($fields = array()){
        if(!$this->_db->insert('complaints', $fields)){
            throw new Exception('There was a problem creating the form');
        }

        $last_id = lastInsertId();
    }
    
   

    
    
    public function exists(){
        return (!empty($this->_data)) ? true : false;
    }
    
  
    
    public function data() {
        return $this->_data;
    }

    public function email($emailaddress) {
        $to = $emailaddress;
        $subject = 'Thank you for reporting';
        $message_body = 'Thank you for using our services, please wait with a maximum of 48 hours to be contacted';
        $header = 'From: rizky <rizkyfalcie@gmail.com>';
        if(mail($to, $subject, $message_body, $header))
        {
            echo 'message is sent';
        } else {
            echo 'something is wrong';
        }


    }

    public function phpmailer($emailaddress)
    {
        require_once 'libs/phpmailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPAuth=true;
        $mail->Host='smtp.gmail.com';
        $mail->Username='rizkyfalcie@gmail.com';//replace with your email address
        $mail->Password='termantap';//replace with your password
        $mail->SMTPSecure='tsl';
        $mail->Port=587;
        $mail->setFrom('rizkyfalcie@gmail.com', 'No-Reply E-mail');
        $mail->addAddress($emailaddress);
        $mail->Subject  = 'Thank you for using our services';
        $mail->Body     = 'Dear Customer, thank you for using our services. please wait with a maximum of 48 hours for processing.';
        if(!$mail->send()) {
          echo 'Message was not sent.';
          echo 'Mailer error: ' . $mail->ErrorInfo;
        } else {
          echo 'Message has been sent.';
        }
    }
  


}



?>