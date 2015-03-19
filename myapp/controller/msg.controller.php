<?php
include_once("./".APP_NAME."/controller/parent.controller.php");
class msg_controller extends ParentControllerClass{
	public function world(){
		$rv = array();
		if(!empty($_GET["msg"]) || !empty($_POST["msg"])){ //$_REQUEST
			if(!empty($_GET["msg"]))$tmp_msg = trim($_GET["msg"]);
			if(!empty($_POST["msg"]))$tmp_msg = trim($_POST["msg"]);
			$msg = array(
					"user_id" => $this->user['uId'],
					"user_name" => $this->user['uName'],
					"user_nickname" => $this->user['uNickname'],
					"content" => $tmp_msg,
					"time" => time()
				);
			$this->db->from("wmud_msg")->add($msg);
			$rv = array(status=>1,info=>"Success: message sent.", data=>$map);
		}else{
			$rv = array(status=>-1,info=>"Error: Message is empty!", data=>array());
		}
		
		echo json_encode($rv, JSON_UNESCAPED_UNICODE);
		exit;
	}
	
}