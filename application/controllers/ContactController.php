<?php
    class ContactController extends CI_Controller {
        public function index()
        {
            $file['data']=$this->db->get('contact')->result();
            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('Contact/showContact', $file);
        }

        //----------------status----------------
        public function status($id){
            $this->db->where('contact_id', $id);
            $data = $this->db->get('contact')->row();
            if($data->contact_status == "Unblocked")
            {
                $up = array(
                    "contact_status" => "Blocked"
                );
            }
            else{
                $up = array(
                    "contact_status" => "Unblocked"
                );
            }
            $this->db->where('contact_id', $id);
            $this->db->update('contact', $up);
            $this->index();
        }

        //----------------delete---------------
        public function delete($delid){
            $this->db->where('contact_id',$delid);
            $this->db->delete('contact');
            $this->index();
        }

        //---------------add------------------
        public function addForm(){
            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('Contact/addContact');
        }

        public function cinsert(){
            $this->load->model('ContactModel');
            $this->ContactModel->minsert();
            $this->index();
        }
    }
?>