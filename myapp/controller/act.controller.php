<?php
include_once("./".APP_NAME."/controller/parent.controller.php");
class act_controller extends ParentControllerClass{
	public function gohome(){
		if($this->updateLocation(1)){
			$rv = array(status=>1,info=>"Success: Your location changed to home.", data=>array());
		}else{
			$rv = array(status=>-1,info=>"Error: Location did not change.", data=>array());
		}
		echo json_encode($rv, JSON_UNESCAPED_UNICODE);
	}
	
	public function look(){
		if(!empty($_GET["direction"])){
			$direction = trim($_GET["direction"]);
			$map = $this->getMapByDirection($direction);
			if(!empty($map)){
				$rv = array(status=>1,info=>"Success: Map for direction '$direction' returned.", data=>$map);
			}else{
				$rv = array(status=>-2,info=>"Error: no map.", data=>array());
			}
				
		}else{
			$rv = array(status=>-1,info=>"Error: Please give a direction.", data=>array());
		}
		echo json_encode($rv, JSON_UNESCAPED_UNICODE);
	}
	
	public function walk(){
		if(!empty($_GET["direction"])){
			$direction = trim($_GET["direction"]);
			
			$status = $this->setLocationByDirection($direction);
			if($status === true){
				$rv = array(status=>1,info=>"Success: You moved to '$direction'.", data=>$map);
			}else{
				$rv = array(status=>-2,info=>"Error: no such location.", data=>array());
			}
			/*
			$map = $this->getMapByDirection($direction);
			if(!empty($map)){
				$rv = array(status=>1,info=>"Success: Map for direction '$direction' returned.", data=>$map);
			}else{
				$rv = array(status=>-2,info=>"Error: no map.", data=>array());
			}
			//*/	
		}else{
			$rv = array(status=>-1,info=>"Error: Please give a direction.", data=>array());
		}
		echo json_encode($rv, JSON_UNESCAPED_UNICODE);
	}
	
}