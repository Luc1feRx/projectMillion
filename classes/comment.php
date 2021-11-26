<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	/**
	 * 
	 */
	class customer
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function insert_binhluan($data,$id){
			$name = mysqli_real_escape_string($this->db->connect, $data['nameuser']);
			$email = mysqli_real_escape_string($this->db->connect, $data['email']);
			$comment = mysqli_real_escape_string($this->db->connect, $data['comment']);
			$comment_date = date('Y-m-d H:i:s');
			if($name=='' || $email==''|| $comment==''){
				$alert = "<span class='error'>Không để trống các trường</span>";
				return $alert;
			}else{
				$q = "INSERT INTO feedback (nameuser,email,comment,comment_date, product_id) VALUES('".$name."','".$email."','".$comment."','".$comment_date."','".$id."')";
					$result = $this->db->insert($q);
					if($result){
						$alert = "<span class='btn btn-success' style='font-size: 14px ;'>Bình luận đã gửi</span>";
						return $alert;
					}else{
						$alert = "<span class='btn btn-error' style='font-size: 14px ;'>Bình luận không thành công</span>";
						return $alert;
				}
			}
		}
		public function show_comment($id){
			$query = "SELECT * FROM feedback where product_id = '$id' and status = 1 order by id desc";
			$result = $this->db->select($query);
			return $result;
		}

		public function show_list_comment(){
			$query = "SELECT feedback.*, product.name FROM feedback, product where feedback.product_id = product.id order by id desc";
			$result = $this->db->select($query);
			return $result;
		}
		

		
		public function approved($id){
			$id = mysqli_real_escape_string($this->db->connect, $id);
			$query = "UPDATE feedback SET

					status = '1'

					WHERE id = '$id'";
			$result = $this->db->Update($query);
			if($result){
				$msg = "<span class='success'>Update Feedback Successfully</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Update Feedback Not Successfully</span>";
				return $msg;
			}
		}

		public function del_comment($id){
			$id = mysqli_real_escape_string($this->db->connect, $id);
			$query = "DELETE FROM feedback WHERE id = '$id'";
			$result = $this->db->Delete($query);
			if($result){
				$msg = "<span class='success'>Detele Feedback Successfully</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Delete Feedback Not Successfully</span>";
				return $msg;
			}
		}


	}
?>