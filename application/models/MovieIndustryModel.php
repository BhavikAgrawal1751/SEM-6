<?php
    class MovieIndustryModel extends CI_Model{
        public function minsert(){
            $moIndName = $this->input->post('moIndName');
            $ins = array(
                "industry_name" => $moIndName
            );
            $this->db->insert('movieindustry', $ins);
        }

        //================medit===================
        //========================================
        public function medit($editid){
            $this->db->where('industry_id', $editid);
            return $this->db->get('movieindustry')->row();
        }

        public function mupdate($upid){
            $moIndName = $this->input->post('moIndName');
            $upData = array(
                "industry_name" => $moIndName
            );
            $this->db->where('industry_id', $upid);
            $this->db->update('movieindustry', $upData);
        }
    }
?>