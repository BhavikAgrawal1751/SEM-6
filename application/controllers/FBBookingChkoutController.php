<?php
    class FBBookingChkoutController extends CI_Controller {
        public function index()
        {
            $this->db->from('fbbookingchkout');
            $this->db->join('foodbeveragebooking','foodbeveragebooking.foodbeverage_id = fbbookingchkout.foodbeverage_id');
            $this->db->join('userregistration','userregistration.user_id = fbbookingchkout.user_id');
            $this->db->join('fbaddtocart','fbaddtocart.atc_id = fbbookingchkout.atc_id');

            $file['data']=$this->db->get()->result();
            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('FBBookingChkout/showFBBookingChkout', $file);
        }

        //----------------status---------------------
        public function status($id){
            $this->db->where('fbcheckout_id', $id);
            $data = $this->db->get('fbbookingchkout')->row();
            if($data->fbcheckout_status == "Unblocked")
            {
                $up = array(
                    "fbcheckout_status" => "Blocked"
                );
            }
            else{
                $up = array(
                    "fbcheckout_status" => "Unblocked"
                );
            }
            $this->db->where('fbcheckout_id', $id);
            $this->db->update('fbbookingchkout', $up);
            $this->index();
        }

        //---------------------delete----------------------
        public function delete($delid){
            $this->db->where('fbcheckout_id',$delid);
            $this->db->delete('fbbookingchkout');
            $this->index();
        }

        //===============add==================
        //====================================
        //====================================

        public function addform(){
            $file['foodbeveragebookingData'] = $this->db->get('foodbeveragebooking')->result();
            $file['userregistrationData'] = $this->db->get('userregistration')->result();
            $file['fbaddtocartData'] = $this->db->get('fbaddtocart')->result();

            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('FBBookingChkout/addFBBookingChkout', $file);
        }

        public function cinsert(){
            $this->load->model('FBBookingChkoutModel');
            $this->FBBookingChkoutModel->minsert();
            $this->index();
        }
    }
?>