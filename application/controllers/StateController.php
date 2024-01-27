<?php
    class StateController extends CI_Controller {
        public function index()
        {
            $file['data'] = $this->db->get('state')->result();
            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('State/showState', $file);
        }

        //--------------status-----------------
        public function status($id){
            $this->db->where('state_id', $id);
            $data = $this->db->get('state')->row();
            if($data->state_status == "Unblocked")
            {
                $up = array(
                    "state_status" => "Blocked"
                );
            }
            else{
                $up = array(
                    "state_status" => "Unblocked"
                );
            }
            $this->db->where('state_id', $id);
            $this->db->update('state', $up);
            $this->index();
        }

        //---------------delete---------------
        public function delete($delid){
            $this->db->where('state_id',$delid);
            $this->db->delete('state');
            $this->index();
        }

        //===============add=================
        //===================================
        //===================================
        public function addForm(){
            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('State/addState');
        }

        public function cinsert(){
            $this->load->model('StateModel');
            $this->StateModel->minsert();
            $this->index();
        }

        //=============cedit=================
        //===================================
        public function cedit($editid){
            $this->load->model('StateModel');
            $file['editData'] = $this->StateModel->medit($editid);

            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('State/updateState', $file);
        }

        public function cupdate($upid){
            $this->load->model('StateModel');
            $this->StateModel->mupdate($upid);
            redirect('StateController/');
        }
    }
?>