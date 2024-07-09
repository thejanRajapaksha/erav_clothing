<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Colombo');

class Salesrepdetail extends CI_Controller {
    public function index(){
        $this->load->model('Commeninfo');
        $this->load->model('Salesrepdetailinfo');
		$result['menuaccess']=$this->Commeninfo->Getmenuprivilege();
        // $result['Salesreptype']=$this->Salesrepdetailinfo->GetSalesreptype();
		$this->load->view('salesrepdetail', $result);
	}
    public function Salesrepdetailinsertupdate(){
		$this->load->model('Salesrepdetailinfo');
        $result=$this->Salesrepdetailinfo->Salesrepdetailinsertupdate();
	}
    public function Salesrepdetailstatus($x, $y){
		$this->load->model('Salesrepdetailinfo');
        $result=$this->Salesrepdetailinfo->Salesrepdetailstatus($x, $y);
	}
    public function Salesrepdetailedit(){
		$this->load->model('Salesrepdetailinfo');
        $result=$this->Salesrepdetailinfo->Salesrepdetailedit();
	}
    public function Salesrepdetailupload(){
		$this->load->model('Salesrepdetailinfo');
        $result=$this->Salesrepdetailinfo->Salesrepdetailupload();
	}
    public function Salesrepdetailcheck(){
		$this->load->model('Salesrepdetailinfo');
        $result=$this->Salesrepdetailinfo->Salesrepdetailcheck();
	}
}