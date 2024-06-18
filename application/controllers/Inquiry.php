<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Colombo');

class Inquiry extends CI_Controller {
    public function index(){
        $this->load->model('Commeninfo');
        $this->load->model('Inquiryinfo');
		$result['menuaccess']=$this->Commeninfo->Getmenuprivilege();
		$result['Customername']=$this->Inquiryinfo->Getcustomername();
		$result['Clothtype']=$this->Inquiryinfo->Getclothtype();
		$result['Materialtype']=$this->Inquiryinfo->Getmaterialtype();
		$result['Sizetype']=$this->Inquiryinfo->Getsizetype();
		$result['Colourtype']=$this->Inquiryinfo->Getcolourtype();
		$this->load->view('inquiry', $result);
	}
    public function Inquiryinsertupdate(){
		$this->load->model('Inquiryinfo');
        $result=$this->Inquiryinfo->Inquiryinsertupdate();
	}
    public function Inquirystatus($x, $y){
		$this->load->model('Inquiryinfo');
        $result=$this->Inquiryinfo->Inquirystatus($x, $y);
	}
    public function Inquiryedit(){
		$this->load->model('Inquiryinfo');
        $result=$this->Inquiryinfo->Inquiryedit();
	}
    public function Inquiryupload(){
		$this->load->model('Inquiryinfo');
        $result=$this->Inquiryinfo->Inquiryupload();
	}
    public function Inquirycheck(){
		$this->load->model('Inquiryinfo');
        $result=$this->Inquiryinfo->Inquirycheck();
	}
}