<?php
class ParentControllerClass extends ControllerClass{
	public $user;
	
	public function __construct() {
		parent::__construct();
		header('Content-type: text/plain; charset=utf-8');
		
		$this->checkSession();
    }
    
    private function checkSession(){
    	if($_GET && !empty($_GET["sessionId"])){
			$sessionId = trim($_GET["sessionId"]);
			
			$rs = $this->db->from("user")->where("uSession='$sessionId'")->order("uId DESC")->find();
			if(!empty($rs)){
				$this->user = $rs; 
				/////var_dump($this->user);
				$rv = array(status=>1,info=>"Success: Session passed.", data=>array());
			}else{
				$rv = array(status=>-2,info=>"Error: Cannot find session (sessionId(User) does not exist).", data=>array());
			}
		}else{
			$rv = array(status=>-1,info=>"Error: Please provide sessionId.", data=>array());
		}
		
		if($rv['status']<=0){ // if session check did not pass, output error message
			echo json_encode($rv);
		}else{ // else, do nothing.
			// do nothing
		}
    }
    
    protected function getSessionId(){
    	if($_GET && !empty($_GET['sessionId'])){
    		$sessionId = trim($_GET['sessionId']);
    		return $sessionId;
    	}else{
    		$rv = array(status=>-1,info=>"Error: Please provide sessionId.", data=>array());
    		echo json_encode($rv);
    		exit;
    	}
    }
    
    protected function getLocation(){
    	return $this->user['uLocation'];
    }
    
    protected function updateLocation($mapId){
    	$sessionId = $this->getSessionId();
    	
    	if($this->getMap($mapId)){
    		
    		if($this->db->from("user")->where("uSession = '$sessionId'")->update(array(uLocation=>$mapId))){
	    		return true;
	    	}else{
	    		$rv = array(status=>-1,info=>"Error: Not able to update your location.", data=>array());
	    		echo json_encode($rv);
	    		exit;
	    	}
    	}else{
    		$rv = array(status=>-2,info=>"Error: Does not have mapId=$mapId.", data=>array());
    		echo json_encode($rv);
    		exit;
    	}
    	
    }
    
    protected function getMap($mapId){
    	$map = $this->getMapById($mapId);
    	return $map;
    }
    
    protected function getMapById($mapId){
    	$mapId = intval($mapId);
    	
    	if(!empty($mapId)){
	    	$rs = $this->db->from("wmud_map")->where("id = '$mapId'")->find();
	    	if(!empty($rs)){
	    		return $rs;
	    	}else{
	    		return false;
	    	}
    	}else{
    		$rv = array(status=>-1,info=>"Error: mapId is invalid.", data=>array());
    		echo json_encode($rv);
    		exit;
    	}
    }
    
    protected function getMapByDirection($direction){
    	$direction = trim($direction);
    	
    	if(!empty($direction)){
    		$uLocation = $this->getLocation();
    		$map = $this->getMap($uLocation);
	    	switch ($direction){
				case "here":
					return $map;
					break;
				case "e":
					if(!empty($map['e'])){
						$mapX = $this->getMap($map['e']);
						return $mapX;
					}else{
						return false;
					}
					break;
				case "ne":
					if(!empty($map['ne'])){
						$mapX = $this->getMap($map['ne']);
						return $mapX;
					}else{
						return false;
					}
					break;
				case "n":
					if(!empty($map['n'])){
						$mapX = $this->getMap($map['n']);
						return $mapX;
					}else{
						return false;
					}
					break;
				case "nw":
					if(!empty($map['nw'])){
						$mapX = $this->getMap($map['nw']);
						return $mapX;
					}else{
						return false;
					}
					break;
				case "w":
					if(!empty($map['w'])){
						$mapX = $this->getMap($map['w']);
						return $mapX;
					}else{
						return false;
					}
					break;
				case "sw":
					if(!empty($map['sw'])){
						$mapX = $this->getMap($map['sw']);
						return $mapX;
					}else{
						return false;
					}
					break;
				case "s":
					if(!empty($map['s'])){
						$mapX = $this->getMap($map['s']);
						return $mapX;
					}else{
						return false;
					}
					break;
				case "se":
					if(!empty($map['se'])){
						$mapX = $this->getMap($map['se']);
						return $mapX;
					}else{
						return false;
					}
					break;
				default:
       				$rv = array(status=>-2,info=>"Error: no such direction.", data=>array());
    				echo json_encode($rv);
			}
    	}else{
    		$rv = array(status=>-1,info=>"Error: direction is invalid.", data=>array());
    		echo json_encode($rv);
    		exit;
    	}
    }
    
    
    protected function setLocationByDirection($direction){
    	$direction = trim($direction);
    	
    	if(!empty($direction)){
    		$uLocation = $this->getLocation();
    		$map = $this->getMap($uLocation);
	    	switch ($direction){
				case "e":
					if(!empty($map['e'])){
						$mapX = $this->updateLocation($map['e']);
						return $mapX;
					}else{
						return false;
					}
					break;
				case "ne":
					if(!empty($map['ne'])){
						$mapX = $this->updateLocation($map['ne']);
						return $mapX;
					}else{
						return false;
					}
					break;
				case "n":
					if(!empty($map['n'])){
						$mapX = $this->updateLocation($map['n']);
						return $mapX;
					}else{
						return false;
					}
					break;
				case "nw":
					if(!empty($map['nw'])){
						$mapX = $this->updateLocation($map['nw']);
						return $mapX;
					}else{
						return false;
					}
					break;
				case "w":
					if(!empty($map['w'])){
						$mapX = $this->updateLocation($map['w']);
						return $mapX;
					}else{
						return false;
					}
					break;
				case "sw":
					if(!empty($map['sw'])){
						$mapX = $this->updateLocation($map['sw']);
						return $mapX;
					}else{
						return false;
					}
					break;
				case "s":
					if(!empty($map['s'])){
						$mapX = $this->updateLocation($map['s']);
						return $mapX;
					}else{
						return false;
					}
					break;
				case "se":
					if(!empty($map['se'])){
						$mapX = $this->updateLocation($map['se']);
						return $mapX;
					}else{
						return false;
					}
					break;
				default:
       				$rv = array(status=>-2,info=>"Error: no such direction.", data=>array());
    				echo json_encode($rv);
			}
    	}else{
    		$rv = array(status=>-1,info=>"Error: direction is invalid.", data=>array());
    		echo json_encode($rv);
    		exit;
    	}
    }
}