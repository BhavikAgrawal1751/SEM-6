<?php
    class CityModel extends CI_Model{
        public function minsert(){
            $id = $this->input->post('stateId');
            $name = $this->input->post('cityName');
            
            $ins = array(
                "state_id" => $id,
                "city_name" => $name,
            );

            $this->db->insert('city', $ins);
        }
    }
?>