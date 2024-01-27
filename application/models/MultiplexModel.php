<?php
    class MultiplexModel extends CI_Model{
        public function minsert(){
            $stateId = $this->input->post('stateId');
            $cityId = $this->input->post('cityId');
            $areaId = $this->input->post('areaId');
            $multName = $this->input->post('multName');
            $noOfScreen = $this->input->post('noOfScreen');
            $ins = array(
                "area_id" => $areaId,
                "city_id" => $cityId,
                "state_id" => $stateId,
                "multiplex_name" => $multName,
                "no_of_screen" => $noOfScreen
            );
            $this->db->insert('multiplex', $ins);
        }

        public function getAllData(){
            $file['stateData']=$this->db->get('state')->result();
            $file['cityData'] = $this->db->get('city')->result();
            $file['areaData'] = $this->db->get('area')->result();
            return $file;
        }


        //===============mgetState==================
        public function mgetState($stateId){
            $this->db->where('state_id', $stateId);
            $data = $this->db->get('city')->result();
            foreach($data as $row) { ?>
                <option value="<?php echo $row->city_id ?>"> <?php echo $row->city_name ?> </option>
            <?php }
        }

        public function mgetCity($cityId){
            $this->db->where('city_id', $cityId);
            $data = $this->db->get('area')->result();
            foreach($data as $row) { ?>
            <option value="<?php echo $row->area_id ?>"> <?php echo $row->area_name ?></option>
            <?php }
        }       
        
        //==================medit================
        //=======================================
        public function medit($editid){
            $this->db->where('multiplex_id', $editid);
            return $this->db->get('multiplex')->row();
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
            $multName = $this->input->post('multName');
            $noOfScreen = $this->input->post('noOfScreen');
            $upData = array(
                "area_id" => $areaId,
                "city_id" => $cityId,
                "state_id" => $stateId,
                "multiplex_name" => $multName,
                "no_of_screen" => $noOfScreen
            );
            $this->db->where('multiplex_id', $upid);
            $this->db->update('multiplex', $upData);
        }
    }
?>