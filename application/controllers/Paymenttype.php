<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Colombo');

class Paymenttype extends CI_Controller {
    public function index(){
        $this->load->model('Commeninfo');
        $this->load->model('Paymenttypeinfo');
	    $result['menuaccess']=$this->Commeninfo->Getmenuprivilege();
		$this->load->view('Paymenttype', $result);
	}
    public function Paymenttypeinsertupdate(){
		$this->load->model('Paymenttypeinfo');
        $result=$this->Paymenttypeinfo->Paymenttypeinsertupdate();
	}
    public function Paymenttypestatus($x, $y){
		$this->load->model('Paymenttypeinfo');
        $result=$this->Paymenttypeinfo->Paymenttypestatus($x, $y);
	}
    public function Paymenttypeedit(){
		$this->load->model('Paymenttypeinfo');
        $result=$this->Paymenttypeinfo->Paymenttypeedit();
	}
}