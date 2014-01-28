<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
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
		
		
		/*$users = Usuarios::model()->findByAttributes(array('usuario'=>$this->username)); 
		
		if ($users===null) { // No se encuentra el usuario
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        } 
        // $user->clave llama a la columna clave de la table
        else if($users->clave !== $this->password)
        {    
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        }
        else { // Coinciden usuario y contrasenia: no hay error 
			$this->_id=$users->usuario;
			$this->username=$users->usuario;
			$this->errorCode=self::ERROR_NONE;
			 
			/*Consultamos los datos del usuario por el nombre de usuario ($user->username) */
	//$info_usuario = Usuarios::model()->find('LOWER(usuario)=?', array($users->usuario));
			/*En las vistas tendremos disponible la fecha y hora de la última conexión*/
	//$this->setState('FechaHoraUltimaConexion',$info_usuario->FechaHoraUltimaConexion);
			 
			/*Actualizamos el último login del usuario que está autenticando ($user->usuario) 
			$sql = "update usuarios set FechaHoraUltimaConexion = now() where usuario='$users->usuario'";
			$connection = Yii::app() -> db;
			$command = $connection -> createCommand($sql);
			$command -> execute();
        }        
        return !$this->errorCode;*/
	}
	public function getId(){
		return $this->_id;
	}
}