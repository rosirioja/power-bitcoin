<?php
	class Rims extends Eloquent {
		public $timestamps = false;

		//gets all the data in the database
		public function getdata($userid){
			$result = DB::table('rim')
								->select('*')
								->where('userid', $userid)
								->get();
			return $result;
		}

	}
?>