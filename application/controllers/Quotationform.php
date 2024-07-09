<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Colombo');

class Quotationform extends CI_Controller
{	
	public function Getquotation($z,$y)
	{
		$this->load->model('Commeninfo');
		$this->load->model('Quotationforminfo');
		$result['menuaccess'] = $this->Commeninfo->Getmenuprivilege();
		$result['productlst'] = $this->Quotationforminfo->Getproduct($z,$y);
		$result['customerlist'] = $this->Quotationforminfo->Getcustomer($z,$y);	
		$result['getid'] = $this->Quotationforminfo->Getquotationid($z,$y);
		//$result['qcustomer'] = $this->Quotationforminfo->Quotationforminsertupdate();
		$this->load->view('quotationform', $result);
	}
	
	public function Quotationforminsertupdate()
	{	
		$this->load->model('Quotationforminfo');
		$result=$this->Quotationforminfo->Quotationforminsertupdate();	
	}

	public function Quotationformgetcustomer()
	{		
		$this->load->model('Quotationforminfo');
		$result=$this->Quotationforminfo->Quotationformgetcustomer();		
	}

	public function Quotationformmeterial()
	{		
		$this->load->model('Quotationforminfo');
		$result=$this->Quotationforminfo->Quotationformmeterial();
		echo $result;		
	}

	public function Quotationformunitprice()
	{		
		$this->load->model('Quotationforminfo');
		$result=$this->Quotationforminfo->Quotationformunitprice();		
	}
	
	public function Quotationformgetinfodata()
	{		
		$this->load->model('Quotationforminfo');
		$result=$this->Quotationforminfo->Quotationformgetinfodata();
		//  $result['Reasontype']=$this->Inquiryinfo->Getreasontype();
		 echo $result;
	}

	public function Getreasontype()
	{		
		$this->load->model('Quotationforminfo');
		$this->Quotationforminfo->Getreasontype();
	}

	public function Quotationformpdf($x)
	{		
		$this->load->model('Quotationforminfo');
		$result=$this->Quotationforminfo->Quotationformpdf($x);
	}

	public function Quotationformstatus()
	{
		$this->load->model('Quotationforminfo');
		$result = $this->Quotationforminfo->Quotationformstatus();
	}

	public function Quotationformapprovestatus()
	{
		$this->load->model('Quotationforminfo');
		$result = $this->Quotationforminfo->Quotationformapprovestatus();
	}

	public function Quotationformedit()
	{
		$this->load->model('Quotationforminfo');
		$result = $this->Quotationforminfo->Quotationformedit();
	}

	public function Getproductlistimages()
	{
		$this->load->model('Quotationforminfo');
		$result = $this->Quotationforminfo->Getproductlistimages();
		echo $result;
	}

	public function Getproductlistimagesdelete()
	{
		$this->load->model('Quotationforminfo');
		$result = $this->Quotationforminfo->Getproductlistimagesdelete();
		//echo $result;
	}
	
	public function Quotationdetailsedit()
	{
		$this->load->model('Quotationforminfo');
		$result = $this->Quotationforminfo->Quotationdetailsedit();
	}
	
	public function QuotationformDetailsstatus($x, $y)
	{
		$this->load->model('Quotationforminfo');
		$result = $this->Quotationforminfo->QuotationformDetailsstatus($x, $y);
	}
}
