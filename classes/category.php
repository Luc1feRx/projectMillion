<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>


<?php
    class category
    {
        private $db;
        private $format;

        public function __construct(){
            $this->db = new Database();
            $this->format = new Format();
        }

        public function insert_category($cateName){
            $cateName = $this->format->validation($cateName);

            $cateName = mysqli_real_escape_string($this->db->connect, $cateName);
            if(empty($cateName)){
                $alert = "<div class='error'>Category must be not empty!!</div>";
                return $alert;
            }else{
                $sql = "insert into category (name) values ('$cateName')";
                $result = $this->db->Insert($sql);
                if($result){
                    $alert = "<div class='success'>Add Successfully!!</div>";
                    return $alert;
                }else{
                    $alert = "<div class='error'>Failed to add category!!</div>";
                    return $alert;
                }

            }
        }

        public function show_list_category(){
            $sql = "select * from category order by id desc";
            $result = $this->db->Select($sql);
            return $result;
        }

        public function update_category($cateName, $id){
            $cateName = $this->format->validation($cateName);

            $cateName = mysqli_real_escape_string($this->db->connect, $cateName);
            if(empty($cateName)){
                $alert = "<div class='error'>Category must be not empty!!</div>";
                return $alert;
            }else{
                $sql = "UPDATE category SET name = '$cateName' WHERE id = '$id'";
                $result = $this->db->Update($sql);
                if($result){
                    $alert = "<div class='success'>Update Successfully!!</div>";
                    return $alert;
                }else{
                    $alert = "<div class='error'>Failed to update category!!</div>";
                    return $alert;
                }

            }
        }

        public function delete_category($id){
            $sql = "DELETE FROM category WHERE id = '$id'";
                $result = $this->db->Delete($sql);
                if($result){
                    $alert = "<div class='success'>Delete Successfully!!</div>";
                    return $alert;
                }else{
                    $alert = "<div class='error'>Failed to Delete category!!</div>";
                    return $alert;
                }
        }

        public function getcatebyId($id){
			$query = "SELECT * FROM category where id = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
    }
    
?>