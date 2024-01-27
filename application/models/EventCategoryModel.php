<?php
    class EventCategoryModel extends CI_Model{
        public function minsert(){
            $title = $this->input->post('evCatTitle');
            $ins = array(
                "eventcategory_title" => $title,
            );
            $this->db->insert('eventcategory', $ins);
        }

        //===============medit=================
        //=====================================
        public function medit($editid){
            $this->db->where('eventcategory_id', $editid);
            return $this->db->get('eventcategory')->row();
        }

        public function mupdate($upid){
            $title = $this->input->post('evCatTitle');
            $upData = array(
                "eventcategory_title" => $title,
            );
            $this->db->where('eventcategory_id', $upid);
            $this->db->update('eventcategory', $upData);
        }
    }
?>