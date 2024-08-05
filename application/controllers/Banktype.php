<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Colombo');

class Banktype extends CI_Controller {
    public function index(){
        $this->load->model('Commeninfo');
       /* $this->load->model('Banktypeinfo');*/
	    $result['menuaccess']=$this->Commeninfo->Getmenuprivilege();
		$this->load->view('banktype', $result);
	}
    public function Banktypeinsertupdate(){
		$this->load->model('Banktypeinfo');
        $result=$this->Banktypeinfo->Banktypeinsertupdate();
	}
    public function Banktypestatus($x, $y){
		$this->load->model('Banktypeinfo');
        $result=$this->Banktypeinfo->Banktypestatus($x, $y);
	}
    public function Banktypeedit(){
		$this->load->model('Banktypeinfo');
        $result=$this->Banktypeinfo->Banktypeedit();
	}
}