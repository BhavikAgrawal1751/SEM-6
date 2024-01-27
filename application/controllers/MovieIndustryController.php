<?php
    class MovieIndustryController extends CI_Controller {
        public function index()
        {
            $file['data']=$this->db->get('movieindustry')->result();
            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('MovieIndustry/showMovieIndustry', $file);
        }

        //--------------status------------------
        public function status($id){
            $this->db->where('industry_id', $id);
            $data = $this->db->get('movieindustry')->row();
            if($data->industry_status == "Unblocked")
            {
                $up = array(
                    "industry_status" => "Blocked"
                );
            }
            else{
                $up = array(
                    "industry_status" => "Unblocked"
                );
            }
            $this->db->where('industry_id', $id);
            $this->db->update('movieindustry', $up);
            $this->index();
        }

        //-------------delete----------------
        public function delete($delid){
            $this->db->where('industry_id',$delid);
            $this->db->delete('movieindustry');
            $this->index();
        }

        //=============add===============
        //===============================
        //===============================
        public function addForm(){
            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('MovieIndustry/addMovieIndustry');
        }

        public function cinsert(){
            $this->load->model('MovieIndustryModel');
            $this->MovieIndustryModel->minsert();
            $this->index();
        }

        //=============cedit================
        //==================================
        public function cedit($editid){
            $this->load->model('MovieIndustryModel');
            $file['editData'] = $this->MovieIndustryModel->medit($editid);

            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('MovieIndustry/updateMovieIndustry', $file);
        }

        public function cupdate($upid){
            $this->load->model('MovieIndustryModel');
            $this->MovieIndustryModel->mupdate($upid);
            redirect('MovieIndustryController');
        }
    }
?>