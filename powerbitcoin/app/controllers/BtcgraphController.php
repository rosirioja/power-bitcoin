<?php

class BtcgraphController extends \BaseController {


	public function getIndex()
	{
	
			$userid = Session::get('userid');
			$username = Session::get('username');
			$date = date('Y-m-d');
			$loginstatus = true;

			//contains user information
				$data = array('userid' => $userid, 'username' => $username, 'loginstatus' => $loginstatus);

			//displays data to body
			$getdata = new Bitcoin;
			$spdata = $getdata->getdatabyhour($userid, $date);
			return View::make("landing.btcgraph")->with(array("data1"=>$spdata));
		
	}

}
