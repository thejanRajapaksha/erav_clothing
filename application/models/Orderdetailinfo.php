<?php
class Orderdetailinfo extends CI_Model{
    public function Orderdetailinsertupdate(){
        $this->db->trans_begin();

        $userID=$_SESSION['userid'];

        $quantity=$this->input->post('quantity');
        $start_date=$this->input->post('start_date');
        $end_date=$this->input->post('end_date');
        $quotationid=$this->input->post('quotationid');
        $tbl_inquiry_idtbl_inquiry=$this->input->post('inquiryid');
        $tbl_size_idtbl_size=$this->input->post('sizeid');
        $tbl_colour_idtbl_colour=$this->input->post('colourid');
      
        $recordOption=$this->input->post('recordOption');
        if(!empty($this->input->post('recordID'))){$recordID=$this->input->post('recordID');}

        $insertdatetime=date('Y-m-d H:i:s');

        if($recordOption==1){
            $data = array(
                'quantity'=> $quantity,
                'start_date'=> $start_date, 
                'end_date'=> $end_date, 
                'tbl_quotation_idtbl_quotation'=> $quotationid, 
                'tbl_inquiry_idtbl_inquiry'=> $tbl_inquiry_idtbl_inquiry, 
                'tbl_size_idtbl_size'=> $tbl_size_idtbl_size, 
                'tbl_colour_idtbl_colour'=> $tbl_colour_idtbl_colour, 
                'status'=> '1', 
                'insertdatetime'=> $insertdatetime,
                'tbl_user_idtbl_user'=> $userID,
            );

            $this->db->insert('tbl_order', $data);

            $this->db->trans_complete();

            if ($this->db->trans_status() === TRUE) {
                $this->db->trans_commit();
                
                $actionObj=new stdClass();
                $actionObj->icon='fas fa-save';
                $actionObj->title='';
                $actionObj->message='Record Added Successfully';
                $actionObj->url='';
                $actionObj->target='_blank';
                $actionObj->type='success';

                $actionJSON=json_encode($actionObj);
                
                $this->session->set_flashdata('msg', $actionJSON);
                redirect('Orderdetail');                
            } else {
                $this->db->trans_rollback();

                $actionObj=new stdClass();
                $actionObj->icon='fas fa-warning';
                $actionObj->title='';
                $actionObj->message='Record Error';
                $actionObj->url='';
                $actionObj->target='_blank';
                $actionObj->type='danger';

                $actionJSON=json_encode($actionObj);
                
                $this->session->set_flashdata('msg', $actionJSON);
                redirect('Orderdetail');
            }
        }
        else{
            $data = array(
                'quantity'=> $quantity,
                'start_date'=> $start_date, 
                'end_date'=> $end_date, 
                'tbl_quotation_idtbl_quotation'=> $quotationid, 
                'tbl_inquiry_idtbl_inquiry'=> $tbl_inquiry_idtbl_inquiry, 
                'tbl_size_idtbl_size'=> $tbl_size_idtbl_size, 
                'tbl_colour_idtbl_colour'=> $tbl_colour_idtbl_colour, 
                'status'=> '1', 
                'insertdatetime'=> $insertdatetime,
                'tbl_user_idtbl_user'=> $userID,
            );

            $this->db->where('idtbl_order', $recordID);
            $this->db->update('tbl_order', $data);

            $this->db->trans_complete();

            if ($this->db->trans_status() === TRUE) {
                $this->db->trans_commit();
                
                $actionObj=new stdClass();
                $actionObj->icon='fas fa-save';
                $actionObj->title='';
                $actionObj->message='Record Update Successfully';
                $actionObj->url='';
                $actionObj->target='_blank';
                $actionObj->type='primary';

                $actionJSON=json_encode($actionObj);
                
                $this->session->set_flashdata('msg', $actionJSON);
                redirect('Orderdetail');                
            } else {
                $this->db->trans_rollback();

                $actionObj=new stdClass();
                $actionObj->icon='fas fa-warning';
                $actionObj->title='';
                $actionObj->message='Record Error';
                $actionObj->url='';
                $actionObj->target='_blank';
                $actionObj->type='danger';

                $actionJSON=json_encode($actionObj);
                
                $this->session->set_flashdata('msg', $actionJSON);
                redirect('Orderdetail');
            }
        }
    }
    public function Orderdetailstatus($x, $y){
        $this->db->trans_begin();

        $userID=$_SESSION['userid'];
        $recordID=$x;
        $type=$y;
        $updatedatetime=date('Y-m-d H:i:s');

        if($type==1){
            $data = array( 
                'status'=> '1', 
                'updatedatetime'=> $updatedatetime, 
                'tbl_user_idtbl_user'=> $userID,
            );

			$this->db->where('idtbl_order', $recordID);
            $this->db->update('tbl_order', $data);

            $this->db->trans_complete();

            if ($this->db->trans_status() === TRUE) {
                $this->db->trans_commit();
                
                $actionObj=new stdClass();
                $actionObj->icon='fas fa-check';
                $actionObj->title='';
                $actionObj->message='Record Activate Successfully';
                $actionObj->url='';
                $actionObj->target='_blank';
                $actionObj->type='success';

                $actionJSON=json_encode($actionObj);
                
                $this->session->set_flashdata('msg', $actionJSON);
                redirect('Orderdetail');                
            } else {
                $this->db->trans_rollback();

                $actionObj=new stdClass();
                $actionObj->icon='fas fa-warning';
                $actionObj->title='';
                $actionObj->message='Record Error';
                $actionObj->url='';
                $actionObj->target='_blank';
                $actionObj->type='danger';

                $actionJSON=json_encode($actionObj);
                
                $this->session->set_flashdata('msg', $actionJSON);
                redirect('Orderdetail');
            }
        }
        else if($type==2){
            $data = array(
                'status'=> '2', 
                'updatedatetime'=> $updatedatetime, 
                'tbl_user_idtbl_user'=> $userID,
            );

			$this->db->where('idtbl_order', $recordID);
            $this->db->update('tbl_order', $data);

            $this->db->trans_complete();

            if ($this->db->trans_status() === TRUE) {
                $this->db->trans_commit();
                
                $actionObj=new stdClass();
                $actionObj->icon='fas fa-times';
                $actionObj->title='';
                $actionObj->message='Record Deactivate Successfully';
                $actionObj->url='';
                $actionObj->target='_blank';
                $actionObj->type='warning';

                $actionJSON=json_encode($actionObj);
                
                $this->session->set_flashdata('msg', $actionJSON);
                redirect('Orderdetail');                
            } else {
                $this->db->trans_rollback();

                $actionObj=new stdClass();
                $actionObj->icon='fas fa-warning';
                $actionObj->title='';
                $actionObj->message='Record Error';
                $actionObj->url='';
                $actionObj->target='_blank';
                $actionObj->type='danger';

                $actionJSON=json_encode($actionObj);
                
                $this->session->set_flashdata('msg', $actionJSON);
                redirect('Orderdetail');
            }
        }
        else if($type==3){
			$data = array( 
                'status'=> '3', 
                'updatedatetime'=> $updatedatetime, 
                'tbl_user_idtbl_user'=> $userID,
            );

			$this->db->where('idtbl_order', $recordID);
            $this->db->update('tbl_order', $data);

            $this->db->trans_complete();

            if ($this->db->trans_status() === TRUE) {
                $this->db->trans_commit();
                
                $actionObj=new stdClass();
                $actionObj->icon='fas fa-trash-alt';
                $actionObj->title='';
                $actionObj->message='Record Remove Successfully';
                $actionObj->url='';
                $actionObj->target='_blank';
                $actionObj->type='danger';

                $actionJSON=json_encode($actionObj);
                
                $this->session->set_flashdata('msg', $actionJSON);
                redirect('Orderdetail');                
            } else {
                $this->db->trans_rollback();

                $actionObj=new stdClass();
                $actionObj->icon='fas fa-warning';
                $actionObj->title='';
                $actionObj->message='Record Error';
                $actionObj->url='';
                $actionObj->target='_blank';
                $actionObj->type='danger';

                $actionJSON=json_encode($actionObj);
                
                $this->session->set_flashdata('msg', $actionJSON);
                redirect('Orderdetail');
            }
        }
    }
    public function Orderdetailedit(){
        $recordID=$this->input->post('recordID');

        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where('idtbl_order', $recordID);
        $this->db->where('status', 1);

        $respond=$this->db->get();

        $obj=new stdClass();
        $obj->id=$respond->row(0)->idtbl_order;
        $obj->quotationid=$respond->row(0)->tbl_quotation_idtbl_quotation;
        $obj->quantity=$respond->row(0)->quantity;
        $obj->start_date=$respond->row(0)->start_date;
        $obj->end_date=$respond->row(0)->end_date;
        $obj->tbl_inquiry_idtbl_inquiry=$respond->row(0)->tbl_inquiry_idtbl_inquiry;
        $obj->tbl_colour_idtbl_colour=$respond->row(0)->tbl_colour_idtbl_colour;
        $obj->tbl_size_idtbl_size=$respond->row(0)->tbl_size_idtbl_size;

        echo json_encode($obj);
    }

    public function Getinquirydetails(){
        $recordID=$this->input->post('recordID');
        
        $this->db->select('tbl_quotation.idtbl_quotation, tbl_quotation.tbl_inquiry_idtbl_inquiry, tbl_inquiry.tbl_colour_idtbl_colour, tbl_inquiry.tbl_size_idtbl_size');
        $this->db->from('tbl_quotation');
        $this->db->join('tbl_inquiry','tbl_inquiry.idtbl_inquiry = tbl_quotation.tbl_inquiry_idtbl_inquiry','right');
        $this->db->where('tbl_inquiry.status', 1);
        $this->db->where('tbl_quotation.idtbl_quotation', $recordID);

        $respond=$this->db->get();

        $obj=new stdClass();
        $obj->idtbl_quotation=$respond->row(0)->idtbl_quotation;
        $obj->tbl_inquiry_idtbl_inquiry=$respond->row(0)->tbl_inquiry_idtbl_inquiry;
        $obj->tbl_colour_idtbl_colour=$respond->row(0)->tbl_colour_idtbl_colour;
        $obj->tbl_size_idtbl_size=$respond->row(0)->tbl_size_idtbl_size;

        echo json_encode($obj);
    }

    public function GetQuotationid(){
        $this->db->select('idtbl_quotation');
        $this->db->from('tbl_quotation');
        $this->db->where('status', 1);

        return $respond=$this->db->get();
    }
    
}
