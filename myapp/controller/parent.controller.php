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
}