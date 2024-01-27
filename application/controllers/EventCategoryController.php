<?php
    class EventCategoryController extends CI_Controller {
        public function index()
        {
            $file['data']=$this->db->get('EventCategory')->result();
            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('EventCategory/showEventCategory', $file);
        }

        //----------------status------------------
        public function status($id){
            $this->db->where('eventcategory_id', $id);
            $data = $this->db->get('eventcategory')->row();
            if($data->eventcategory_status == "Unblocked")
            {
                $up = array(
                    "eventcategory_status" => "Blocked"
                );
            }
            else{
                $up = array(
                    "eventcategory_status" => "Unblocked"
                );
            }
            $this->db->where('eventcategory_id', $id);
            $this->db->update('eventcategory', $up);
            $this->index();
        }
        
        //------------------delete---------------
        public function delete($delid){
            $this->db->where('eventcategory_id',$delid);
            $this->db->delete('eventcategory');
            $this->index();
        }

        //-----------------add--------------------
        //=========================================
        //=========================================
        public function addForm(){
            $file['eventcategoryData'] = $this->db->get('eventcategory')->result();

            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('EventCategory/addEventCategory', $file);
        }

        public function cinsert(){
            $this->load->model('EventCategoryModel');
            $this->EventCategoryModel->minsert();
            $this->index();
        }

        //=============edit================
        //=================================
        public function cedit($editid){
            $this->load->model('EventCategoryModel');
            $file['editData'] = $this->EventCategoryModel->medit($editid);
            
            $this->load->view('Template/header');
            $this->load->view('Template/sidebar');
            $this->load->view('EventCategory/updateEventCategory', $file);
        }

        public function cupdate($upid){
            $this->load->model('EventCategoryModel');
            $this->EventCategoryModel->mupdate($upid);
            redirect('EventCategoryController/');
        }
    }
?>