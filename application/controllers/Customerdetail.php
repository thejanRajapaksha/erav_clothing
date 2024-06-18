<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Colombo');

class Customerdetail extends CI_Controller {
    public function index(){
        $this->load->model('Commeninfo');
        $this->load->model('Customerdetailinfo');
		$result['menuaccess']=$this->Commeninfo->Getmenuprivilege();
        // $result['Customertype']=$this->Customerdetailinfo->GetCustomertype();
		$this->load->view('customerdetail', $result);
	}
    public function Customerdetailinsertupdate(){
		$this->load->model('Customerdetailinfo');
        $result=$this->Customerdetailinfo->Customerdetailinsertupdate();
	}
    public function Customerdetailstatus($x, $y){
		$this->load->model('Customerdetailinfo');
        $result=$this->Customerdetailinfo->Customerdetailstatus($x, $y);
	}
    public function Customerdetailedit(){
		$this->load->model('Customerdetailinfo');
        $result=$this->Customerdetailinfo->Customerdetailedit();
	}
    public function Customerdetailupload(){
		$this->load->model('Customerdetailinfo');
        $result=$this->Customerdetailinfo->Customerdetailupload();
	}
    public function Customerdetailcheck(){
		$this->load->model('Customerdetailinfo');
        $result=$this->Customerdetailinfo->Customerdetailcheck();
	}
}