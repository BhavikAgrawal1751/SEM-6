<?php
    class EventController extends CI_Controller {
        public function index()
        {
            $this->db->from('event');
            $this->db->join('eventcategory','eventcategory.eventcategory_id = event.eventcategory_id');
            $this->db->join('eventspeaker','eventspeaker.eventspeaker_id = event.eventspeaker_id');
            $this->db->join('state','state.state_id = event.state_id');
            $this->db->join('city','city.city_id = event.city_id');
            $this->db->join('area','area.area_id = event.area_id');

            $file['data']=$this->db->get()->result();
            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('Event/showEvent', $file);
        }

        //---------------status-----------------
        public function status($id){
            $this->db->where('event_id', $id);
            $data = $this->db->get('event')->row();
            if($data->event_status == "Unblocked")
            {
                $up = array(
                    "event_status" => "Blocked"
                );
            }
            else{
                $up = array(
                    "event_status" => "Unblocked"
                );
            }
            $this->db->where('event_id', $id);
            $this->db->update('event', $up);
            $this->index();
        }

        //=================add=================
        //=====================================
        //=====================================
        public function addForm(){
            $file['eventcategoryData'] = $this->db->get('eventcategory')->result();
            $file['eventspeakerData'] = $this->db->get('eventspeaker')->result();
            $file['stateData'] = $this->db->get('state')->result();
            $file['cityData'] = $this->db->get('city')->result();
            $file['areaData'] = $this->db->get('area')->result();

            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('Event/addEvent', $file);
        }

        public function cinsert(){
            $this->load->model('EventModel');
            $this->EventModel->minsert();
            $this->index();
        }

        //------------------delete------------------
        public function delete($delid){
            $this->db->where('event_id',$delid);
            $this->db->delete('event');
            $this->index();
        }

        //=============getCategory=================
        //==============getState===================
        //===============getCity===================
        public function getCategory($catId){
            $this->load->model('EventModel');
            $this->EventModel->mgetCategory($catId);
        }

        public function getState($stateId){
            $this->load->model('EventModel');
            $this->EventModel->mgetState($stateId);
        }

        public function getCity($cityId){
            $this->load->model('EventModel');
            $this->EventModel->mgetCity($cityId);
        }

        public function cedit($editId){
            $this->load->model('EventModel');
            $file['eventcategoryData'] = $this->EventModel->evCategoryTable();
            $file['eventspeakerData'] = $this->EventModel->evSpeakerTable();
            $file['stateData'] = $this->EventModel->stateTable();
            $file['cityData'] = $this->EventModel->cityTable();
            $file['areaData'] = $this->EventModel->areaTable();
            $file['editData'] = $this->EventModel->medit($editId);

            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('Event/updateEvent', $file);
        }

        public function cupdate($upId){
            $this->load->model('EventModel');
            $this->EventModel->mupdate($upId);
            redirect('EventController/');
        }
    }
?>