<?php
    class SportsModel extends CI_Model{
        public function minsert(){
            $stateId = $this->input->post('stateId');
            $cityId = $this->input->post('cityId');
            $areaId = $this->input->post('areaId');
            $sprTitle = $this->input->post('sprTitle');
            $sprAddress = $this->input->post('sprAddress');
            $sprTrailer = $this->input->post('sprTrailer');
            $sprCategory = $this->input->post('sprCategory');
            $sprDetails = $this->input->post('sprDetails');
            $sprPrice = $this->input->post('sprPrice');
            $sprImages = $this->input->post('sprImages');
            $sprDate = $this->input->post('sprDate');
            
            $ins = array(
                "state_id" => $stateId,
                "city_id" => $cityId,
                "area_id" => $areaId,
                "sports_title" => $sprTitle,
                "sports_address" => $sprAddress,
                "sports_trailer" => $sprTrailer,
                "sports_category" => $sprCategory,
                "sports_details" => $sprDetails,
                "sportsticket_price" => $sprPrice,
                "sports_images" => $sprImages,
                "sports_date" => $sprDate
            );

            $this->db->insert('sports', $ins);
        }

        //==============================
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

        //==================medit=================
        //========================================
        public function medit($editid){
            $this->db->where('sports_id', $editid);
            return $this->db->get('sports')->row();
        }

        public function stateTable($editid){
            return $this->db->get('state')->result();
        }

        public function cityTable($editid){
            return $this->db->get('city')->result();
        }

        public function areaTable($editid){
            return $this->db->get('area')->result();
        }

        public function mupdate($upid){
            $stateId = $this->input->post('stateId');
            $cityId = $this->input->post('cityId');
            $areaId = $this->input->post('areaId');
            $sprTitle = $this->input->post('sprTitle');
            $sprAddress = $this->input->post('sprAddress');
            $sprTrailer = $this->input->post('sprTrailer');
            $sprCategory = $this->input->post('sprCategory');
            $sprDetails = $this->input->post('sprDetails');
            $sprPrice = $this->input->post('sprPrice');
            $sprImages = $this->input->post('sprImages');
            $sprDate = $this->input->post('sprDate');
            
            $upData = array(
                "state_id" => $stateId,
                "city_id" => $cityId,
                "area_id" => $areaId,
                "sports_title" => $sprTitle,
                "sports_address" => $sprAddress,
                "sports_trailer" => $sprTrailer,
                "sports_category" => $sprCategory,
                "sports_details" => $sprDetails,
                "sportsticket_price" => $sprPrice,
                "sports_images" => $sprImages,
                "sports_date" => $sprDate
            );

            $this->db->where('sports_id', $upid);
            $this->db->update('sports', $upData);
        }
    }
?>