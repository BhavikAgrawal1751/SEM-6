<?php
    class FBBookingChkoutModel extends CI_Model{
        public function minsert(){
            $fbId = $this->input->post('fbId');
            $userId = $this->input->post('userId');
            $atcId = $this->input->post('atcId');
            $ticBookNum = $this->input->post('ticBookNum');
            
            $ins = array(
                "foodbeverage_id" => $fbId,
                "user_id" => $userId,
                "atc_id" => $atcId,
                "ticketbooking_number" => $ticBookNum
            );

            $this->db->insert('fbbookingchkout', $ins);
        }
    }
?>