<?php
    class MovieController extends CI_Controller {
        public function index()
        {
            $this->db->from('movie');
            $this->db->join('movieindustry','movieindustry.industry_id = movie.industry_id');
            $this->db->join('moviecategory','moviecategory.category_id = movie.category_id');
            $this->db->join('multiplex','multiplex.multiplex_id = movie.multiplex_id');

            $file['data']=$this->db->get()->result();
            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('Movie/showMovie', $file);
        }

        //----------------status----------------------
        public function status($id){
            $this->db->where('movie_id', $id);
            $data = $this->db->get('movie')->row();
            if($data->movie_status == "Unblocked")
            {
                $up = array(
                    "movie_status" => "Blocked"
                );
            }
            else{
                $up = array(
                    "movie_status" => "Unblocked"
                );
            }
            $this->db->where('movie_id', $id);
            $this->db->update('movie', $up);
            $this->index();
        }

        //------------------delete-------------------
        public function delete($delid){
            $this->db->where('movie_id',$delid);
            $this->db->delete('movie');
            $this->index();
        }

        //============add=================
        //================================
        //================================
        public function addForm(){
            $file['movieindustryData'] = $this->db->get('movieindustry')->result();
            $file['moviecategoryData'] = $this->db->get('moviecategory')->result();
            $file['multiplexData'] = $this->db->get('multiplex')->result();

            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('Movie/addMovie',$file);
        }

        public function cinsert(){
            $this->load->model('MovieModel');
            $this->MovieModel->minsert();
            $this->index();
        }


        //==================getMovIndustry================
        //==================getMovCategory================
        public function getMovIndustry($movIndustryId){
            $this->load->model('MovieModel');
            $this->MovieModel->mgetMovIndustry($movIndustryId);
        }

        public function getMovCategory($movCategoryId){
            $this->load->model('MovieModel');
            $this->MovieModel->mgetMovCategory($movCategoryId);
        }

        //=============cedit================
        //==================================
        public function cedit($editid){
            $this->load->model('MovieModel');
            $file['movieindustryData'] = $this->MovieModel->movieindustryTable($editid);
            $file['moviecategoryData'] = $this->MovieModel->moviecategoryTable($editid);
            $file['multiplexData'] = $this->MovieModel->multiplexTable($editid);
            $file['editData'] = $this->MovieModel->medit($editid);

            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('Movie/updateMovie', $file);
        }

        public function cupdate($upid){
            $this->load->model('MovieModel');
            $this->MovieModel->mupdate($upid);
            redirect('MovieController/');
        }
    }
?>