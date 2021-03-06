<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	private $name;
	//public $verifyCode;
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
	
		$intentos = 0;	
		
		$users = Usuarios::model()->findByAttributes(array('usuario'=>$this->username)); 
		
		// Si no se encuentra el usuario
		if ($users===null) { 
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        } 
        // Si no coincide la contrasenia ($user->clave)
		else if(($users->clave != md5($this->password)) && $users!==null)
        {
			//Miramos cuantos fallos tiene ya ese usuario y le añadimos el fallo actual
			$users->numFallos=$users->numFallos+1;
			
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
			
        }
        else { // Coinciden usuario y contrasenia: no hay error 
			$this->_id=$users->usuario;
			$this->username=$users->usuario;
			$this->errorCode=self::ERROR_NONE;
			 
			//En las vistas tendremos disponible la fecha y hora de la última conexión. Si es la primera vez que ponga el mensaje "primera vez"
			if ($users->FechaHoraUltimaConexion=="NULL" || $users->FechaHoraUltimaConexion=="" || $users->FechaHoraUltimaConexion=="0000-00-00 00:00:00") {
				$this->setState('FechaHoraUltimaConexion', date("Y-m-d H:i:s"));
			}else{
				$this->setState('FechaHoraUltimaConexion',$users->FechaHoraUltimaConexion);
			}
			$this->_id=$users->IdUsuario;
			$this->name=$users->usuario;

			$users->FechaHoraUltimaConexion=date("Y-m-d H:i:s");
			$users->numFallos=0;
        }
		if ($users!==null) { 
            $users->save();	
			$this->setState('NumFallos',$users->numFallos);	
        }
		
			
        return !$this->errorCode;
	}
	public function getId(){
		return $this->_id;

	}
	public function getName(){
		return $this->name;

	}
}