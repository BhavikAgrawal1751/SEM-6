<?php
    class MultiplexController extends CI_Controller {
        public function index()
        {
            $this->db->from('multiplex');
            $this->db->join('state','state.state_id = multiplex.state_id');
            $this->db->join('city','city.city_id = multiplex.city_id');
            $this->db->join('area','area.area_id = multiplex.area_id');

            $file['data']=$this->db->get()->result();
            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('Multiplex/showMultiplex', $file);
        }

        //----------------status-------------------
        public function status($id){
            $this->db->where('multiplex_id', $id);
            $data = $this->db->get('multiplex')->row();
            if($data->multiplex_status == "Unblocked")
            {
                $up = array(
                    "multiplex_status" => "Blocked"
                );
            }
            else{
                $up = array(
                    "multiplex_status" => "Unblocked"
                );
            }
            $this->db->where('multiplex_id', $id);
            $this->db->update('multiplex', $up);
            $this->index();
        }

        //-----------------delete-----------------
        public function delete($delid){
            $this->db->where('multiplex_id',$delid);
            $this->db->delete('multiplex');
            $this->index();
        }

        //=================add===================
        //=======================================
        //=======================================
        public function addForm(){
            $this->load->model('MultiplexModel');
            $file = $this->MultiplexModel->getAllData();

            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('Multiplex/addMultiplex',$file);
        }

        public function cinsert(){
            $this->load->model('MultiplexModel');
            $this->MultiplexModel->minsert();
            $this->index();
        }

        
        //===============getState==============
        public function getState($stateId){
            $this->load->model('MultiplexModel');
            $this->MultiplexModel->mgetState($stateId);
        }

        public function getCity($cityId){
            $this->load->model('EventModel');
            $this->EventModel->mgetCity($cityId);
        }    
        
        //================cedit=================
        //======================================
        public function cedit($editid){
            $this->load->model('MultiplexModel');
            $file['editData'] = $this->MultiplexModel->medit($editid);
            $file['stateData'] = $this->MultiplexModel->stateTable($editid);
            $file['cityData'] = $this->MultiplexModel->cityTable($editid);
            $file['areaData'] = $this->MultiplexModel->areaTable($editid);

            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('Multiplex/updateMultiplex', $file);
        }

        public function cupdate($upid){
            $this->load->model('MultiplexModel');
            $this->MultiplexModel->mupdate($upid);
            redirect('MultiplexController/');
        }
    }
?>