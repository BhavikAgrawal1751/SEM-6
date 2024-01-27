<?php
    class FBAddToCartModel extends CI_Model{
        public function minsert(){
            $fbId = $this->input->post('fbId');
            $ticBookNo = $this->input->post('ticBookNo');
            $quantity = $this->input->post('quantity');
            $totAmount = $this->input->post('totAmount');
            
            $ins = array(
                "foodbeverage_id" => $fbId,
                "ticketbooking_number" => $ticBookNo,
                "quantity" => $quantity,
                "totalamount" => $totAmount
            );

            $this->db->insert('fbaddtocart', $ins);
        }
    }
?>