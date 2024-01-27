<?php
    class MovieImgModel extends CI_Model{
        public function minsert(){
            $moId = $this->input->post('moId');
            $moImg = $this->input->post('moImg');
            $ins = array(
                "movie_id" => $moId,
                "movieimg" => $moImg
            );
            $this->db->insert('movieimg', $ins);
        }

        //===============medit==================
        //======================================
        public function medit($editid){
            $this->db->where('movieimg_id', $editid);
            return $this->db->get('movieimg')->row();
        }

        public function movieTable($editid){
            return $this->db->get('movie')->result();
        }

        public function mupdate($upid){
            $moId = $this->input->post('moId');
            $moImg = $this->input->post('moImg');
            $upData = array(
                "movie_id" => $moId,
                "movieimg" => $moImg
            );
            $this->db->where('movieimg_id', $upid);
            $this->db->update('movieimg', $upData);
        }
    }
?>