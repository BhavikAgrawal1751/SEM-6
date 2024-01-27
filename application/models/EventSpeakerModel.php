<?php
    class EventSpeakerModel extends CI_Model{
        public function minsert(){
            $evCatId = $this->input->post('evCatId');
            $evSpeakName = $this->input->post('evSpeakName');
            $evSpeakPro = $this->input->post('evSpeakPro');
            $img = $this->input->post('evSpeakImg');

            $ins = array(
                "eventcategory_id" => $evCatId,
                "eventspeaker_name" => $evSpeakName,
                "eventspeaker_profession" => $evSpeakPro,
                "eventspeaker_profileimg" => $img
            );

            $this->db->insert('eventspeaker', $ins);
        }

        //==============medit================
        //===================================
        public function eventcategoryTable(){
            return $this->db->get('eventcategory')->result();
        }

        public function medit($editid){
            $this->db->where('eventspeaker_id', $editid);
            return $this->db->get('eventspeaker')->row();
        }

        public function mupdate($upid){
            $evCatId = $this->input->post('evCatId');
            $evSpeakName = $this->input->post('evSpeakName');
            $evSpeakPro = $this->input->post('evSpeakPro');
            $img = $this->input->post('evSpeakImg');

            $upData = array(
                "eventcategory_id" => $evCatId,
                "eventspeaker_name" => $evSpeakName,
                "eventspeaker_profession" => $evSpeakPro,
                "eventspeaker_profileimg" => $img
            );
            $this->db->where('eventspeaker_id', $upid);
            $this->db->update('eventspeaker', $upData);
        }
    }
?>