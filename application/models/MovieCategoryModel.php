<?php
    class MovieCategoryModel extends CI_Model{
        public function minsert(){
            $indId = $this->input->post('indId');
            $moCatName = $this->input->post('moCatName');
            $ins = array(
                "industry_id" => $indId,
                "category_name" => $moCatName
            );
            $this->db->insert('moviecategory', $ins);
        }

        //================medit====================
        //=========================================
        public function medit($editid){
            $this->db->where('category_id', $editid);
            return $this->db->get('moviecategory')->row();
        }

        public function movieindustryTable($editid){
            return $this->db->get('movieindustry')->result();
        }

        public function mupdate($upid){
            $indId = $this->input->post('indId');
            $moCatName = $this->input->post('moCatName');
            $upData = array(
                "industry_id" => $indId,
                "category_name" => $moCatName
            );
            $this->db->where('category_id', $upid);
            $this->db->update('moviecategory', $upData);
        }
    }
?>