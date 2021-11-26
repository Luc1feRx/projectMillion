<?php
	$filepath = realpath(dirname(__FILE__));
	include ($filepath.'/../lib/session.php');
	Session::checkLogin();
	include_once($filepath.'/../lib/database.php');
	include_once($filepath.'/../helpers/format.php');
?>


<?php
    class adminlogin
    {
        private $db;
        private $format;

        public function __construct(){
            $this->db = new Database();
            $this->format = new Format();
        }

        public function login_admin($username, $password){
            $username = $this->format->validation($username);
            $password = $this->format->validation($password);

            $username = mysqli_real_escape_string($this->db->connect, $username);
            $password = mysqli_real_escape_string($this->db->connect, $password);

            if(empty($username) || empty($password)){
                $alert = "<div class='error'>Username or password not empty!!</div>";
                return $alert;
            }else{
                $sql = "select * from account where username='$username' and password='$password' limit 1";
                $result = $this->db->Select($sql);
                if($result != false){
                    $row = $result->fetch_assoc();
                    Session::set('adminlogin', true);
                    Session::set('id', $row['id']);
                    Session::set('role_id', $row['role_id']);
                    Session::set('username', $row['username']);
                    Session::set('fullname', $row['fullname']);
                    header('location:index.php');
                }else{
                    $alert = "<div class='error'>Username or password not match!!</div>";
                    return $alert;
                }

            }
        }

        public function insert_admin($username, $password, $email, $passwordR){
            $username = $this->format->validation($username);
            $password = $this->format->validation($password);
            $email = $this->format->validation($email);
            $passwordR = $this->format->validation($passwordR);

            $username = mysqli_real_escape_string($this->db->connect, $username);
            $password = mysqli_real_escape_string($this->db->connect, $password);
            $email = mysqli_real_escape_string($this->db->connect, $email);
            $passwordR = mysqli_real_escape_string($this->db->connect, $passwordR);


            if(empty($username) || empty($password) || empty($email) || empty($passwordR)){
                $alert = "<div class='error'>Vui lòng điền đầy đủ thông tin!!</div>";
                return $alert;
            }else if($password == $passwordR){
                $userExist = $this->db->Select("SELECT * FROM account WHERE username='{$username}'");
                $emailExist = $this->db->Select("SELECT * FROM account WHERE email='{$email}'");
                if($userExist){
                    $alert = "<span class='error'>Username đã tồn tại, vui lòng nhập username khác</span>";
                    return $alert;
                }else if($emailExist){
                    $alert = "<span class='error'>Email đã tồn tại, vui lòng nhập Email khác</span>";
                    return $alert;
                }else{
                    $sql = "INSERT INTO account (username, password, email) VALUES('$username', '$password', '$email')";
                    $result = $this->db->Insert($sql);
                    if($result){
                        $alert = "<span class='success'>Thêm Tài Khoản Thành Công</span>";
                        return $alert;
                    }else{
                        $alert = "<span class='error'>Thêm Tài Khoản Không Thành Công</span>";
                        return $alert;
                    }
                }
            }else{
                $alert = "<span class='error'>Mật Khẩu và xác nhận mật khẩu phải giống nhau</span>";
                return $alert;
            }
        }
    }
    
?>