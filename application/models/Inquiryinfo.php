<?php
class Inquiryinfo extends CI_Model{
    public function Inquiryinsertupdate(){
        $this->db->trans_begin();

        $userID=$_SESSION['userid'];

        $tbl_customer_idtbl_customer=$this->input->post('tbl_customer_idtbl_customer');
        $tbl_cloth_idtbl_cloth=$this->input->post('tbl_cloth_idtbl_cloth');
        $tbl_material_idtbl_material=$this->input->post('tbl_material_idtbl_material');
        $tbl_size_idtbl_size=$this->input->post('tbl_size_idtbl_size');
        $tbl_colour_idtbl_colour=$this->input->post('tbl_colour_idtbl_colour');

      
        $recordOption=$this->input->post('recordOption');
        if(!empty($this->input->post('recordID'))){$recordID=$this->input->post('recordID');}

        $insertdatetime=date('Y-m-d H:i:s');

        if($recordOption==1){
            $data = array(
                'tbl_customer_idtbl_customer'=> $tbl_customer_idtbl_customer,
                'tbl_cloth_idtbl_cloth'=> $tbl_cloth_idtbl_cloth, 
                'tbl_material_idtbl_material'=> $tbl_material_idtbl_material, 
                'tbl_size_idtbl_size '=> $tbl_size_idtbl_size, 
                'tbl_colour_idtbl_colour'=> $tbl_colour_idtbl_colour,
                'status'=> '1', 
                'insertdatetime'=> $insertdatetime, 
                'tbl_user_idtbl_user'=> $userID,
            );

            $this->db->insert('tbl_inquiry', $data);

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
                redirect('Inquiry');                
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
                redirect('Inquiry');
            }
        }
        else{
            $data = array(
                'tbl_customer_idtbl_customer'=> $tbl_customer_idtbl_customer,
                'tbl_cloth_idtbl_cloth'=> $tbl_cloth_idtbl_cloth, 
                'tbl_material_idtbl_material'=> $tbl_material_idtbl_material, 
                'tbl_size_idtbl_size '=> $tbl_size_idtbl_size, 
                'tbl_colour_idtbl_colour'=> $tbl_colour_idtbl_colour,
                'status'=> '1', 
                'insertdatetime'=> $insertdatetime,                
                'tbl_user_idtbl_user'=> $userID,
            );

            $this->db->where('idtbl_inquiry', $recordID);
            $this->db->update('tbl_inquiry', $data);

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
                redirect('Inquiry');                
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
                redirect('Inquiry');
            }
        }
    }
    public function Inquirystatus($x, $y){
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

			$this->db->where('idtbl_inquiry', $recordID);
            $this->db->update('tbl_inquiry', $data);

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
                redirect('Inquiry');                
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
                redirect('Inquiry');
            }
        }
        else if($type==2){
            $data = array(
                'status'=> '2', 
                'updatedatetime'=> $updatedatetime, 
                'tbl_user_idtbl_user'=> $userID,
            );

			$this->db->where('idtbl_inquiry', $recordID);
            $this->db->update('tbl_inquiry', $data);

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
                redirect('Inquiry');                
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
                redirect('Inquiry');
            }
        }
        else if($type==3){
			$data = array( 
                'status'=> '3', 
                'updatedatetime'=> $updatedatetime, 
                'tbl_user_idtbl_user'=> $userID,
            );

			$this->db->where('idtbl_inquiry', $recordID);
            $this->db->update('tbl_inquiry', $data);

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
                redirect('Inquiry');                
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
                redirect('Inquiry');
            }
        }
    }
    public function Inquiryedit(){
        $recordID=$this->input->post('recordID');

        $this->db->select('*');
        $this->db->from('tbl_inquiry');
        $this->db->where('idtbl_inquiry', $recordID);
        $this->db->where('status', 1);

        $respond=$this->db->get();

        $obj=new stdClass();
        $obj->id=$respond->row(0)->idtbl_inquiry;
        $obj->tbl_customer_idtbl_customer=$respond->row(0)->tbl_customer_idtbl_customer;
        $obj->tbl_cloth_idtbl_cloth=$respond->row(0)->tbl_cloth_idtbl_cloth;
        $obj->tbl_material_idtbl_material=$respond->row(0)->tbl_material_idtbl_material;
        $obj->tbl_size_idtbl_size=$respond->row(0)->tbl_size_idtbl_size;
        $obj->tbl_colour_idtbl_colour=$respond->row(0)->tbl_colour_idtbl_colour;

        echo json_encode($obj);
    }

    public function GetInquiryList(){
        $this->db->select('idtbl_inquiry, tbl_customer_idtbl_customer, tbl_cloth_idtbl_cloth, tbl_material_idtbl_material, tbl_size_idtbl_size, tbl_colour_idtbl_colour');
        $this->db->from('tbl_inquiry');
        $this->db->where('status', 1);

        return $respond=$this->db->get();
    }

    public function Getcustomername(){
        $this->db->select('idtbl_customer, name');
        $this->db->from('tbl_customer');
        $this->db->where('status', 1);

        return $respond=$this->db->get();
    }

    public function Getclothtype(){
        $this->db->select('idtbl_cloth, type');
        $this->db->from('tbl_cloth');
        $this->db->where('status', 1);

        return $respond=$this->db->get();
    }

    public function Getmaterialtype(){
        $this->db->select('idtbl_material, type');
        $this->db->from('tbl_material');
        $this->db->where('status', 1);

        return $respond=$this->db->get();
    }

    public function Getsizetype(){
        $this->db->select('idtbl_size, type');
        $this->db->from('tbl_size');
        $this->db->where('status', 1);

        return $respond=$this->db->get();
    }

    public function Getcolourtype(){
        $this->db->select('idtbl_colour, type');
        $this->db->from('tbl_colour');
        $this->db->where('status', 1);

        return $respond=$this->db->get();
    }
}
