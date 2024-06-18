<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Colombo');

class Clothtype extends CI_Controller {
    public function index(){
        $this->load->model('Commeninfo');
        $this->load->model('Clothtypeinfo');
	    $result['menuaccess']=$this->Commeninfo->Getmenuprivilege();
		$this->load->view('clothtype', $result);
	}
    public function Clothtypeinsertupdate(){
		$this->load->model('Clothtypeinfo');
        $result=$this->Clothtypeinfo->Clothtypeinsertupdate();
	}
    public function Clothtypestatus($x, $y){
		$this->load->model('Clothtypeinfo');
        $result=$this->Clothtypeinfo->Clothtypestatus($x, $y);
	}
    public function Clothtypeedit(){
		$this->load->model('Clothtypeinfo');
        $result=$this->Clothtypeinfo->Clothtypeedit();
	}
}