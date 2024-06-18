<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Colombo');

class Reasontype extends CI_Controller {
    public function index(){
        $this->load->model('Commeninfo');
        $this->load->model('Reasontypeinfo');
	    $result['menuaccess']=$this->Commeninfo->Getmenuprivilege();
		$this->load->view('reasontype', $result);
	}
    public function Reasontypeinsertupdate(){
		$this->load->model('Reasontypeinfo');
        $result=$this->Reasontypeinfo->Reasontypeinsertupdate();
	}
    public function Reasontypestatus($x, $y){
		$this->load->model('Reasontypeinfo');
        $result=$this->Reasontypeinfo->Reasontypestatus($x, $y);
	}
    public function Reasontypeedit(){
		$this->load->model('Reasontypeinfo');
        $result=$this->Reasontypeinfo->Reasontypeedit();
	}
}