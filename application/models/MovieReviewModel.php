<?php
    class MovieReviewModel extends CI_Model{
        public function minsert(){
            $userId = $this->input->post('userId');
            $moId = $this->input->post('moId');
            $revDetail = $this->input->post('revDetail');
            
            $ins = array(
                "user_id" => $userId,
                "movie_id" => $moId,
                "review_detail" => $revDetail
            );

            $this->db->insert('moviereview', $ins);
        }
    }
?>