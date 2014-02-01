<?php


class ExportarForm extends CFormModel
{
	public $username;
	public $password;
	public $rememberMe=false;
	
	public function rules()
	{
		return array(
			array('username, password', 'required'),
			array('password', 'authenticate'),
		);	
	}
	
	public function authenticate($attribute, $params){
		if(!$this->hasErrors()){
			$this->addError('password','Incorrect password.');
		}
	}
}
