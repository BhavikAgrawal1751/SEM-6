<?php
    class ContactModel extends CI_Model{
        public function minsert(){
            $name = $this->input->post('contactName');
            $email = $this->input->post('contactEmail');
            $sub = $this->input->post('contactSubject');
            $msg = $this->input->post('contactMsg');
            
            $ins = array(
                "contact_name" => $name,
                "contact_email" => $email,
                "contact_subject" => $sub,
                "contact_message" => $msg
            );

            $this->db->insert('contact', $ins);
        }
    }
?>