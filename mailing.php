<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    class Mailing{
        public $to;
        public $subject;
        public $message;
        public $headers = array('From: admin@loopbyte.tk');
        
        public function __construct(){}
        
        public function single(){
            if( !empty($this->to) ||
                !empty($this->subject) ||
                !empty($this->message) ||
                !empty($this->headers)){
                if(is_array($this->to)){
                    exit("You have called the wrong method to send the e-mail.");
                }else{
                    $headers = implode(',', $this->headers);
                    $send = mail($this->to, $this->subject, $this->message, $headers);
                    if($send){return true;}else{return false;}
                }
            }else{
                exit("You have to fill in the required fields.");
            }
        }
        
        public function subscribe(){
            if( !empty($this->to) ||
                !empty($this->subject) ||
                !empty($this->message) ||
                !empty($this->headers)){
                    if(is_array($this->to)){
                        $headers = implode(',', $this->headers);
                        foreach($this->to as $to){
                            $send = mail($to, $this->subject, $this->message, $headers);
                        }
                        if($send){return true;}else{return false;}
                    }else{
                        exit('To property is not correctly set.');
                    }
            }else{
                exit('Properties are not correctly set.');
            }
        }
    }
    
    $mail = new Mailing();
    
    $mail->to = array('milea.vasile959@gmail.com', 'milea.vasile959@gmail.com');
    $mail->subject = 'This is a subject';
    $mail->message = 'This is a message';
    $mail->headers = array('From: admin@loopbyte.tk');
    
    echo $mail->subscribe();
    
?>