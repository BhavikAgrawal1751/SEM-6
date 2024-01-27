<?php
    class MovieCastController extends CI_Controller {
        public function index()
        {
            $this->db->from('moviecast');
            $this->db->join('movie','movie.movie_id = moviecast.movie_id');

            $file['data']=$this->db->get()->result();
            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('MovieCast/showMovieCast', $file);
        }

        //--------------status-----------------
        public function status($id){
            $this->db->where('cast_id', $id);
            $data = $this->db->get('moviecast')->row();
            if($data->cast_status == "Unblocked")
            {
                $up = array(
                    "cast_status" => "Blocked"
                );
            }
            else{
                $up = array(
                    "cast_status" => "Unblocked"
                );
            }
            $this->db->where('cast_id', $id);
            $this->db->update('moviecast', $up);
            $this->index();
        }

        //----------------delete------------------
        public function delete($delid){
            $this->db->where('cast_id',$delid);
            $this->db->delete('moviecast');
            $this->index();
        }

        //===============add=================
        //===================================
        //===================================
        public function addForm(){
            $file['movieData'] = $this->db->get('movie')->result();

            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('MovieCast/addMovieCast',$file);
        }

        public function cinsert(){
            $this->load->model('MovieCastModel');
            $this->MovieCastModel->minsert();
            $this->index();
        }

        //==============cedit================
        //===================================
        public function cedit($editid){
            $this->load->model('MovieCastModel');
            $file['movieData'] = $this->MovieCastModel->movieTable($editid);
            $file['editData'] = $this->MovieCastModel->medit($editid);

            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('MovieCast/updateMovieCast',$file);
        }

        public function cupdate($upid){
            $this->load->model('MovieCastModel');
            $this->MovieCastModel->mupdate($upid);
            redirect('MovieCastController/');
        }
    }
?>