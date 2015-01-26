<?php
class index_controller extends ControllerClass{
	public function index(){
		$this->assign("data","here is some data");
		//show default view file
		$this->display();


		//echo "<br /><br /><br />Read From Database:";
		//$rs = $this->db->from("test")->select();
		//var_dump($rs);
	}
}