<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mailer
 *
 * @author alterego4
 */
class Mailer {
    
    
    //put your code here
    public static function sendActivationLink(Post $post)
    {
        $mailer = new Mailer();
        $headers="From: no-reply@dating.itatests.com\r\nReply-To: alterego4@gmail.com";
        mail('alesha.pukhov@gmail.com', "some Subject", "some Message",$headers);
    }
}

?>