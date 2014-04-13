<?php

class HomeController extends \BaseController {

	protected $layout = "landing.default";
	public function getIndex()
	{
		//title of the website
		$this->layout->title = "powerBtc.ph";

		//checks if the user logs in
		if (Session::has('userid')){
			$userid = Session::get('userid');
			$username = Session::get('username');
			$loginstatus = true;

			//contains user information
			$data = array('userid' => $userid, 'username' => $username, 'loginstatus' => $loginstatus);

			//displays data to header
			$this->layout->head = View::make("landing.head")->with($data);
			
			//displays data to body
			$getspdata = new Bitcoin;
			$spdata = $getspdata->getdatalatest($userid);
			$sumpower = $getspdata->getsumpower($userid);

			$getsettings = new Settings;
			$settings = $getsettings->getdatalatest($userid);
			$this->layout->body = View::make("landing.body")->with(array("data1"=>$spdata, "data2"=>$sumpower,"data3"=>$settings));
			
			//displays data to footer
			$this->layout->foot = View::make("landing.foot");

		}

		//user did not log in
		else{
			$loginstatus = false;

			return Redirect::to('/login');

		}
	}

}