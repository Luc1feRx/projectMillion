<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>


<?php
    class roles
    {
        private $db;
        private $format;

        public function __construct(){
            $this->db = new Database();
            $this->format = new Format();
        }

        public function insert_roles($rolesName){
            $rolesName = $this->format->validation($rolesName);

            $rolesName = mysqli_real_escape_string($this->db->connect, $rolesName);
            if(empty($rolesName)){
                $alert = "<div class='error'>Roles must be not empty!!</div>";
                return $alert;
            }else{
                $sql = "insert into roles (name) values ('$rolesName')";
                $result = $this->db->Insert($sql);
                if($result){
                    $alert = "<div class='success'>Add Successfully!!</div>";
                    return $alert;
                }else{
                    $alert = "<div class='error'>Failed to add roles!!</div>";
                    return $alert;
                }

            }
        }

        public function show_list_roles(){
            $sql = "select * from roles order by id desc";
            $result = $this->db->Select($sql);
            return $result;
        }

        
        public function getrolesbyId($id){
			$query = "SELECT * FROM roles where id = '$id'";
			$result = $this->db->select($query);
			return $result;
		}

        public function update_roles($rolesName, $id){
            $rolesName = $this->format->validation($rolesName);

            $rolesName = mysqli_real_escape_string($this->db->connect, $rolesName);
            if(empty($rolesName)){
                $alert = "<div class='error'>Category must be not empty!!</div>";
                return $alert;
            }else{
                $sql = "UPDATE roles SET name = '$rolesName' WHERE id = '$id'";
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

        public function delete_roles($id){
            $sql = "DELETE FROM roles WHERE id = '$id'";
                $result = $this->db->Delete($sql);
                if($result){
                    $alert = "<div class='success'>Delete Successfully!!</div>";
                    return $alert;
                }else{
                    $alert = "<div class='error'>Failed to Delete category!!</div>";
                    return $alert;
                }
        }
    }
    
?>