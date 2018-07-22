<?php


class Pass
{

	public static function generate($password) {
	 	return base64_encode(crypt($password));
	}
	
	public static function validate($password, $correct_hash)
   	{
   		sleep(1);
      	return base64_encode(crypt($password,base64_decode($correct_hash))) == $correct_hash;
   	}

}