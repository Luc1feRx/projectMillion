<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>


<?php
    class brand
    {
        private $db;
        private $format;

        public function __construct(){
            $this->db = new Database();
            $this->format = new Format();
        }

        public function insert_brand($data){
            
            $brandName = mysqli_real_escape_string($this->db->connect, $data['brandName']);
            $img = mysqli_real_escape_string($this->db->connect, $data['file']);
			if($brandName=="" || $img ==""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				$query = "INSERT INTO brand(name,img) VALUES('$brandName','$img')";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Insert Brand Successfully</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Insert Brand Not Success</span>";
					return $alert;
				}
			}
        }

        public function show_list_brand(){
            $sql = "select * from brand order by id desc";
            $result = $this->db->Select($sql);
            return $result;
        }

        public function update_brand($data, $id){
            
            $brandName = mysqli_real_escape_string($this->db->connect, $data['brandName']);
            $img = mysqli_real_escape_string($this->db->connect, $data['file']);
			if($brandName=="" || $img ==""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				$query = "UPDATE brand SET name = '$brandName', img = '$img' WHERE id = '$id'";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Update Brand Successfully</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Update Brand Not Success</span>";
					return $alert;
				}
			}
        }

        public function delete_brand($id){
            $sql = "DELETE FROM brand WHERE id = '$id'";
                $result = $this->db->Delete($sql);
                if($result){
                    $alert = "<div class='success'>Delete Successfully!!</div>";
                    return $alert;
                }else{
                    $alert = "<div class='error'>Failed to Delete brand!!</div>";
                    return $alert;
                }
        }

        public function getbrandbyId($id){
			$query = "SELECT * FROM brand where id = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
    }
    
?>