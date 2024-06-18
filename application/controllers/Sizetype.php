<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Colombo');

class Sizetype extends CI_Controller {
    public function index(){
        $this->load->model('Commeninfo');
       /* $this->load->model('Sizetypeinfo');*/
	    $result['menuaccess']=$this->Commeninfo->Getmenuprivilege();
		$this->load->view('sizetype', $result);
	}
    public function Sizetypeinsertupdate(){
		$this->load->model('Sizetypeinfo');
        $result=$this->Sizetypeinfo->Sizetypeinsertupdate();
	}
    public function Sizetypestatus($x, $y){
		$this->load->model('Sizetypeinfo');
        $result=$this->Sizetypeinfo->Sizetypestatus($x, $y);
	}
    public function Sizetypeedit(){
		$this->load->model('Sizetypeinfo');
        $result=$this->Sizetypeinfo->Sizetypeedit();
	}
}