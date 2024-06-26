<?php
class Supplierdetailinfo extends CI_Model{
    public function Supplierdetailinsertupdate(){
        $this->db->trans_begin();

        $userID=$_SESSION['userid'];

        $name=$this->input->post('name');
        $email=$this->input->post('email');
        $contact_1=$this->input->post('contact_1');
        $contact_2=$this->input->post('contact_2');
        $tbl_vender_idtbl_vender=$this->input->post('tbl_vender_idtbl_vender');

      
        $recordOption=$this->input->post('recordOption');
        if(!empty($this->input->post('recordID'))){$recordID=$this->input->post('recordID');}

        $insertdatetime=date('Y-m-d H:i:s');

        if($recordOption==1){
            $data = array(
                'name'=> $name,
                'email'=> $email, 
                'contact_1'=> $contact_1, 
                'contact_2'=> $contact_2, 
                'status'=> '1', 
                'insertdatetime'=> $insertdatetime,
                'tbl_vender_idtbl_vender'=> $tbl_vender_idtbl_vender, 
                'tbl_user_idtbl_user'=> $userID,
            );

            $this->db->insert('tbl_supplier', $data);

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
                redirect('Supplierdetail');                
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
                redirect('Supplierdetail');
            }
        }
        else{
            $data = array(
                'name'=> $name,
                'email'=> $email, 
                'contact_1'=> $contact_1, 
                'contact_2'=> $contact_2, 
                'status'=> '1', 
                'insertdatetime'=> $insertdatetime, 
                'tbl_vender_idtbl_vender'=> $tbl_vender_idtbl_vender,
                'tbl_user_idtbl_user'=> $userID,
            );

            $this->db->where('idtbl_supplier', $recordID);
            $this->db->update('tbl_supplier', $data);

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
                redirect('Supplierdetail');                
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
                redirect('Supplierdetail');
            }
        }
    }
    public function Supplierdetailstatus($x, $y){
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

			$this->db->where('idtbl_supplier', $recordID);
            $this->db->update('tbl_supplier', $data);

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
                redirect('Supplierdetail');                
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
                redirect('Supplierdetail');
            }
        }
        else if($type==2){
            $data = array(
                'status'=> '2', 
                'updatedatetime'=> $updatedatetime, 
                'tbl_user_idtbl_user'=> $userID,
            );

			$this->db->where('idtbl_supplier', $recordID);
            $this->db->update('tbl_supplier', $data);

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
                redirect('Supplierdetail');                
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
                redirect('Supplierdetail');
            }
        }
        else if($type==3){
			$data = array( 
                'status'=> '3', 
                'updatedatetime'=> $updatedatetime, 
                'tbl_user_idtbl_user'=> $userID,
            );

			$this->db->where('idtbl_supplier', $recordID);
            $this->db->update('tbl_supplier', $data);

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
                redirect('Supplierdetail');                
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
                redirect('Supplierdetail');
            }
        }
    }
    public function Supplierdetailedit(){
        $recordID=$this->input->post('recordID');

        $this->db->select('*');
        $this->db->from('tbl_supplier');
        $this->db->where('idtbl_supplier', $recordID);
        $this->db->where('status', 1);

        $respond=$this->db->get();

        $obj=new stdClass();
        $obj->id=$respond->row(0)->idtbl_supplier;
        $obj->name=$respond->row(0)->name;
        $obj->email=$respond->row(0)->email;
        $obj->contact_1=$respond->row(0)->contact_1;
        $obj->contact_2=$respond->row(0)->contact_2;
        $obj->tbl_vender_idtbl_vender=$respond->row(0)->tbl_vender_idtbl_vender;

        echo json_encode($obj);
    }

    public function GetSupplierdetailList(){
        $this->db->select('idtbl_supplier, name, email, contact_1, contact_2, tbl_vender_idtbl_vender');
        $this->db->from('tbl_supplier');
        $this->db->where('status', 1);

        return $respond=$this->db->get();
    }

    public function GetSuppliertype(){
        $this->db->select('idtbl_vender, type');
        $this->db->from('tbl_vender');
        $this->db->where('status', 1);

        return $respond=$this->db->get();
    }
}
