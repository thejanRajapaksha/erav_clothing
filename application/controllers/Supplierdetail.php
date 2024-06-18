<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Colombo');

class Supplierdetail extends CI_Controller {
    public function index(){
        $this->load->model('Commeninfo');
        $this->load->model('Supplierdetailinfo');
		$result['menuaccess']=$this->Commeninfo->Getmenuprivilege();
        $result['suppliertype']=$this->Supplierdetailinfo->GetSuppliertype();
		$this->load->view('supplierdetail', $result);
	}
    public function Supplierdetailinsertupdate(){
		$this->load->model('Supplierdetailinfo');
        $result=$this->Supplierdetailinfo->Supplierdetailinsertupdate();
	}
    public function Supplierdetailstatus($x, $y){
		$this->load->model('Supplierdetailinfo');
        $result=$this->Supplierdetailinfo->Supplierdetailstatus($x, $y);
	}
    public function Supplierdetailedit(){
		$this->load->model('Supplierdetailinfo');
        $result=$this->Supplierdetailinfo->Supplierdetailedit();
	}
    public function Supplierdetailupload(){
		$this->load->model('Supplierdetailinfo');
        $result=$this->Supplierdetailinfo->Supplierdetailupload();
	}
    public function Supplierdetailcheck(){
		$this->load->model('Supplierdetailinfo');
        $result=$this->Supplierdetailinfo->Supplierdetailcheck();
	}
}