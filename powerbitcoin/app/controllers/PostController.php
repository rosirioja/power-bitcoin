<?php

use Carbon\Carbon;

class PostController extends \BaseController {

	public function postPayment(){
		date_default_timezone_set('Asia/Manila');
		
		$userid = Session::get('userid');
		$username = Session::get('username');
		$loginstatus = true;
		$btcamount = Input::get('btcamount');

		$inputdata = new Transaction;
		$inputdata->userid = $userid;
		$inputdata->date = date('Y-m-d');
		$inputdata->bitcoinaddress = Input::get("btcAddress");
		$inputdata->amount = Input::get("amount");
		$inputdata->save();

		$result = DB::table('user')
					->select('*')
					->where('username',$username)
					->get();

		foreach ($result as $row) {
			$wallet = $row->wallet;
		}

		$amount = $wallet - $btcamount;

		DB::table('user')
            ->update('wallet', $amount)
            ->where('username', $username);


	}
}