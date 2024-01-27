<?php
    class SportsBookingController extends CI_Controller {
        public function index()
        {
            $this->db->from('sportsbooking');
            $this->db->join('sports','sports.sports_id = sportsbooking.sports_id');

            $file['data']=$this->db->get()->result();
            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('SportsBooking/showSportsBooking', $file);
        }

        //---------------status-----------------
        public function status($id){
            $this->db->where('sportsbooking_id', $id);
            $data = $this->db->get('sportsbooking')->row();
            if($data->sportsbooking_status == "Unblocked")
            {
                $up = array(
                    "sportsbooking_status" => "Blocked"
                );
            }
            else{
                $up = array(
                    "sportsbooking_status" => "Unblocked"
                );
            }
            $this->db->where('sportsbooking_id', $id);
            $this->db->update('sportsbooking', $up);
            $this->index();
        }

        //---------------delete-----------------
        public function delete($delid){
            $this->db->where('sportsbooking_id',$delid);
            $this->db->delete('sportsbooking');
            $this->index();
        }

        //==============add===============
        //================================
        //================================
        public function addForm(){
            $file['sportsData']=$this->db->get('sports')->result();

            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('SportsBooking/addSportsBooking', $file);
        }

        public function cinsert(){
            $this->load->model('SportsBookingModel');
            $this->SportsBookingModel->minsert();
            $this->index();
        }

        //=============cedit===============
        //=================================
        public function cedit($editid){
            $this->load->model('SportsBookingModel');
            $file['editData'] = $this->SportsBookingModel->medit($editid);
            $file['sportsData'] = $this->SportsBookingModel->sportsTable($editid);

            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('SportsBooking/updateSportsBooking', $file);
        }

        public function cupdate($upid){
            $this->load->model('SportsBookingModel');
            $this->SportsBookingModel->mupdate($upid);
            redirect('SportsBookingController/');
        }
    }
?>