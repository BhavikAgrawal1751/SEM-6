<?php
    class MovieTicketBookingController extends CI_Controller {
        public function index()
        {
            $this->db->from('movieticketbooking');
            $this->db->join('movie','movie.movie_id = movieticketbooking.movie_id');
            $this->db->join('multiplex','multiplex.multiplex_id = movieticketbooking.multiplex_id');
            $this->db->join('movieticketplan','movieticketplan.movieticket_id = movieticketbooking.movieticket_id');
            $this->db->join('movieseatplan','movieseatplan.seatplan_id = movieticketbooking.seatplan_id');

            $file['data']=$this->db->get()->result();
            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('MovieTicketBooking/showMovieTicketBooking', $file);
        }

        //-----------------status-------------------
        public function status($id){
            $this->db->where('ticketbooking_id', $id);
            $data = $this->db->get('movieticketbooking')->row();
            if($data->ticketbooking_status == "Unblocked")
            {
                $up = array(
                    "ticketbooking_status" => "Blocked"
                );
            }
            else{
                $up = array(
                    "ticketbooking_status" => "Unblocked"
                );
            }
            $this->db->where('ticketbooking_id', $id);
            $this->db->update('movieticketbooking', $up);
            $this->index();
        }

        //-------------------delete----------------------
        public function delete($delid){
            $this->db->where('ticketbooking_id',$delid);
            $this->db->delete('movieticketbooking');
            $this->index();
        }

        //================add===================
        //======================================
        //======================================
        public function addForm(){
            $file['movieData'] = $this->db->get('movie')->result();
            $file['multiplexData'] = $this->db->get('multiplex')->result();
            $file['movieticketplanData'] = $this->db->get('movieticketplan')->result();
            $file['movieseatplanData'] = $this->db->get('movieseatplan')->result();

            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('MovieTicketBooking/addMovieTicketBooking', $file);
        }

        public function cinsert(){
            $this->load->model('MovieTicketBookingModel');
            $this->MovieTicketBookingModel->minsert();
            $this->index();
        }


        //=============getMovie=============
        public function getMovie($movieId){
            $this->load->model('MovieTicketBookingModel');
            $this->MovieTicketBookingModel->mgetMovie($movieId);
        }
    }
?>