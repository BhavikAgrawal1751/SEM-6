<?php
    class EventTicketModel extends CI_Model{
        public function minsert(){
            $evSpeakId = $this->input->post('evSpeakId');
            $evCatId = $this->input->post('evCatId');
            $eventId = $this->input->post('eventId');
            $type = $this->input->post('type');
            $totalAm = $this->input->post('totalAm');
            $custName = $this->input->post('custName');
            $custEm = $this->input->post('custEm');
            $custMob = $this->input->post('custMob');
            
            $ins = array(
                "eventspeaker_id" => $evSpeakId,
                "eventcategory_id" => $evCatId,
                "event_id" => $eventId,
                "eventticket_type" => $type,
                "totalamount" => $totalAm,
                "customer_name" => $custName,
                "customer_email" => $custEm,
                "customer_mob" => $custMob
            );

            $this->db->insert('eventticket', $ins);
        }


        //=========================================
        //=========================================
        public function mgetCategory($catId){
            $this->db->where('eventcategory_id', $catId);
            $data = $this->db->get('eventspeaker')->result();
            foreach($data as $row) { ?>
                <option value="<?php echo $row->eventspeaker_id ?>"> <?php echo $row->eventspeaker_name ?> </option>
            <?php }
        }

        public function mgetSpeaker($speakerId){
            $this->db->where('eventspeaker_id', $speakerId);
            $data = $this->db->get('event')->result();
            foreach($data as $row) { ?>
                <option value="<?php echo $row->event_id ?>"> <?php echo $row->event_title ?> </option>
            <?php }
        }   

        //================medit===================
        //========================================
        public function eventcategoryTable($editid){
            return $this->db->get('eventcategory')->result();
        }

        public function eventspeakerTable($editid){
            return $this->db->get('eventspeaker')->result();
        }

        public function eventTable($editid){
            return $this->db->get('event')->result();
        }

        public function medit($editid){
            $this->db->where('eventticket__id', $editid);
            return $this->db->get('eventticket')->row();
        }

        public function mupdate($upid){
            $evSpeakId = $this->input->post('evSpeakId');
            $evCatId = $this->input->post('evCatId');
            $eventId = $this->input->post('eventId');
            $type = $this->input->post('type');
            $totalAm = $this->input->post('totalAm');
            $custName = $this->input->post('custName');
            $custEm = $this->input->post('custEm');
            $custMob = $this->input->post('custMob');
            
            $upData = array(
                "eventspeaker_id" => $evSpeakId,
                "eventcategory_id" => $evCatId,
                "event_id" => $eventId,
                "eventticket_type" => $type,
                "totalamount" => $totalAm,
                "customer_name" => $custName,
                "customer_email" => $custEm,
                "customer_mob" => $custMob
            );
            $this->db->where('eventticket__id', $upid);
            $this->db->update('eventticket', $upData);
        }
    }
?>