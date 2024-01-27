<?php
    class MovieModel extends CI_Model{
        public function minsert(){
            $indId = $this->input->post('indId');
            $catId = $this->input->post('catId');
            $multId = $this->input->post('multId');
            $moName = $this->input->post('moName');
            $moCast = $this->input->post('moCast');
            $moPrice = $this->input->post('moPrice');
            $moRating = $this->input->post('moRating');
            $moExp = $this->input->post('moExp');
            $stat = $this->input->post('stat');
            $moDesc = $this->input->post('moDesc');
            $moPost = $this->input->post('moPost');
            $moImg = $this->input->post('moImg');
            $moRevi = $this->input->post('moRevi');
            $moTrailer = $this->input->post('moTrailer');
            $moLang = $this->input->post('moLang');
            $scr = $this->input->post('scr');
            $moDura = $this->input->post('moDura');
            
            $ins = array(
                "industry_id" => $indId,
                "category_id" => $catId,
                "multiplex_id" => $multId,
                "movie_name" => $moName,
                "movie_cast" => $moCast,
                "movie_price" => $moPrice,
                "movie_rating" => $moRating,
                "movie_experience" => $moExp,
                "status" => $stat,
                "movie_description" => $moDesc,
                "movie_poster" => $moPost,
                "movie_images" => $moImg,
                "movie_review" => $moRevi,
                "movie_trailer" => $moTrailer,
                "movie_language" => $moLang,
                "screen" => $scr,
                "movie_duration" => $moDura
            );

            $this->db->insert('admin', $ins);
        }

        //================================
        //================================
        public function mgetMovIndustry($movIndustryId){
            $this->db->where('industry_id', $movIndustryId);
            $data = $this->db->get('moviecategory')->result();
            foreach($data as $row) { ?>
                <option value="<?php echo $row->category_id ?>"> <?php echo $row->category_name ?> </option>
            <?php }
        }

        //===============medit================
        //====================================
        public function movieindustryTable($editid){
            return $this->db->get('movieindustry')->result();
        }

        public function moviecategoryTable($editid){
            return $this->db->get('moviecategory')->result();
        }

        public function multiplexTable($editid){
            return $this->db->get('multiplex')->result();
        }

        public function medit($editid){
            $this->db->where('movie_id', $editid);
            return $this->db->get('movie')->row();
        }

        public function mupdate($upid){
            $indId = $this->input->post('indId');
            $catId = $this->input->post('catId');
            $multId = $this->input->post('multId');
            $moName = $this->input->post('moName');
            $moCast = $this->input->post('moCast');
            $moPrice = $this->input->post('moPrice');
            $moRating = $this->input->post('moRating');
            $moExp = $this->input->post('moExp');
            $stat = $this->input->post('stat');
            $moDesc = $this->input->post('moDesc');
            $moPost = $this->input->post('moPost');
            $moImg = $this->input->post('moImg');
            $moRevi = $this->input->post('moRevi');
            $moTrailer = $this->input->post('moTrailer');
            $moLang = $this->input->post('moLang');
            $scr = $this->input->post('scr');
            $moDura = $this->input->post('moDura');
            
            $upData = array(
                "industry_id" => $indId,
                "category_id" => $catId,
                "multiplex_id" => $multId,
                "movie_name" => $moName,
                "movie_cast" => $moCast,
                "movie_price" => $moPrice,
                "movie_rating" => $moRating,
                "movie_experience" => $moExp,
                "status" => $stat,
                "movie_description" => $moDesc,
                "movie_poster" => $moPost,
                "movie_images" => $moImg,
                "movie_review" => $moRevi,
                "movie_trailer" => $moTrailer,
                "movie_language" => $moLang,
                "screen" => $scr,
                "movie_duration" => $moDura
            );
            $this->db->where('movie_id', $upid);
            $this->db->update('movie', $upData);
        }
    }
?>