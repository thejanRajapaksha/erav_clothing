<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Colombo');

class Suppliertype extends CI_Controller {
    public function index(){
        $this->load->model('Commeninfo');
        $this->load->model('Suppliertypeinfo');
	    $result['menuaccess']=$this->Commeninfo->Getmenuprivilege();
		$this->load->view('suppliertype', $result);
	}
    public function Suppliertypeinsertupdate(){
		$this->load->model('Suppliertypeinfo');
        $result=$this->Suppliertypeinfo->Suppliertypeinsertupdate();
	}
    public function Suppliertypestatus($x, $y){
		$this->load->model('Suppliertypeinfo');
        $result=$this->Suppliertypeinfo->Suppliertypestatus($x, $y);
	}
    public function Suppliertypeedit(){
		$this->load->model('Suppliertypeinfo');
        $result=$this->Suppliertypeinfo->Suppliertypeedit();
	}
}