<?php
    class MovieImgController extends CI_Controller {
        public function index()
        {
            $this->db->from('movieimg');
            $this->db->join('movie','movie.movie_id = movieimg.movie_id');

            $file['data']=$this->db->get()->result();
            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('MovieImg/showMovieImg', $file);
        }

        //-------------delete----------------
        public function delete($delid){
            $this->db->where('movieimg_id',$delid);
            $this->db->delete('movieimg');
            $this->index();
        }

        //==============add=================
        //==================================
        //==================================
        public function addForm(){
            $file['movieData'] = $this->db->get('movie')->result();

            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('MovieImg/addMovieImg',$file);
        }

        public function cinsert(){
            $this->load->model('MovieImgModel');
            $this->MovieImgModel->minsert();
            $this->index();
        }

        //================cedit=================
        //======================================
        public function cedit($editid){
            $this->load->model('MovieImgModel');
            $file['editData'] = $this->MovieImgModel->medit($editid);
            $file['movieData'] = $this->MovieImgModel->movieTable($editid);

            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('MovieImg/updateMovieImg', $file);
        }

        public function cupdate($upid){
            $this->load->model('MovieImgModel');
            $this->MovieImgModel->mupdate($upid);
            redirect('MovieImgController/');
        }
    }
?>