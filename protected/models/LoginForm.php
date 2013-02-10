<?php

class LoginForm extends CFormModel
{
	public $email;
	public $password;

	private $_identity;

	public function rules()
	{
		return array(
			array('email, password', 'required'),
                        array('email', 'email'),
                        array('email', 'length', 'max'=>255),
			array('password', 'length', 'max'=>32, 'min'=>3),
			array('password', 'authenticate'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'email'=>'Email',
			'password'=>'Password',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		$this->_identity=new UserIdentity($this->email,$this->password);
		if(!$this->_identity->authenticate())
			$this->addError('password','Incorrect username or password.');
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			Yii::app()->user->login($this->_identity);
			return true;
		}
		else
			return false;
	}
}
