<?php
    class MovieReviewController extends CI_Controller {
        public function index()
        {
            $this->db->from('moviereview');
            $this->db->join('userregistration','userregistration.user_id = moviereview.user_id');
            $this->db->join('movie','movie.movie_id = moviereview.movie_id');

            $file['data']=$this->db->get()->result();
            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('MovieReview/showMovieReview', $file);
        }

        //------------delete---------------
        public function delete($delid){
            $this->db->where('review_id',$delid);
            $this->db->delete('moviereview');
            $this->index();
        }

        //==============add================
        //=================================
        //=================================
        public function addForm(){
            $file['userregistrationData'] = $this->db->get('userregistration')->result();
            $file['movieData'] = $this->db->get('movie')->result();

            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('MovieReview/addMovieReview', $file);
        }

        public function cinsert(){
            $this->load->model('MovieReviewModel');
            $this->MovieReviewModel->minsert();
            $this->index();
        }
    }
?>