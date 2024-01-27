<?php
    class UserRegistrationModel extends CI_Model{
        public function minsert(){
            $userName = $this->input->post('userName');
            $userEmail = $this->input->post('userEmail');
            $userMobile = $this->input->post('userMobile');
            $userPwd = $this->input->post('userPwd');
            
            $ins = array(
                "username" => $userName,
                "useremail" => $userEmail,
                "usermobile" => $userMobile,
                "userpassword" => $userPwd
            );

            $this->db->insert('userregistration', $ins);
        }
    }
?>