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
		$record=Users::model()->findByAttributes(array('username' => $this -> username));    
        $name=$this->username;
		$jsonobj='{"username":"'.$name.'"}';
		
		print_r(json_decode($jsonobj));
		Yii::app()->end();
		
		
		if($record===NULL)
           $this->errorCode=self::ERROR_USERNAME_INVALID;	
           
        else if($record->password!==$this->password)
            $this->errorCode=self::ERROR_PASSWORD_INVALID;      
	
	    else 
	    {
	        $this-> errorCode=self::ERROR_NONE;
	    }
	  return !$this->errorCode;
	}
	
	/*public function getId() {
    return $this->_id;
   }*/
}