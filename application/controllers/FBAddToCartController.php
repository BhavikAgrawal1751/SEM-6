<?php
    class FBAddToCartController extends CI_Controller {
        public function index()
        {
            $this->db->from('fbaddtocart');
            $this->db->join('foodbeveragebooking','foodbeveragebooking.foodbeverage_id = fbaddtocart.foodbeverage_id');

            $file['data']=$this->db->get()->result();
            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('FBAddToCart/showFBAddToCart', $file);
        }

        //---------------status----------------
        public function status($id){
            $this->db->where('atc_id', $id);
            $data = $this->db->get('fbaddtocart')->row();
            if($data->atc_status == "Unblocked")
            {
                $up = array(
                    "atc_status" => "Blocked"
                );
            }
            else{
                $up = array(
                    "atc_status" => "Unblocked"
                );
            }
            $this->db->where('atc_id', $id);
            $this->db->update('fbaddtocart', $up);
            $this->index();
        }

        //---------------delete------------------
        public function delete($delid){
            $this->db->where('atc_id',$delid);
            $this->db->delete('fbaddtocart');
            $this->index();
        }

        //==============================
        // =============add=============
        //==============================
        public function addForm(){
            $file['foodbeveragebookingData'] = $this->db->get('foodbeveragebooking')->result();

            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('FBAddToCart/addFBAddToCart', $file);
        }

        public function cinsert(){
            $this->load->model('FBAddToCartModel');
            $this->FBAddToCartModel->minsert();
            $this->index();
        }
    }
?>