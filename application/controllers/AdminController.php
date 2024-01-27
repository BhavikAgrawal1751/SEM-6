<?php
class AdminController extends CI_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->model('AdminModel');
    }
    public function index()
    {
        $file['data'] = $this->db->get('admin')->result();
        $this->load->view('Template/header');
        $this->load->view('Template/sidebar');
        $this->load->view('Admin/showAdmin', $file);
    }

    // --------------status-----------------
    public function status($id)
    {
        $this->db->where('admin_id', $id);
        $data = $this->db->get('admin')->row();
        if ($data->admin_status == "Unblocked") {
            $up = array(
                "admin_status" => "Blocked"
            );
        } else {
            $up = array(
                "admin_status" => "Unblocked"
            );
        }
        $this->db->where('admin_id', $id);
        $this->db->update('admin', $up);
        $this->index();
    }

    // ----------------delete-----------------
    public function delete($delid)
    {
        $this->db->where('admin_id', $delid);
        $this->db->delete('admin');
        $this->index();
    }

    // =====================edit=====================
    //=====================update=====================
    public function cedit($editId){
        $file['editData'] = $this->AdminModel->medit($editId);
        $this->load->view('Template/header');
        $this->load->view('Template/sidebar');
        $this->load->view('Admin/updateAdmin', $file);
    }

    public function cupdate($upid){
        $this->AdminModel->mupdate($upid);
        redirect('AdminController/');
    }

    // --------------------------------------
    // -----------------add------------------
    // --------------------------------------
    public function addForm()
    {
        $this->load->view('Template/header');
        $this->load->view('Template/sidebar');
        $this->load->view('Admin/addAdmin');
    }

    public function cinsert(){
        $this->load->model('AdminModel');
        $this->AdminModel->minsert();
        $this->index();
    }
    public function check()
    {
        $file['data'] = $this->db->get('admin')->result();
        $this->load->view('Template/header');
        $this->load->view('Template/sidebar');
        $this->load->view('Admin/showAdmin', $file);
    }

    //--------------checked---------------------
    public function checked()
    {
        $this->AdminModel->checked();
        $this->index();
    }
}
