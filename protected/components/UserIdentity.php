<?php
class UserIdentity extends CUserIdentity
{
	private $_id;
	public $email;
	
	 public function __construct($email, $password){
		$this->email= $email;
		$this->password = $password;
	}

	public function authenticate()
	{
		$user=User::model()->findByAttributes(array('email' => $this->email));
		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if($user->password != MD5($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			$this->_id=$user->id;
			$this->errorCode=self::ERROR_NONE;
		}

		return $this->errorCode==self::ERROR_NONE;
	}

	
	public function getId()
	{
		return $this->_id;
	}
}