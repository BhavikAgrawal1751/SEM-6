<?php
    class EventModel extends CI_Model{
        public function minsert(){
            $evCatId = $this->input->post('evCatId');
            $evSpeakId = $this->input->post('evSpeakId');
            $title = $this->input->post('eventTitle');
            $trailer = $this->input->post('eventTrailer');
            $price = $this->input->post('eventPrice');
            $img = $this->input->post('eventImage');
            $descrip = $this->input->post('eventDescription');
            $type = $this->input->post('eventType');
            $add = $this->input->post('eventAddress');
            $date = $this->input->post('eventDate');
            $stateId = $this->input->post('stateId');
            $cityId = $this->input->post('cityId');
            $areaId = $this->input->post('areaId');
            
            $ins = array(
                "eventcategory_id" => $evCatId,
                "eventspeaker_id" => $evSpeakId,
                "event_title" => $title,
                "event_trailer" => $trailer,
                "event_price" => $price,
                "event_images" => $img,
                "event_description" => $descrip,
                "event_type" => $type,
                "event_address" => $add,
                "event_date" => $date,
                "state_id" => $stateId,
                "city_id" => $cityId,
                "area_id" => $areaId
            );

            $this->db->insert('event', $ins);
        }

        //===========================================
        //===========================================
        //===========================================
        public function mgetCategory($catId){
            $this->db->where('eventcategory_id',$catId);
            $data = $this->db->get('eventspeaker')->result();
            foreach($data as $row) { ?>
                <option value="<?php echo $row->eventspeaker_id ?>"> <?php echo $row->eventspeaker_name ?></option>
            <?php }
        }

        public function mgetState($stateId){
            $this->db->where('state_id',$stateId);
            $data = $this->db->get('city')->result();
            foreach($data as $row) { ?>
                <option value="<?php echo $row->city_id ?>"> <?php echo $row->city_name ?></option>
            <?php }
        }

        public function mgetCity($cityId){
            $this->db->where('city_id', $cityId);
            $data = $this->db->get('area')->result();
            foreach($data as $row) { ?>
                <option value="<?php echo $row->area_id ?>"> <?php echo $row->area_name ?></option>
            <?php }
        }

        //=====================================
        //=====================================
        public function evCategoryTable(){
            return $this->db->get('eventcategory')->result();
        }

        public function evSpeakerTable(){
            return $this->db->get('eventspeaker')->result();
        }

        public function stateTable(){
            return $this->db->get('state')->result();
        }

        public function cityTable(){
            return $this->db->get('city')->result();
        }

        public function areaTable(){
            return $this->db->get('area')->result();
        }

        public function medit($editId){
            $this->db->where('event_id', $editId);
            return $this->db->get('event')->row();
        }

        public function mupdate($upid){
            $evCatId = $this->input->post('evCatId');
            $evSpeakId = $this->input->post('evSpeakId');
            $title = $this->input->post('eventTitle');
            $trailer = $this->input->post('eventTrailer');
            $price = $this->input->post('eventPrice');
            $img = $this->input->post('eventImage');
            $descrip = $this->input->post('eventDescription');
            $type = $this->input->post('eventType');
            $add = $this->input->post('eventAddress');
            $date = $this->input->post('eventDate');
            $stateId = $this->input->post('stateId');
            $cityId = $this->input->post('cityId');
            $areaId = $this->input->post('areaId');
            
            $upData = array(
                "eventcategory_id" => $evCatId,
                "eventspeaker_id" => $evSpeakId,
                "event_title" => $title,
                "event_trailer" => $trailer,
                "event_price" => $price,
                "event_images" => $img,
                "event_description" => $descrip,
                "event_type" => $type,
                "event_address" => $add,
                "event_date" => $date,
                "state_id" => $stateId,
                "city_id" => $cityId,
                "area_id" => $areaId
            );

            $this->db->where('event_id', $upid);
            $this->db->update('event', $upData);
        }
    }
?>