<?php

class SiteController extends Controller
{
    public function init() {
        parent::init();
        $this->layout = "//layouts/special";
    }
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
            $city = Yii::app()->request->getParam('city',0);
            $category = Yii::app()->request->getParam('category',0);
            $target   = Yii::app()->request->getParam('target',0);
            
            $this->render('index', array('citiesArray'     => City::getAllCitiesAsKeyValue(), 
                                         'categoriesArray' => Category::getAllCategoriesAsKeyValue(),
                                         'targetsArray'    => Target::getAllTargetsAsKeyValue(),
                                         'postsArray'      => Post::getNextMessages($city, $category, $target, 0, 50)));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

        public function actionSmallView()
        {
            $model=new Post;

            // uncomment the following code to enable ajax-based validation
            /*
            if(isset($_POST['ajax']) && $_POST['ajax']==='post-_smallView-form')
            {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
            */

            if(isset($_POST['Post']))
            {
                $model->attributes=$_POST['Post'];
                if($model->validate())
                {
                    // form inputs are valid, do something here
                    return;
                }
            }
            $this->render('_smallView',array('model'=>$model));
        }
        
        public function actionAddNew()
        {
            $model=new Post;

            // uncomment the following code to enable ajax-based validation
            /*
            if(isset($_POST['ajax']) && $_POST['ajax']==='post-addNew-form')
            {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
            */

            if(isset($_POST['Post']))
            {
                $model->attributes=$_POST['Post'];
                if($model->validate())
                {
                    // form inputs are valid, do something here
                    $model->save();
                    return;
                }
            }
            $this->render('addNew',array('model'=>$model));
        }
        
        public function actionGetUserID() 
        {
            if(Yii::app()->request->isAjaxRequest)
            {
                $email = Yii::app()->request->getPost('email');
                $user_id = User::model()->find("email = '".$email."'");
                if(!isset($user_id))
                {
                    
                   $newuser = new User();
                   $newuser->email = $email;
                   $newuser->password = $this->random_password();
                   $newuser->save();
                   $user_id = $newuser->id;
                }
                echo $user_id;
                Yii::app()->end();
            }
           
        }
        private function random_password( $length = 18 ) 
        {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
            $password = substr( str_shuffle( $chars ), 0, $length );
            return $password;
        }
}