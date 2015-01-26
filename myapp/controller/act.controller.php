<?php
include_once("./".APP_NAME."/controller/parent.controller.php");
class act_controller extends ParentControllerClass{
	public function gohome(){
		if($this->updateLocation(1)){
			$rv = array(status=>1,info=>"Success: Your location changed to home.", data=>array());
		}else{
			$rv = array(status=>-1,info=>"Error: Location did not change.", data=>array());
		}
		echo json_encode($rv);
	}
	
	public function look(){
		
	}
	
	public function walk(){
		
	}
	
}