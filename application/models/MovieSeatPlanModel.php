<?php
    class MovieSeatPlanModel extends CI_Model{
        public function minsert(){
            $moTicId = $this->input->post('moTicId');
            $moId = $this->input->post('moId');
            $seatName = $this->input->post('seatName');
            $seatPrice = $this->input->post('seatPrice');
            
            $ins = array(
                "movieticket_id" => $moTicId,
                "movie_id" => $moId,
                "seat_name" => $seatName,
                "seatplan_price" => $seatPrice
            );

            $this->db->insert('movieseatplan', $ins);
        }

        //=================medit==============
        //====================================
        public function medit($editid){
            $this->db->where('seatplan_id', $editid);
            return $this->db->get('movieseatplan')->row();
        }

        public function movieticketplanTable($editid){
            return $this->db->get('movieticketplan')->result();
        }

        public function movieTable($editid){
            return $this->db->get('movie')->result();
        }

        public function mupdate($upid){
            $moTicId = $this->input->post('moTicId');
            $moId = $this->input->post('moId');
            $seatName = $this->input->post('seatName');
            $seatPrice = $this->input->post('seatPrice');
            
            $upData = array(
                "movieticket_id" => $moTicId,
                "movie_id" => $moId,
                "seat_name" => $seatName,
                "seatplan_price" => $seatPrice
            );
            $this->db->where('seatplan_id', $upid);
            $this->db->get('movieseatplan', $upData);
        }
    }
?>