<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Response
 *
 * @author alterego4
 */
class Response extends CFormModel{
    //put your code here
    public $username;
    public $senderemail;
    public $message;
    public $post_id;
    public $verifyCode;     
    
    private $post;
    public function rules()
    {
        return array(
            array('username, senderemail, message, post_id', 'required',  'message'=>'Поле {attribute} должно быть заполенено'),
            array('message', 'length', 'max'=>2000, 'message'=>'Поле {attribute} слишком длинное (максимум 2000 символов)', 'tooLong'=>'Поле {attribute} слишком длинное (максимум 2000 символов)'),
            array('post_id','checkPost'),
            array('username', 'length', 'max'=>80, 'message'=>'Поле {attribute} слишком длинное (максимум 80 символов)', 'tooLong'=>'Поле {attribute} слишком длинное (максимум 80 символов)'),
            array('senderemail','email', 'message' => 'Поле {attribute} должно быть Е-mail'),
            array('verifyCode','captcha','allowEmpty'=>!Yii::app()->user->isGuest || !CCaptcha::checkRequirements(), 'message'=> 'Введите код верификации с картинки'),
        );
    }

        public function attributeLabels()
    {
        $names['username'] = "Ваше имя";
        $names['senderemail'] = "Ваша почта";
        $names['message'] = "Ваше сообщение";
        $names['verifyCode'] = "Введите символы с картинки";

        return array_merge(parent::attributeLabels(), $names);
    }

    public function checkPost()
    {
        $this->post=Post::model()->findByPk($this->post_id);
        return isset($this->post);
    }
    
    public function getPost()
    {
        $this->post=Post::model()->findByPk($this->post_id);
        return $this->post;
    }
}
