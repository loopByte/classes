<?php

    class Mailing{
        public $to;
        public $subject;
        public $message;
        public $headers = array('From: admin@loopbyte.tk');
        
        public function __construct{}
        
        public function single(){
            if(!empty($this->to, $this->subject, $this->message, $this->headers)){
                if(is_array($this->to)){
                    exit("You have called the wrong method to send the e-mail.")
                }else{
                    $headers = implode(',', $this->headers);
                    $send = mail($this->to, $this->subject, $this->message, $headers);
                    ($send) ? return true : return false;
                }
            }else{
                exit("You have to fill in the required fields.");
            }
        }
        
        public function subscribe(){}
    }
?>
