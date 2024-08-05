<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Colombo');

class Orderdetail extends CI_Controller {
    public function index(){
        $this->load->model('Commeninfo');
        $this->load->model('Orderdetailinfo');
		$result['menuaccess']=$this->Commeninfo->Getmenuprivilege();
        $result['Quotationid']=$this->Orderdetailinfo->GetQuotationid();
        // $result['Clothtype'] = $this->Orderdetailinfo->Getclothtype($z,$y);
		// $result['Customername'] = $this->Orderdetailinfo->Getcustomer($z,$y);	
		// $result['getid'] = $this->Orderdetailinfo->Getid($z,$y);
		$this->load->view('orderdetail', $result);
	}
    public function Orderdetailinsertupdate(){
		$this->load->model('Orderdetailinfo');
        $result=$this->Orderdetailinfo->Orderdetailinsertupdate();
	}
	public function PaymentDetailInsertUpdate(){
		$this->load->model('Orderdetailinfo');
        $result=$this->Orderdetailinfo->PaymentDetailInsertUpdate();
	}
    public function Orderdetailupload(){
		$this->load->model('Orderdetailinfo');
        $result=$this->Orderdetailinfo->Orderdetailupload();
	}
    public function Orderdetailcheck(){
		$this->load->model('Orderdetailinfo');
        $result=$this->Orderdetailinfo->Orderdetailcheck();
	}
    public function Getinquirydetails(){
		$this->load->model('Orderdetailinfo');
        $result=$this->Orderdetailinfo->Getinquirydetails();
	}
    public function Getcustomer(){		
		$this->load->model('Orderdetailinfo');
		$result=$this->Orderdetailinfo->Getcustomer();		
	}
	public function Getclothtype(){		
		$this->load->model('Orderdetailinfo');
		$result=$this->Orderdetailinfo->Getclothtype();		
	}
	public function Getsizetype(){		
		$this->load->model('Orderdetailinfo');
		$result=$this->Orderdetailinfo->Getsizetype();		
	}
	public function Getbankname(){		
		$this->load->model('Orderdetailinfo');
		$result=$this->Orderdetailinfo->Getbankname();		
	}
	public function GetQuantity(){		
		$this->load->model('Orderdetailinfo');
		$result=$this->Orderdetailinfo->GetQuantity();		
	}
	public function Getmaterialtype(){		
		$this->load->model('Orderdetailinfo');
		$result=$this->Orderdetailinfo->Getmaterialtype();
		echo $result;		
	}
    public function Orderformunitprice(){		
		$this->load->model('Orderdetailinfo');
		$result=$this->Orderdetailinfo->Orderformunitprice();		
	}
	public function Getorderdetails() {
		$inquiryid = $this->input->post('inquiryid');	
		$this->load->model('Orderdetailinfo');
		$order_details = $this->Orderdetailinfo->Getorderdetails($inquiryid);	
		echo json_encode($order_details);
	}
	public function SaveCuttingDetails() {
		$updatedData = $this->input->post('updatedData');
		$updatedData = json_decode($updatedData, true);
	
		if ($updatedData) {
			$this->load->model('Orderdetailinfo');	
			foreach ($updatedData as $item) {
				$this->Orderdetailinfo->updateCuttingQty($item['id'], $item['cuttingQty']);
			}
	
			echo json_encode(['success' => true]);
		} else {
			echo json_encode(['success' => false]);
		}
	}
}