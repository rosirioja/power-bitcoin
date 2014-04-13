<?php

class PaymentController extends \BaseController {

	
	protected $layout = "landing.default";

	public function getIndex()
	{
		//title of the website
		$this->layout->title = "powerBtc.ph";

		//checks if the use logs in
		if (Session::has('userid')){
			$userid = Session::get('userid');
			$username = Session::get('username');
			$loginstatus = true;

			//contains user information
			$data = array('userid' => $userid, 'username' => $username, 'loginstatus' => $loginstatus);

			//displays data to header
			$this->layout->head = View::make("landing.head")->with($data);
			
			$getdatawallet = new Users;
			$getwallet = $getdatawallet->getWallet($username);

			//displays data to body
			$this->layout->body = View::make("landing.payment")->with(array("data1"=>$getwallet));
			
			//displays data to footer
			$this->layout->foot = View::make("landing.foot");

		}

		//the user did not log in
		else{
			$loginstatus = false;

			return Redirect::to('/login');

		}
	}



}