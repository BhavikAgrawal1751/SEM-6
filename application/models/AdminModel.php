<?php
    class AdminModel extends CI_Model{
        public function minsert(){
            $name = $this->input->post('adminName');
            $address = $this->input->post('adminAddress');
            $zip = $this->input->post('adminZip');
            $email = $this->input->post('adminEmail');
            $pwd = $this->input->post('adminPwd');
            $img = $this->input->post('adminImg');
            $mob = $this->input->post('adminMob');
            
            $ins = array(
                "admin_name" => $name,
                "admin_address" => $address,
                "admin_zip" => $zip,
                "admin_email" => $email,
                "admin_password" => $pwd,
                "admin_profileimg" => $img,
                "admin_mobile" => $mob
            );

            $this->db->insert('admin', $ins);
        }

        //===============edit================
        public function medit($editId){
            $this->db->where('admin_id', $editId);
            return $this->db->get('admin')->row();
        }

        //================mupdate==============
        public function mupdate($upid){
            $name = $this->input->post('adminName');
            $address = $this->input->post('adminAddress');
            $zip = $this->input->post('adminZip');
            $email = $this->input->post('adminEmail');
            $pwd = $this->input->post('adminPwd');
            $img = $this->input->post('adminImg');
            $mob = $this->input->post('adminMob');
            
            $upData = array(
                "admin_name" => $name,
                "admin_address" => $address,
                "admin_zip" => $zip,
                "admin_email" => $email,
                "admin_password" => $pwd,
                "admin_profileimg" => $img,
                "admin_mobile" => $mob
            );

            $this->db->where('admin_id', $upid);
            $this->db->update('admin', $upData);
        }


        //=============checked================
        public function checked()
        {
            $delete_id=$this->input->post('delete_id');
            $count=count($delete_id);
            for($i=0;$i<$count;$i++)
            {
                $this->db->where('admin_id', $delete_id[$i]);
                $this->db->delete('admin');
            }
        }
    }
?>