<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	/**
	 * 
	 */
	class order
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function insert_Order($data){
            $fullname = mysqli_real_escape_string($this->db->connect, $data['fullname']);
			$email = mysqli_real_escape_string($this->db->connect, $data['email']);
			$phone = mysqli_real_escape_string($this->db->connect, $data['phone']);
			$address = mysqli_real_escape_string($this->db->connect, $data['address']);
			$note = mysqli_real_escape_string($this->db->connect, $data['note']);
			$total_money = $data['total_money'];
			$sql = "insert into `order` (fullname, email, phone, address, note, total_money) values ('$fullname','$email','$phone','$address','$note','$total_money')";
			$set_order = $this->db->Insert($sql);

			$sId = session_id();
			$query = "SELECT * FROM cart WHERE sessionID = '$sId'";
			$get_product = $this->db->Select($query);
			if($get_product){
				while($result1 = $get_product->fetch_assoc()){
					$productid = $result1['productId'];
					$productName = $result1['productName'];
					$quantity = $result1['quantity'];
					$price = $result1['price'] * $quantity;
					$image = $result1['image'];
					$query1 = "select id from `order` where fullname = '$fullname'";
					$get_order = $this->db->Select($query1);
					if($get_order){
						while($result = $get_order->fetch_assoc()){
							$orderid = $result['id'];
							$sql1 = "INSERT INTO order_detail (order_id, product_id, price, quantity, total_money) VALUES ('$orderid','$productid','$price','$quantity','$total_money')";
							$set_order_details = $this->db->Insert($sql1);
						}
					}
				}
			}

            if($set_order){
                $alert = "<div class='btn btn-success'>Đặt Hàng Thành Công</div>";
                return $alert;
            }else{
                $alert = "<div class='btn btn-danger'>Đặt Hàng Không Thành Công</div>";
                return $alert;
            }
		}

		public function show_list_order(){
			$query = "SELECT * FROM `order` order by id desc";
			$result = $this->db->select($query);
			return $result;
		}


		public function show_order_detail($id){
			$query = "SELECT order_detail.*, product.name, product.image from product, order_detail where product.id = order_detail.product_id AND order_detail.order_id = '$id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function show_list_order_customer($id){
			$query = "SELECT * FROM `order` where id = '$id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function show_statistical(){
			$query = "SELECT category.id, category.name, COUNT(*) as 'soluong', MAX(product.price) as 'giacao', MIN(product.price) as 'giathap', AVG(product.price) as 'giatb' FROM category, product WHERE product.cate_id = category.id GROUP BY category.id, category.name";
			$result = $this->db->select($query);
			return $result;
		}
	}
?>