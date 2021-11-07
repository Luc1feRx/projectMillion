<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>


<?php
    class slider
    {
        private $db;
        private $format;

        public function __construct(){
            $this->db = new Database();
            $this->format = new Format();
        }

        public function insert_slider($data){
            
            $sliderName = mysqli_real_escape_string($this->db->connect, $data['sliderName']);
            $img = mysqli_real_escape_string($this->db->connect, $data['file']);
			if($sliderName=="" || $img ==""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				$query = "INSERT INTO slider(name,img) VALUES('$sliderName','$img')";
				$result = $this->db->Insert($query);
				if($result){
					$alert = "<span class='success'>Insert slider Successfully</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Insert slider Not Success</span>";
					return $alert;
				}
			}
        }

        public function show_list_slider(){
            $sql = "select * from slider order by id desc";
            $result = $this->db->Select($sql);
            return $result;
        }

		public function show_slider(){
			$query = "SELECT * FROM slider order by id desc";
			$result = $this->db->select($query);
			return $result;
		}

        public function update_slider($data, $id){
            
            $sliderName = mysqli_real_escape_string($this->db->connect, $data['sliderName']);
            $img = mysqli_real_escape_string($this->db->connect, $data['file']);
			if($sliderName=="" || $img ==""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				$query = "UPDATE slider SET name = '$sliderName', img = '$img' WHERE id = '$id'";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Update Slider Successfully</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Update Slider Not Success</span>";
					return $alert;
				}
			}
        }

        public function delete_slider($id){
            $sql = "DELETE FROM slider WHERE id = '$id'";
                $result = $this->db->Delete($sql);
                if($result){
                    $alert = "<div class='success'>Delete Successfully!!</div>";
                    return $alert;
                }else{
                    $alert = "<div class='error'>Failed to Delete slider!!</div>";
                    return $alert;
                }
        }

        public function getSliderbyId($id){
			$query = "SELECT name, img FROM slider where id = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
    }
    
?>