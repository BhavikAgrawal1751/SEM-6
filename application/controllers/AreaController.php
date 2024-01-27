<?php
    class AreaController extends CI_Controller {
        public function index()
        {
            $this->db->from('area');
            $this->db->join('state','state.state_id = area.state_id');
            $this->db->join('city','city.city_id = area.city_id');

            $file['data']=$this->db->get()->result();
            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('Area/showArea', $file);
        }

        // ---------------status-------------
        public function status($id){
            $this->db->where('area_id', $id);
            $data = $this->db->get('area')->row();
            if($data->area_status == "Unblocked")
            {
                $up = array(
                    "area_status" => "Blocked"
                );
            }
            else{
                $up = array(
                    "area_status" => "Unblocked"
                );
            }
            $this->db->where('area_id', $id);
            $this->db->update('area', $up);
            $this->index();
        }

        //-------------------delete----------------
        public function delete($delid){
            $this->db->where('area_id',$delid);
            $this->db->delete('area');
            $this->index();
        }

        // ================add================
        //====================================
        //====================================
        public function addForm(){
            $file['stateData'] = $this->db->get('state')->result();
            $file['cityData'] = $this->db->get('city')->result();
            
            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('Area/addArea', $file);
        }

        public function cinsert(){
            $this->load->model('AreaModel');
            $this->AreaModel->minsert();
            $this->index();
        }

        //==============getState================
        //======================================
        //======================================
        public function getState($stateId){
            $this->load->model('AreaModel');
            $this->AreaModel->mgetState($stateId);
        }

        // =====================edit=====================
        //=====================update=====================
        public function cedit($editId){
            $this->load->model('AreaModel');
            $file['stateData'] = $this->AreaModel->stateTable();
            $file['cityData'] = $this->AreaModel->cityTable();
            $file['editData'] = $this->AreaModel->medit($editId);
            
            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('Area/updateArea', $file);
        }
            
        public function cupdate($upid){
            $this->load->model('AreaModel');
            $this->AreaModel->mupdate($upid);
            redirect('AreaController/');
        }
    }
?>