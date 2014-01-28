<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		
		$users=array(
            // username => password
            'demo'=>'demo',
            'admin'=>'admin',
        );
		
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
		
		//IMPORTANTE!!!!!!
		//Esto de abajo, cuando esten los usuarios en la base de datos hay que descomentarlo
		//para loguearse con dichos usuarios.
		
		/*
		$users = Usuarios::model()->findByAttributes(array('usuario'=>$this->username)); 
		
		if ($users===null) { // No user was found!
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        } 
        // $user->Password refers to the "password" column name from the database
        else if($users->clave !== $this->password)
        {    
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        }
        else { // User/pass match 
            $this->errorCode=self::ERROR_NONE;
        }        
        return !$this->errorCode;*/
	}
}