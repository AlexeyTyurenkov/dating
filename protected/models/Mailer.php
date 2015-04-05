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
    
    private $addressToSend;
    private $addressToReply;
    private $addressFrom;
    private $nameFrom;
    private $subject;
    private $message;
    //put your code here
    
    private function sendmail()
    {
        $headers="From: ".$this->addressFrom."\r\nReply-To: ".$this->addressToReply;
        mail($this->addressToSend,  $this->subject, $this->message,$headers);
    }
    
    public static function sendActivationLink(Post $post)
    {
        $mailer = new Mailer();
        $mailer->addressToSend = $post->user->email;
        $mailer->addressToSend = "alterego4@gmail.com";
        $mailer->addressToReply = "no-reply@dating.itatests.com";
        $mailer->addressFrom    = "no-reply@dating.itatests.com";
        $mailer->nameFrom       = "Безкоштовні оголошення";
        $mailer->subject        = "Активація Вашого оголошення";
        $mailer->message        = "Ваше оголошення очікує на активацію перейдіть за посиланням ".Yii::app()->createUrl('site/activation',array('code'=>$post->activationCode));
        $mailer->sendmail();
    }
}

?>