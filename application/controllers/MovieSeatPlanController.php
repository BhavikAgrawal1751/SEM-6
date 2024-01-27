<?php
    class MovieSeatPlanController extends CI_Controller {
        public function index()
        {
            $this->db->from('movieseatplan');
            $this->db->join('movieticketplan','movieticketplan.movieticket_id = movieseatplan.movieticket_id');
            $this->db->join('movie','movie.movie_id = movieseatplan.movie_id');

            $file['data']=$this->db->get()->result();
            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('MovieSeatPlan/showMovieSeatPlan', $file);
        }

        //---------------status--------------------
        public function status($id){
            $this->db->where('seatplan_id', $id);
            $data = $this->db->get('movieseatplan')->row();
            if($data->seatplan_status == "Unblocked")
            {
                $up = array(
                    "seatplan_status" => "Blocked"
                );
            }
            else{
                $up = array(
                    "seatplan_status" => "Unblocked"
                );
            }
            $this->db->where('seatplan_id', $id);
            $this->db->update('movieseatplan', $up);
            $this->index();
        }

        //---------------delete-------------------
        public function delete($delid){
            $this->db->where('seatplan_id',$delid);
            $this->db->delete('movieseatplan');
            $this->index();
        }

        //==============add=================
        //==================================
        //==================================
        public function addForm(){
            $file['movieticketplanData'] = $this->db->get('movieticketplan')->result();
            $file['movieData'] = $this->db->get('movie')->result();

            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('MovieSeatPlan/addMovieSeatPlan', $file);
        }

        public function cinsert(){
            $this->load->model('MovieSeatPlanModel');
            $this->MovieSeatPlanModel->minsert();
            $this->index();
        }

        //================cedit================
        //=====================================
        public function cedit($editid){
            $this->load->model('MovieSeatPlanModel');
            $file['editData'] = $this->MovieSeatPlanModel->medit($editid);
            $file['movieticketplanData'] = $this->MovieSeatPlanModel->movieticketplanTable($editid);
            $file['movieData'] = $this->MovieSeatPlanModel->movieTable($editid);

            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('MovieSeatPlan/updateMovieSeatPlan', $file);
        }

        public function cupdate($upid){
            $this->load->model('MovieSeatPlanModel');
            $this->MovieSeatPlanModel->mupdate($upid);
            redirect('MovieSeatPlanController/');
        }
    }
?>