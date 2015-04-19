<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminController
 *
 * @author alterego4
 */
class AdminController extends Controller
{
    public function filters()
    {
        return array(
            'accessControl',
        );
    }
    
    public function accessRules()
    {
        return array(
            array('allow',
                'actions'=>array('readlog'),
                'users'  =>array('nata')
            ),
            array('deny',
                'actions'=>array('readlog'),
                'users' => array('*')),
        );
    }
    
    public function actionIndex()
        {
            $dataProvider=new CActiveDataProvider('Post',array(
                'pagination'=>array(
                        'pageSize'=>100,
                    ),
                )
               );
            $this->render('adminposts',array('dataProvider'=>$dataProvider));
        }//put your code here
}
