<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Colombo');

class Materialdetail extends CI_Controller {
    public function index(){
        $this->load->model('Commeninfo');
        $this->load->model('Materialdetailinfo');
		$result['menuaccess']=$this->Commeninfo->Getmenuprivilege();
		$this->load->view('materialdetail', $result);
	}
    public function Materialdetailinsertupdate(){
		$this->load->model('Materialdetailinfo');
        $result=$this->Materialdetailinfo->Materialdetailinsertupdate();
	}
    public function Materialdetailstatus($x, $y){
		$this->load->model('Materialdetailinfo');
        $result=$this->Materialdetailinfo->Materialdetailstatus($x, $y);
	}
    public function Getmaterialdetails() {	
		$this->load->model('Materialdetailinfo');
		$material_details = $this->Materialdetailinfo->Getmaterialdetails();	
		echo json_encode($material_details);
	}
    public function Materialdetailupload(){
		$this->load->model('Materialdetailinfo');
        $result=$this->Materialdetailinfo->Materialdetailupload();
	}
    public function Materialdetailcheck(){
		$this->load->model('Materialdetailinfo');
        $result=$this->Materialdetailinfo->Materialdetailcheck();
	}
	public function Savematerialbalances(){
		$this->load->model('Materialdetailinfo');
        $this->Materialdetailinfo->Savematerialbalances();
	}
    public function Getmaterialcategory(){		
		$this->load->model('Materialdetailinfo');
		$result=$this->Materialdetailinfo->Getmaterialcategory();		
	}
}