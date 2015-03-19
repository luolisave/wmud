<?php
class public_controller extends ControllerClass{
	public function __construct() {
		parent::__construct();
		header('Content-type: text/plain; charset=utf-8');
    }
    
	public function opensession(){
		
		if($_GET && !empty($_GET["username"]) && !empty($_GET["password"])){
			$username = trim($_GET["username"]);
			$password = trim($_GET["password"]);
			$password = md5($password);
			$rs = $this->db->from("user")->where("uName = '$username' AND uPassword = '$password'")->order("uId DESC")->find();
			$rv = array();
			
			if(!empty($rs)){
				if($rs['uStatus'] >= 1){
					$uId = $rs['uId'];
					$sessionId = $this->randString(16);
					
					if($this->db->from("user")->where("uid=$uId")->update(array(uSession=>$sessionId))){
						$rv = array(status=>1,info=>"Open Session Successfully!", data=>array("sessionId"=>$sessionId));
					}else{
						$rv = array(status=>-4,info=>"Error: Cannot save session into database.", data=>array());
					}
				}else{
					$rv = array(status=>-3,info=>"Error: User Disabled.", data=>array());
				}
			}else{
				$rv = array(status=>-2,info=>"Error: User name and password are not match.", data=>array());
			}
		}else{
			$rv = array(status=>-1,info=>"Error: Please provide username and password.", data=>array());
		}
		
		echo json_encode($rv);
		
		/*
		header('Content-Type: text/html; charset=utf-8');
		var_dump($this->db->sql_last);
		var_dump($rs);
		//*/
	}
	
	public function closesession(){
		if($_GET && !empty($_GET["sessionId"])){
			$sessionId = trim($_GET["sessionId"]);
			
			if($this->db->from("user")->where("uSession='$sessionId'")->update(array(uSession=>""))){
				$rv = array(status=>1,info=>"Close Session Successfully!", data=>array());
			}else{
				$rv = array(status=>-2,info=>"Error: Cannot delete session into database (sessionId does not exist).", data=>array());
			}
		}else{
			$rv = array(status=>-1,info=>"Error: Please provide sessionId.", data=>array());
		}
		
		echo json_encode($rv); 
		/////var_dump($rv);
	}
	
	
	public function test(){
		
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata);
		
		if(empty($request)){
			$request= array();
		}
		
		echo json_encode($request,JSON_FORCE_OBJECT);
	
	}
}