<?php
    class FoodBeverageBookingModel extends CI_Model{
        public function minsert(){
            $fbname = $this->input->post('fbname');
            $fbprice = $this->input->post('fbprice');
            $fbimg = $this->input->post('fbimg');
            
            $ins = array(
                "foodbeverage_name" => $fbname,
                "foodbeverage_price" => $fbprice,
                "foodbeverage_image" => $fbimg,
            );

            $this->db->insert('foodbeveragebooking', $ins);
        }
    }
?>