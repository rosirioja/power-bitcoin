<?php
class Customers extends Eloquent{
	
	public $timestamps = false;
	public $table = 'customer';
	public function saveCustomer(){
		$this->name = "jetros";
		$this->save();

	}

	public function getProfile(){
		
	}
}


?>