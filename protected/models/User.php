<?php
class User extends CActiveRecord
{
	public $password_confirmation;
	private $_identity;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	
	public function tableName()
	{
		return 'users';
	}

	
	public function rules()
	{
		return array(
			array('email, password', 'required', 'on'=>'login'),
			array('firstname,lastname, email, password, password_confirmation', 'required', 'on'=>'register'),
			array('email', 'email'),
			array('email', 'unique','message'=>'Email already exists!', 'on'=>'register'),
			array('password', 'compare', 'compareAttribute'=>'password_confirmation', 'on'=>'register'),
		);
	}

	public function createUser(){
		$this->password = MD5($this->password);	
		return $this->save(false);	
	}

	public function login(){
		
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->email,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			Yii::app()->user->login($this->_identity);
			Yii::app()->user->setFlash('notice', 'You are now logged in!');
			return true;
		}
		else{
			Yii::app()->user->setFlash('notice', 'Your email/password combination was incorrect');
			return false;
		}
	
	}	
}
