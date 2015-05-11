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
        //$mailer->addressToSend = "datings2015@gmail.com";
        $mailer->addressToReply = "no-reply@dating.itatests.com";
        $mailer->addressFrom    = "no-reply@dating.itatests.com";
        $mailer->nameFrom       = "Сервис простых знакомств";
        $mailer->subject        = "Активация Вашего объявления";
        $mailer->message        = "Ваше объявление ожидает активации ".Yii::app()->createAbsoluteUrl('site/activation',array('code'=>$post->activationCode));
        
        $mailer->message        = $mailer->message ."\n\nДля редактирования воспользуйтесь ссылкой ".Yii::app()->createAbsoluteUrl('site/edit',array('code'=>$post->editCode));
        
        $mailer->sendmail();
    }
    
    public static function sendResponse(Post $post, Response $response)
    {
        $mailer = new Mailer();
        $mailer->addressToSend = $post->user->email;
        //$mailer->addressToSend = "datings2015@gmail.com";
        $mailer->addressToReply = $response->senderemail;
        $mailer->addressFrom    = "no-reply@dating.itatests.com";
        $mailer->nameFrom       = "Сервис простых знакомств";
        $mailer->subject        = "Пользователь ".$response->username." ответил на Ваше сообщение";
        $mailer->message        = "Пользователь ".$response->username." ответил на Ваше сообщение\n\n";
        $mailer->message        = $mailer->message.$response->message;
        $mailer->message        = $mailer->message."\n\nВы можете ответить ему по адресу ".$response->senderemail." , либо нажав кнопку ответить\n\n";
        $mailer->message        = $mailer->message ."\n\n Адрес Вашего объявления ".Yii::app()->createAbsoluteUrl('site/show',array('post_id'=>$post->id));
        $mailer->message        = $mailer->message ."\n\nДля редактирования воспользуйтесь ссылкой ".Yii::app()->createAbsoluteUrl('site/edit',array('code'=>$post->editCode));
        
        $mailer->sendmail();
    }
            
}

?>