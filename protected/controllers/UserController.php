<?php

class UserController extends Controller {
	public $layout='main';
	public function filters() {
        return array( 'accessControl' ); // perform access control for CRUD operations
    }
 
    public function accessRules() {
        return array(            
			array(
			'allow', 
                'users'=>array('@'),
            ),
			array(
			'deny', 
				'actions'=>array('dashboard'),
                'users'=>array('*'),
            ),
        );
    }

	
	public function actionRegister(){		
		
		$model = new User('register');

		if(Yii::app()->request->isAjaxRequest){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(Yii::app()->request->isPostRequest){
			$model->attributes=$_POST['User'];
			if($model->validate() && $model->createUser()){
				Yii::app()->user->setFlash('notice', 'Thanks for registering!');
				$this->redirect(array('/user/login'));
			}else{
				Yii::app()->user->setFlash('notice', 'The following errors occurred');
			}
			
		}
		$this->render('register',array('model'=>$model));
	}


	public function actionLogin(){		
		
		$model = new User('login');

		if(Yii::app()->request->isAjaxRequest){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(Yii::app()->request->isPostRequest){
			$model->attributes=$_POST['User'];
			if($model->validate() && $model->login()){
				Yii::app()->user->setFlash('notice', 'You are now logged in!');
				$this->redirect(array('/user/dashboard'));
			}
			
		}
		$this->render('login',array('model'=>$model));
	}
	
	public function actionDashboard(){
		
		$this->render('dashboard');
	
	}
		
	public function actionLogout() {

		Yii::app()->user->logout();
		$this->redirect(array('/user/login'));
	}


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
}
