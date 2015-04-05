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
         
    private $post;
    public function rules()
    {
        return array(
            array('username, senderemail, message, post_id', 'required'),
            array('post_id','checkPost')
        );
    }
    
    public function checkPost()
    {
        $this->post=Post::model()->findByPk($this->post_id);
        return isset($this->post);
    }
}
