<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Colombo');

class Colourtype extends CI_Controller {
    public function index(){
        $this->load->model('Commeninfo');
        $this->load->model('Colourtypeinfo');
	    $result['menuaccess']=$this->Commeninfo->Getmenuprivilege();
		$this->load->view('colourtype', $result);
	}
    public function Colourtypeinsertupdate(){
		$this->load->model('Colourtypeinfo');
        $result=$this->Colourtypeinfo->Colourtypeinsertupdate();
	}
    public function Colourtypestatus($x, $y){
		$this->load->model('Colourtypeinfo');
        $result=$this->Colourtypeinfo->Colourtypestatus($x, $y);
	}
    public function Colourtypeedit(){
		$this->load->model('Colourtypeinfo');
        $result=$this->Colourtypeinfo->Colourtypeedit();
	}
}