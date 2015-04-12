<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExtCaptcha
 *
 * @author alterego4
 */
class ExtCaptcha extends CCaptcha
{
    //put your code here
    public $buttonLabel = '<br>[новый код]';
    public function init()
    {
        parent::init();
    }
}
