<?php
    class EventSpeakerController extends CI_Controller {
        public function index()
        {
            $this->db->from('eventspeaker');
            $this->db->join('eventcategory','eventcategory.eventcategory_id = eventspeaker.eventcategory_id');

            $file['data']=$this->db->get()->result();
            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('EventSpeaker/showEventSpeaker', $file);
        }

        //===================status================
        public function status($id){
            $this->db->where('eventspeaker_id', $id);
            $data = $this->db->get('eventspeaker')->row();
            if($data->eventspeaker_status == "Unblocked")
            {
                $up = array(
                    "eventspeaker_status" => "Blocked"
                );
            }
            else{
                $up = array(
                    "eventspeaker_status" => "Unblocked"
                );
            }
            $this->db->where('eventspeaker_id', $id);
            $this->db->update('eventspeaker', $up);
            $this->index();
        }

        //===================delete===================
        public function delete($delid){
            $this->db->where('eventspeaker_id',$delid);
            $this->db->delete('eventspeaker');
            $this->index();
        }

        //==================add=====================
        //==========================================
        //==========================================
        public function addForm(){
            $file['eventcategoryData'] = $this->db->get('eventcategory')->result();

            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('EventSpeaker/addEventSpeaker', $file);
        }

        public function cinsert(){
            $this->load->model('EventSpeakerModel');
            $this->EventSpeakerModel->minsert();
            $this->index();
        }


        //=============cedit===============
        //=================================
        public function cedit($editid){
            $this->load->model('EventSpeakerModel');
            $file['eventcategoryData'] = $this->EventSpeakerModel->eventcategoryTable($editid);
            $file['editData'] = $this->EventSpeakerModel->medit($editid);

            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('EventSpeaker/updateEventSpeaker', $file);
        }

        public function cupdate($upid){
            $this->load->model('EventSpeakerModel');
            $this->EventSpeakerModel->mupdate($upid);
            redirect('EventSpeakerController/');
        }
    }
?>