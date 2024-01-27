<?php
    class StateModel extends CI_Model{
        public function minsert(){
            $stateName = $this->input->post('stateName');
            $ins = array(
                "state_name" => $stateName
            );
            $this->db->insert('state', $ins);
        }

        public function medit($editid){
            $this->db->where('state_id', $editid);
            return $this->db->get('state')->row();
        }

        public function mupdate($upid){
            $stateName = $this->input->post('stateName');
            $upData = array(
                "state_name" => $stateName
            );
            $this->db->where('state_id', $upid);
            $this->db->update('state', $upData);
        }
    }
?>