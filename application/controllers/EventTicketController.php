<?php
    class EventTicketController extends CI_Controller {
        public function index()
        {
            $this->db->from('eventticket');
            $this->db->join('eventspeaker','eventspeaker.eventspeaker_id = eventticket.eventspeaker_id');
            $this->db->join('eventcategory','eventcategory.eventcategory_id = eventticket.eventcategory_id');
            $this->db->join('event','event.event_id = eventticket.event_id');

            $file['data']=$this->db->get()->result();
            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('EventTicket/showEventTicket', $file);
        }

        //==================status================
        public function status($id){
            $this->db->where('eventticket__id', $id);
            $data = $this->db->get('eventticket')->row();
            if($data->eventticket_status == "Unblocked")
            {
                $up = array(
                    "eventticket_status" => "Blocked"
                );
            }
            else{
                $up = array(
                    "eventticket_status" => "Unblocked"
                );
            }
            $this->db->where('eventticket__id', $id);
            $this->db->update('eventticket', $up);
            $this->index();
        }

        //===================delete======================
        public function delete($delid){
            $this->db->where('eventticket__id',$delid);
            $this->db->delete('eventticket');
            $this->index();
        }

        //=================add=====================
        public function addForm(){
            $file['eventspeakerData'] = $this->db->get('eventspeaker')->result();
            $file['eventcategoryData'] = $this->db->get('eventcategory')->result();
            $file['eventData'] = $this->db->get('event')->result();

            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('EventTicket/addEventTicket', $file);
        }

        public function cinsert(){
            $this->load->model('EventTicketModel');
            $this->EventTicketModel->minsert();
            $this->index();
        }

        
        //==============getCategory=============
        //==============getSpeaker==============
        public function getCategory($catId){
            $this->load->model('EventTicketModel');
            $this->EventTicketModel->mgetCategory($catId);
        }

        public function getSpeaker($speakerId){
            $this->load->model('EventTicketModel');
            $this->EventTicketModel->mgetSpeaker($speakerId);
        }

        //===============cedit=================
        //=====================================
        public function cedit($editid){
            $this->load->model('EventTicketModel');
            $file['eventcategoryData'] = $this->EventTicketModel->eventcategoryTable($editid);
            $file['eventspeakerData'] = $this->EventTicketModel->eventspeakerTable($editid);
            $file['eventData'] = $this->EventTicketModel->eventTable($editid);
            $file['editData'] = $this->EventTicketModel->medit($editid);

            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('EventTicket/updateEventTicket', $file);
        }

        public function cupdate($upid){
            $this->load->model('EventTicketModel');
            $this->EventTicketModel->mupdate($upid);
            redirect('EventTicketController/');
        }
    }
?>