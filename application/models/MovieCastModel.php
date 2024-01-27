<?php
    class MovieCastModel extends CI_Model{
        public function minsert(){
            $moId = $this->input->post('moId');
            $castName = $this->input->post('castName');
            $castImg = $this->input->post('castImg');
            $castPos = $this->input->post('castPos');
            
            $ins = array(
                "movie_id" => $moId,
                "cast_name" => $castName,
                "cast_img" => $castImg,
                "cast_position" => $castPos,
            );

            $this->db->insert('moviecast', $ins);
        }

        //==============medit==============
        //=================================
        public function medit($editid){
            $this->db->where('cast_id', $editid);
            return $this->db->get('moviecast')->row();
        }

        public function movieTable($editid){
            return $this->db->get('movie')->result();
        }

        public function mupdate($upid){
            $moId = $this->input->post('moId');
            $castName = $this->input->post('castName');
            $castImg = $this->input->post('castImg');
            $castPos = $this->input->post('castPos');
            
            $upData = array(
                "movie_id" => $moId,
                "cast_name" => $castName,
                "cast_img" => $castImg,
                "cast_position" => $castPos,
            );
            $this->db->where('cast_id', $upid);
            $this->db->update('moviecast', $upData);
        }
    }
?>