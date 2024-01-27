<?php
    class MovieTicketPlanController extends CI_Controller {
        public function index()
        {
            $this->db->from('movieticketplan');
            $this->db->join('movie','movie.movie_id = movieticketplan.movie_id');
            $this->db->join('multiplex','multiplex.multiplex_id = movieticketplan.multiplex_id');

            $file['data']=$this->db->get()->result();
            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('MovieTicketPlan/showMovieTicketPlan', $file);
        }

        //---------------status---------------------
        public function status($id){
            $this->db->where('movieticket_id', $id);
            $data = $this->db->get('movieticketplan')->row();
            if($data->movieticket_status == "Unblocked")
            {
                $up = array(
                    "movieticket_status" => "Blocked"
                );
            }
            else{
                $up = array(
                    "movieticket_status" => "Unblocked"
                );
            }
            $this->db->where('movieticket_id', $id);
            $this->db->update('movieticketplan', $up);
            $this->index();
        }

        //--------------------delete------------------------
        public function delete($delid){
            $this->db->where('movieticket_id',$delid);
            $this->db->delete('movieticketplan');
            $this->index();
        }

        //================add===================
        //======================================
        //======================================
        public function addForm(){
            $file['movieData'] = $this->db->get('movie')->result();
            $file['multiplexData'] = $this->db->get('multiplex')->result();

            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('MovieTicketPlan/addMovieTicketPlan', $file);
        }

        public function cinsert(){
            $this->load->model('MovieTicketPlanModel');
            $this->MovieTicketPlanModel->minsert();
            $this->index();
        }

        //==============cedit=================
        //====================================
        public function cedit($editid){
            $this->load->model('MovieTicketPlanModel');
            $file['editData'] = $this->MovieTicketPlanModel->medit($editid);
            $file['movieData'] = $this->MovieTicketPlanModel->movieTable($editid);
            $file['multiplexData'] = $this->MovieTicketPlanModel->multiplexTable($editid);

            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('MovieTicketPlan/updateMovieTicketPlan', $file);
        }

        public function cupdate($upid){
            $this->load->model('MovieTicketPlanModel');
            $this->MovieTicketPlanModel->mupdate($upid);
            redirect('MovieTicketPlanController/');
        }
    }
?>