<?php
    class AreaModel extends CI_Model{
        public function minsert(){
            $cid = $this->input->post('cid');
            $sid = $this->input->post('sid');
            $name = $this->input->post('areaName');

            $ins = array(
                "city_id" => $cid,
                "state_id" => $sid,
                "area_name" => $name
            );
            $this->db->insert('area', $ins);
        }


        //===============mgetState=================
        public function mgetState($stateId){
            $this->db->where('state_id', $stateId);
            $data = $this->db->get('city')->result();
            foreach($data as $row) { ?>
                <option value="<?php echo $row->city_id ?>"><?php echo $row->city_name ?></option>
            <?php 
            }
        }

        //===============edit================
        public function stateTable(){
            return $this->db->get('state')->result();
        }

        public function cityTable(){
           return $this->db->get('city')->result();
        }

        public function medit($editId){
            $this->db->where('area_id', $editId);
            return $this->db->get('area')->row();
        }

        //================mupdate==============
        public function mupdate($upid){
            $cid = $this->input->post('cid');
            $sid = $this->input->post('sid');
            $name = $this->input->post('areaName');

            $upData = array(
                "city_id" => $cid,
                "state_id" => $sid,
                "area_name" => $name
            );

            $this->db->where('area_id', $upid);
            $this->db->update('area', $upData);
        }    
    }
?>