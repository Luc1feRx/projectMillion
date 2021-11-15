<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>


<?php
    class Account
    {
        private $db;
        private $format;

        public function __construct(){
            $this->db = new Database();
            $this->format = new Format();
        }

        public function insert_account($data){
            
            $fullname = mysqli_real_escape_string($this->db->connect, $data['fullname']);
            $username = mysqli_real_escape_string($this->db->connect, $data['username']);
            $role_id = mysqli_real_escape_string($this->db->connect, $data['role_id']);
            $password = mysqli_real_escape_string($this->db->connect, $data['password']);
			if($fullname = ""||$username = ""|| $phone = ""|| $address = ""|| $password= ""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				$query = "INSERT INTO account(fullname, username,role_id, password) VALUES('$fullname','$username','$role_id', '$password')";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Insert account Successfully</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Insert account Not Success</span>";
					return $alert;
				}
			}
        }

        // public function show_list_account(){
        //     $sql = "SELECT * FROM account order by id desc";
		// 	$result = $this->db->Select($sql);
        //     return $result;
        // }

		// public function show_account(){
		// 	$query = "select account.id,account.fullname,account.username,account.password,account.created_at,roles.name from account join roles on roles.id=account.role_id order by id desc";
        //     $result = $this->db->select($query);
		// 	return $result;
		// }

        public function update_account($data, $id){
            
            $fullname = mysqli_real_escape_string($this->db->connect, $data['fullname']);
            $username = mysqli_real_escape_string($this->db->connect, $data['username']);
            $phone = mysqli_real_escape_string($this->db->connect, $data['phone']);
            $address = mysqli_real_escape_string($this->db->connect, $data['address']);
            $password = mysqli_real_escape_string($this->db->connect, $data['password']);
            $role_id = mysqli_real_escape_string($this->db->connect, $data['role_id']);
			if($fullname = ""||$username = ""|| $phone = ""|| $address = ""|| $password= ""|| $role_id= ""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				$query = "UPDATE account set fullname = '$fullname',username = '$username',phone='$phone', address='$address', password='$password',role_id='$password' Where id = $id";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Update Account Successfully</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Update Account Not Success</span>";
					return $alert;
				}
			}
        }

        public function delete_Account($id){
            $sql = "DELETE FROM account WHERE id = '$id'";
                $result = $this->db->Delete($sql);
                if($result){
                    $alert = "<div class='success'>Delete Successfully!!</div>";
                    return $alert;
                }else{
                    $alert = "<div class='error'>Failed to Delete Account!!</div>";
                    return $alert;
                }
        }

        public function getAccountbyId($id){
			$query = "SELECT fullname FROM account where id = '$id'";
			$result = $this->db->select($query);
			return $result;
		}

        public function getAccount(){
			$query = "SELECT * FROM roles";
			$result = $this->db->Select($query);
			return $result;
		}
    }
    
?>