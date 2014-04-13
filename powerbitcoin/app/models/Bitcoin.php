<?php
	class Bitcoin extends Eloquent {
		public $timestamps = false;

		//gets all the data in the database
		public function getdatabyhour($userid, $date){
			$result = DB::table('rim')
								->select('*')
								->where('userid', $userid)
								->where('date', $date)
								/*->where('date', '2014-01-29')*/
								->get();
			return $result;
		}

		//gets latest data
		public function getdatalatest($userid){
			$result = DB::table('rim')
									->select('*')
									->where('userid', $userid)
									->get();
			return $result;

		}

		public function getsumpower($userid){
			$result = DB::table('rim')->sum('power');

			return $result;

		}
	}
?>