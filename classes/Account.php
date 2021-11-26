<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>


<?php
    class account
    {
        private $db;
        private $format;

        public function __construct(){
            $this->db = new Database();
            $this->format = new Format();
        }

        public function insert_account($fullname, $username, $password, $role_id ){
             $role_id = $this->format->validation($role_id);
            $fullname = $this->format->validation($fullname);
            $username = $this->format->validation($username);
            $password = $this->format->validation($password);

            $role_id = mysqli_real_escape_string($this->db->connect, $role_id);
            $fullname = mysqli_real_escape_string($this->db->connect, $fullname);
            $username = mysqli_real_escape_string($this->db->connect, $username);
            $password = mysqli_real_escape_string($this->db->connect, md5($password));


            if(empty($role_id)|| empty($fullname) || empty($username) || empty($password)){
                $alert = "<div class='error'>Vui lòng điền đầy đủ thông tin!!</div>";
                return $alert;
            }else {
                $usernameExist = $this->db->Select("SELECT * FROM account WHERE username='{$username}'");
                $fullnameExist = $this->db->Select("SELECT * FROM account WHERE fullname='{$fullname}'");
                if($usernameExist){
                    $alert = "<span class='error'>Username đã tồn tại, vui lòng nhập username khác</span>";
                    return $alert;
                }else if($fullnameExist){
                    $alert = "<span class='error'>Tên đã tồn tại, vui lòng nhập Tên khác</span>";
                    return $alert;
                }else{
                    $sql = "INSERT INTO account (fullname, username, password, role_id) VALUES('$fullname','$username', '$password', '$role_id')";
                    $result = $this->db->Insert($sql);
                    if($result){
                        $alert = "<span class='success'>Thêm Tài Khoản Thành Công</span>";
                        return $alert;
                    }else{
                        $alert = "<span class='error'>Thêm Tài Khoản Không Thành Công</span>";
                        return $alert;
                    }
                }
            }
        }   

        public function show_list_account(){
            $sql = "SELECT account.id,account.role_id,roles.name, account.fullname, account.username, account.password from roles, account where account.role_id = roles.id";
			$result = $this->db->Select($sql);
            return $result;
        }

		public function show_account(){
			$query = "SELECT * FROM account order by id desc";
            $result = $this->db->select($query);
			return $result;
		}

        public function update_account($fullname, $username, $password, $role_id, $id){
            $full = $this->format->validation($fullname);
            $user = $this->format->validation($username);
            $pass = $this->format->validation($password);

            $role_ids = mysqli_real_escape_string($this->db->connect, $role_id);
            $full = mysqli_real_escape_string($this->db->connect, $fullname);
            $user = mysqli_real_escape_string($this->db->connect, $username);
            $pass = mysqli_real_escape_string($this->db->connect, $password);

			if($fullname = ""||$username = ""|| $password= ""|| $role_id= ""){
				$alert = "<span class='error'>Vui lòng điền đầy đủ thông tin!!</span>";
				return $alert;
			}else{
				$query = "UPDATE account set fullname = '$full',username = '$user', password='$pass', role_id='$role_ids' WHERE id = '$id'";
				$result = $this->db->Update($query);
				if($result){
					$alert = "<span class='success'>Sửa Tài Khoản Thành Công</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Sửa Tài Khoản Không Thành Công</span>";
					return $alert;
				}
			}
        }

        public function show_accounts(){
			$query = "SELECT * FROM account";
			$result = $this->db->select($query);
			return $result;
		}

        public function delete_Account($id){
            $sql = "DELETE FROM account WHERE id = '$id'";
                $result = $this->db->Delete($sql);
                if($result){
                    $alert = "<div class='success'>Xóa Tài Khoản Thành Công!!!</div>";
                    return $alert;
                }else{
                    $alert = "<div class='error'>Xóa Tài Khoản Không Thành Công!!!</div>";
                    return $alert;
                }
        }

        public function getAccountbyId($id){
			$query = "SELECT * FROM account where id = '$id'" ;
			$result = $this->db->select($query);
			return $result;
		}
        public function getRolesByAccountId($id){
			$query = "SELECT c.id FROM roles c INNER JOIN account p ON c.id= p.role_id WHERE p.id= '$id'";
			$result = $this->db->Select($query);
			return $result;
		}
    }
    
?>