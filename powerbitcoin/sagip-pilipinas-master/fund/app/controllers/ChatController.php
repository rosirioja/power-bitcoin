<?php

class ChatController extends \BaseController {

	public function getIndex(){
		$chat = new Chat;
		$result = $chat->getChat(Session::get('username'));
		return json_encode($result);
	}


}