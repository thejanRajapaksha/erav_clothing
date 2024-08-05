<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Colombo');

class Printingdetail extends CI_Controller {
    public function index(){
        $this->load->model('Commeninfo');
        $this->load->model('Printingdetailinfo');
		$result['menuaccess']=$this->Commeninfo->Getmenuprivilege();
        // $result['materialcategory']=$this->Printingdetailinfo->Getmaterialcategory();
		$this->load->view('printingdetail', $result);
	}
    public function Printingdetailinsertupdate(){
		$this->load->model('Printingdetailinfo');
        $result=$this->Printingdetailinfo->Printingdetailinsertupdate();
	}
    public function Printingdetailstatus($x, $y){
		$this->load->model('Printingdetailinfo');
        $result=$this->Printingdetailinfo->Printingdetailstatus($x, $y);
	}
    public function Printingdetailedit(){
		$this->load->model('Printingdetailinfo');
        $result=$this->Printingdetailinfo->Printingdetailedit();
	}
    public function Printingdetailupload(){
		$this->load->model('Printingdetailinfo');
        $result=$this->Printingdetailinfo->Printingdetailupload();
	}
    public function Printingdetailcheck(){
		$this->load->model('Printingdetailinfo');
        $result=$this->Printingdetailinfo->Printingdetailcheck();
	}
}