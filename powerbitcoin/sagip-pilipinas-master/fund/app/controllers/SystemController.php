<?php

class SystemController extends \BaseController {

	public function getCheckuser(){
		$useremail = Input::get('useremail');
		$password = Input::get('password');
		$password = md5($password);
		$users = new Users;
		$result = $users->authLogin($useremail, $password);
		if ($result){
			Session::put('userid',$result->id);
			Session::put('username',$result->username);
			return "true";
		}else{
			return "false";
		}
	}
	

}

//$2y$08$gZ6AhTTBvhITd776Siqzze9ljQi3ltwhKH0AyQ6BcsFdsjof8hVBu

//$2y$08$A1hg6OjcsyIb9arReMrpquG44iSafA/9tmIFmhrgN7iXL9Bldtxca