<?php
    class MovieTicketPlanModel extends CI_Model{
        public function minsert(){
            $moId = $this->input->post('moId');
            $multId = $this->input->post('multId');
            $moTickTime = $this->input->post('moTickTime');
            $moTickDate = $this->input->post('moTickDate');
            
            $ins = array(
                "movie_id" => $moId,
                "multiplex_id" => $multId,
                "movieticket_time" => $moTickTime,
                "movieticket_date" => $moTickDate
            );

            $this->db->insert('movieticketplan', $ins);
        }

        //=================medit==================
        //========================================
        public function medit($editid){
            $this->db->where('movieticket_id', $editid);
            return $this->db->get('movieticketplan')->row();
        }

        public function movieTable($editid){
            return $this->db->get('movie')->result();
        }

        public function multiplexTable($editid){
            return $this->db->get('multiplex')->result();
        }

        public function mupdate($upid){
            $moId = $this->input->post('moId');
            $multId = $this->input->post('multId');
            $moTickTime = $this->input->post('moTickTime');
            $moTickDate = $this->input->post('moTickDate');
            
            $upData = array(
                "movie_id" => $moId,
                "multiplex_id" => $multId,
                "movieticket_time" => $moTickTime,
                "movieticket_date" => $moTickDate
            );
            $this->db->where('movieticket_id', $upid);
            $this->db->update('movieticketplan', $upData);
        }
    }
?>