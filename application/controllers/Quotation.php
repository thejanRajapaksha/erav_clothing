<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Colombo');

class Quotation extends CI_Controller {
    public function index(){
        $this->load->model('Commeninfo');
        $this->load->model('Quotationinfo');
		$result['menuaccess']=$this->Commeninfo->Getmenuprivilege();
		$result['Inquiryid']=$this->Quotationinfo->GetInquiryid();
		$this->load->view('quotation', $result);
	}
    public function Quotationinsertupdate(){
		$this->load->model('Quotationinfo');
        $result=$this->Quotationinfo->Quotationinsertupdate();
	}
    public function Quotationstatus($x, $y){
		$this->load->model('Quotationinfo');
        $result=$this->Quotationinfo->Quotationstatus($x, $y);
	}
    public function Quotationedit(){
		$this->load->model('Quotationinfo');
        $result=$this->Quotationinfo->Quotationedit();
	}
    public function Quotationupload(){
		$this->load->model('Quotationinfo');
        $result=$this->Quotationinfo->Quotationupload();
	}
    public function Quotationcheck(){
		$this->load->model('Quotationinfo');
        $result=$this->Quotationinfo->Quotationcheck();
	}
}