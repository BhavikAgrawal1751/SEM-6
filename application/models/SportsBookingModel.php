<?php
    class SportsBookingModel extends CI_Model{
        public function minsert(){
            $sportId = $this->input->post('sportId');
            $cusName = $this->input->post('cusName');
            $cusEmail = $this->input->post('cusEmail');
            $cusMobile = $this->input->post('cusMobile');
            $tickType = $this->input->post('tickType');
            $tickQuantity = $this->input->post('tickQuantity');
            $totalAm = $this->input->post('totalAm');
            
            $ins = array(
                "sports_id" => $sportId,
                "customer_name" => $cusName,
                "customer_email" => $cusEmail,
                "customer_mobile" => $cusMobile,
                "ticket_type" => $tickType,
                "ticket_quantity" => $tickQuantity,
                "totalamount" => $totalAm
            );

            $this->db->insert('sportsbooking', $ins);
        }

        //================medit==================
        //=======================================
        public function medit($editid){
            $this->db->where('sportsbooking_id', $editid);
            return $this->db->get('sportsbooking')->row();
        }

        public function sportsTable($editid){
            return $this->db->get('sports')->result();
        }

        public function mupdate($upid){
            $sportId = $this->input->post('sportId');
            $cusName = $this->input->post('cusName');
            $cusEmail = $this->input->post('cusEmail');
            $cusMobile = $this->input->post('cusMobile');
            $tickType = $this->input->post('tickType');
            $tickQuantity = $this->input->post('tickQuantity');
            $totalAm = $this->input->post('totalAm');
            
            $upData = array(
                "sports_id" => $sportId,
                "customer_name" => $cusName,
                "customer_email" => $cusEmail,
                "customer_mobile" => $cusMobile,
                "ticket_type" => $tickType,
                "ticket_quantity" => $tickQuantity,
                "totalamount" => $totalAm
            );

            $this->db->where('sportsbooking_id', $editid);
            $this->db->update('sportsbooking', $upData);
        }
    }
?>