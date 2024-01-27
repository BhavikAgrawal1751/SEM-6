<?php
    class FoodBeverageBookingController extends CI_Controller {
        public function index()
        {
            $file['data']=$this->db->get('foodbeveragebooking')->result();
            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('FoodBeverageBooking/showFoodBeverageBooking', $file);
        }

        //-----------------status-----------------------
        public function status($id){
            $this->db->where('foodbeverage_id', $id);
            $data = $this->db->get('foodbeveragebooking')->row();
            if($data->foodbeverage_status == "Unblocked")
            {
                $up = array(
                    "foodbeverage_status" => "Blocked"
                );
            }
            else{
                $up = array(
                    "foodbeverage_status" => "Unblocked"
                );
            }
            $this->db->where('foodbeverage_id', $id);
            $this->db->update('foodbeveragebooking', $up);
            $this->index();
        }

        //---------------delete---------------------
        public function delete($delid){
            $this->db->where('foodbeverage_id',$delid);
            $this->db->delete('foodbeveragebooking');
            $this->index();
        }

        //================add===================
        //======================================
        //======================================

        public function addForm(){
            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('FoodBeverageBooking/addFoodBeverageBooking');
        }

        public function cinsert(){
            $this->load->model('FoodBeverageBookingModel');
            $this->FoodBeverageBookingModel->minsert();
            $this->index();
        }
    }
?>