<?php
    class SportsController extends CI_Controller {
        public function index()
        {
            $this->db->from('sports');
            $this->db->join('state','state.state_id = sports.state_id');
            $this->db->join('city','city.city_id = sports.city_id');
            $this->db->join('area','area.area_id = sports.area_id');

            $file['data']=$this->db->get()->result();
            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('Sports/showSports', $file);
        }

        //--------------status-------------------
        public function status($id){
            $this->db->where('sports_id', $id);
            $data = $this->db->get('sports')->row();
            if($data->sports_status == "Unblocked")
            {
                $up = array(
                    "sports_status" => "Blocked"
                );
            }
            else{
                $up = array(
                    "sports_status" => "Unblocked"
                );
            }
            $this->db->where('sports_id', $id);
            $this->db->update('sports', $up);
            $this->index();
        }

        //----------------delete------------------
        public function delete($delid){
            $this->db->where('sports_id',$delid);
            $this->db->delete('sports');
            $this->index();
        }

        //=================add================
        //====================================
        //====================================
        public function addForm(){
            $file['stateData']=$this->db->get('state')->result();
            $file['cityData'] = $this->db->get('city')->result();
            $file['areaData'] = $this->db->get('area')->result();

            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('Sports/addSports', $file);
        }

        public function cinsert(){
            $this->load->model('SportsModel');
            $this->SportsModel->minsert();
            $this->index();
        }

        //====================================
        public function getState($stateId){
            $this->load->model('EventModel');
            $this->EventModel->mgetState($stateId);
        }

        public function getCity($cityId){
            $this->load->model('EventModel');
            $this->EventModel->mgetCity($cityId);
        }
            
        //===============cedit=================
        //=====================================
        public function cedit($editid){
            $this->load->model('SportsModel');
            $file['editData'] = $this->SportsModel->medit($editid);
            $file['stateData'] = $this->SportsModel->stateTable($editid);
            $file['cityData'] = $this->SportsModel->cityTable($editid);
            $file['areaData'] = $this->SportsModel->areaTable($editid);

            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('Sports/updateSports', $file);
        }

        public function cupdate($upid){
            $this->load->model('SportsModel');
            $this->SportsModel->mupdate($upid);
            redirect('SportsController');
        }
    }
?>