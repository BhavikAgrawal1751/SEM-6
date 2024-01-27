<?php
    class MovieCategoryController extends CI_Controller {
        public function index()
        {
            $this->db->from('moviecategory');
            $this->db->join('movieindustry','movieindustry.industry_id = moviecategory.industry_id');

            $file['data']=$this->db->get()->result();
            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('MovieCategory/showMovieCategory', $file);
        }

        //----------------status-------------------
        public function status($id){
            $this->db->where('category_id', $id);
            $data = $this->db->get('moviecategory')->row();
            if($data->category_status == "Unblocked")
            {
                $up = array(
                    "category_status" => "Blocked"
                );
            }
            else{
                $up = array(
                    "category_status" => "Unblocked"
                );
            }
            $this->db->where('category_id', $id);
            $this->db->update('moviecategory', $up);
            $this->index();
        }

        //------------------delete--------------------
        public function delete($delid){
            $this->db->where('category_id',$delid);
            $this->db->delete('moviecategory');
            $this->index();
        }

        //==============add=================
        //==================================
        //==================================
        public function addForm(){
            $file['movieindustryData'] = $this->db->get('movieindustry')->result();

            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('MovieCategory/addMovieCategory',$file);
        }

        public function cinsert(){
            $this->load->model('MovieCategoryModel');
            $this->MovieCategoryModel->minsert();
            $this->index();
        }

        //================cedit=====================
        //==========================================
        public function cedit($editid){
            $this->load->model('MovieCategoryModel');
            $file['movieindustryData'] = $this->MovieCategoryModel->movieindustryTable($editid);
            $file['editData'] = $this->MovieCategoryModel->medit($editid);

            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('MovieCategory/updateMovieCategory',$file);
        }

        public function cupdate($upid){
            $this->load->model('MovieCategoryModel');
            $this->MovieCategoryModel->mupdate($upid);
            redirect('MovieCategoryController/');
        }
    }
?>