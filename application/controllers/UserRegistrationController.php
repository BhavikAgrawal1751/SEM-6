<?php
    class UserRegistrationController extends CI_Controller {
        public function index()
        {
            $file['data']=$this->db->get('userregistration')->result();
            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('UserRegistration/showUserRegistration', $file);
        }

        //----------------status-------------------
        public function status($id){
            $this->db->where('user_id', $id);
            $data = $this->db->get('userregistration')->row();
            if($data->user_status == "Unblocked")
            {
                $up = array(
                    "user_status" => "Blocked"
                );
            }
            else{
                $up = array(
                    "user_status" => "Unblocked"
                );
            }
            $this->db->where('user_id', $id);
            $this->db->update('userregistration', $up);
            $this->index();
        }

        //----------------delete-----------------
        public function delete($delid){
            $this->db->where('user_id',$delid);
            $this->db->delete('userregistration');
            $this->index();
        }

        //================add================
        //===================================
        //===================================
        public function addForm(){
            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('UserRegistration/addUserRegistration');
        }

        public function cinsert(){
            $this->load->model('UserRegistrationModel');
            $this->UserRegistrationModel->minsert();
            $this->index();
        }
    }
?>