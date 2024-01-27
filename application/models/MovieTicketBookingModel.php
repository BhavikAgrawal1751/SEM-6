<?php
    class MovieTicketBookingModel extends CI_Model{
        public function minsert(){
            $moId = $this->input->post('moId');
            $multId = $this->input->post('multId');
            $moTicId = $this->input->post('moTicId');
            $seatPlanID = $this->input->post('seatPlanID');
            $ticBookNo = $this->input->post('ticBookNo');
            $noOfSeats = $this->input->post('noOfSeats');
            $totAm = $this->input->post('totAm');
            $cusName = $this->input->post('cusName');
            $cusEmail = $this->input->post('cusEmail');
            $cusMobile = $this->input->post('cusMobile');
            $pay = $this->input->post('pay');
            
            $ins = array(
                "movie_id" => $moId,
                "multiplex_id" => $multId,
                "movieticket_id" => $moTicId,
                "seatplan_id" => $seatPlanID,
                "ticketbooking_number" => $ticBookNo,
                "no_of_seats" => $noOfSeats,
                "totalamount" => $totAm,
                "customername" => $cusName,
                "customeremail" => $cusEmail,
                "customermobile" => $cusMobile,
                "paymentgateway" => $pay
            );

            $this->db->insert('movieticketbooking', $ins);
        }


        public function mgetMovie($movieId){
            $this->db->where('movie_id', $movieId);
            $data = $this->db->get('multiplex')->result();
            foreach($data as $row) { ?>
                <option value="<?php echo $row->multiplex_id ?>"> <?php echo $row->multiplex_name ?> </option>
            <?php }
        }
    }
?>