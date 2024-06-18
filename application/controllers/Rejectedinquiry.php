<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Colombo');

class Rejectedinquiry extends CI_Controller {
    public function index(){
        $this->load->model('Commeninfo');
        $this->load->model('Rejectedinquiryinfo');
		$result['menuaccess']=$this->Commeninfo->Getmenuprivilege();
        $result['reasontype']=$this->Rejectedinquiryinfo->Getreasontype();
        $result['quotationid']=$this->Rejectedinquiryinfo->Getquotationid();
		$this->load->view('rejectedinquiry', $result);
	}
    public function Rejectedinquiryinsertupdate(){
		$this->load->model('Rejectedinquiryinfo');
        $result=$this->Rejectedinquiryinfo->Rejectedinquiryinsertupdate();
	}
    public function Rejectedinquirystatus($x, $y){
		$this->load->model('Rejectedinquiryinfo');
        $result=$this->Rejectedinquiryinfo->Rejectedinquirystatus($x, $y);
	}
    public function Rejectedinquiryedit(){
		$this->load->model('Rejectedinquiryinfo');
        $result=$this->Rejectedinquiryinfo->Rejectedinquiryedit();
	}
    public function Rejectedinquiryupload(){
		$this->load->model('Rejectedinquiryinfo');
        $result=$this->Rejectedinquiryinfo->Rejectedinquiryupload();
	}
    public function Rejectedinquirycheck(){
		$this->load->model('Rejectedinquiryinfo');
        $result=$this->Rejectedinquiryinfo->Rejectedinquirycheck();
	}
}