<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Colombo');

class Orderdetail extends CI_Controller {
    public function index(){
        $this->load->model('Commeninfo');
        $this->load->model('Orderdetailinfo');
		$result['menuaccess']=$this->Commeninfo->Getmenuprivilege();
        $result['Quotationid']=$this->Orderdetailinfo->GetQuotationid();
		$this->load->view('orderdetail', $result);
	}
    public function Orderdetailinsertupdate(){
		$this->load->model('Orderdetailinfo');
        $result=$this->Orderdetailinfo->Orderdetailinsertupdate();
	}
    public function Orderdetailstatus($x, $y){
		$this->load->model('Orderdetailinfo');
        $result=$this->Orderdetailinfo->Orderdetailstatus($x, $y);
	}
    public function Orderdetailedit(){
		$this->load->model('Orderdetailinfo');
        $result=$this->Orderdetailinfo->Orderdetailedit();
	}
    public function Orderdetailupload(){
		$this->load->model('Orderdetailinfo');
        $result=$this->Orderdetailinfo->Orderdetailupload();
	}
    public function Orderdetailcheck(){
		$this->load->model('Orderdetailinfo');
        $result=$this->Orderdetailinfo->Orderdetailcheck();
	}
    public function Getinquirydetails(){
		$this->load->model('Orderdetailinfo');
        $result=$this->Orderdetailinfo->Getinquirydetails();
	}
}