<?php
	class Transaction extends Eloquent {
		public $timestamps = false;
		public $table = 'transaction';

		//gets all the data in the database
		public function getdata($userid){
			$result = DB::table('transaction')
								->select('*')
								->where('userid', $userid)
								->get();
			return $result;
		}

	}
?>