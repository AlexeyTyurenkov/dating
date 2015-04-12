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
				'backColor'=>0xFF0000,
                                'maxLength'=> 4,
                                'minLength'=> 4,
                                'foreColor'=> 0x00FFFF
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
            $city     = Yii::app()->request->getParam('city',0);
            $category = Yii::app()->request->getParam('category',0);
            $target   = Yii::app()->request->getParam('target',0);
            $minAge   = Yii::app()->request->getParam('minAge',18);
            $maxAge   = Yii::app()->request->getParam('maxAge',99);
            $offset   = Yii::app()->request->getParam('offset',0);
            $limit    = Yii::app()->request->getParam('limit',50);
            $postsDataprovider = Post::getDataProvider($city, $category, $target, $minAge, $maxAge, 5);
            if(Yii::app()->request->isAjaxRequest){
                $this->renderPartial('_fullList', array(
                                         'dataProvider'         => $postsDataprovider));
                // Завершаем приложение
                Yii::app()->end();
            }
            else 
            {
            // если запрос не асинхронный, отдаём форму полностью
                $this->render('index', array('cityPreselected'     => $city, 
                                         'categoryPreselected' => $category,
                                         'targetPreselected'    => $target,
                                         'minAgeSelected'       => $minAge,
                                         'maxAgeSelected'       => $maxAge,
                                         'limit'                => $limit,
                                         'offset'               => $offset,
                                         'dataProvider'         => $postsDataprovider));
            }

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
        
        public function actionAdd()
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
                    $this->render('addSuccess',array('model'=>$model));
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
                if(!isset($email))
                {
                   throw new CHttpException(400,'Illegal method'); 
                }
                    
                $user = User::model()->find("email = '".$email."'");
                if(!isset($user))
                {
                    
                   $user = new User();
                   $user->email = $email;
                   $user->password = Utilites::random_password();
                   if(!$user->save())
                   {
                       throw new CHttpException(500,'Cannot save to database');
                   }             
                }
                echo $user->id;
                Yii::app()->end();
            }
            else 
            {
                throw new CHttpException(400,'Illegal method');
            }
        }
       

        
        public function actionShow()
        {
            $id = Yii::app()->request->getParam('post_id');
            $model=Post::model()->findByPk($id);
            $response = new Response();
            if(!isset($model))
            {
                throw new CHttpException(404,"No such post");
            }
            $this->render('fullPost',array('model'=>$model,'response'=>$response));
        }
        
        public function actionActivation($code) 
        {
            if(!$code)
            {
                throw new CHttpException(400,"No such post");
            }
            $post = Post::model()->findByAttributes(array('activationCode'=>$code));
            if(!$post)
            {
                    throw new CHttpException(404,"No such post");                   
            }
            $post->activate();
            $this->render('activated',array('model'=>$post));
        }
        
        public function actionSendmail() 
        {
            $response = new Response();
            $rawRespone = Yii::app()->request->getParam('Response');
            if(isset($rawRespone))
            {
                $response->attributes=Yii::app()->request->getParam('Response');
                if($response->checkPost())
                {
                    $post = $response->getPost();
                    if(!$response->validate())
                    {
                        $this->render('fullPost',array('model'=>$post,'response'=>$response));
                    }
                    else 
                    {
                        $this->render('responseSended',array('model'=>$post,'response'=>$response)); 
                    }
                }
                else
                {
                    throw new CHttpException(404,"No such post"); 
                }
            }
            else
            {
                throw new CHttpException(400,"No response");   
            }
        }
}