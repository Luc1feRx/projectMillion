<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>


<?php
    class product
    {
        private $db;
        private $format;

        public function __construct(){
            $this->db = new Database();
            $this->format = new Format();
        }

        public function insert_product($data){
            $productName = mysqli_real_escape_string($this->db->connect, $data['productName']);
            $price = mysqli_real_escape_string($this->db->connect, $data['price']);
            $cate_ids = $data['cate_id'];
            $brand_id = mysqli_real_escape_string($this->db->connect, $data['brand_id']);
            $short_desc = mysqli_real_escape_string($this->db->connect, $data['short_desc']);
            $status = mysqli_real_escape_string($this->db->connect, $data['status']);
            $model = mysqli_real_escape_string($this->db->connect, $data['model']);
            $chip = mysqli_real_escape_string($this->db->connect, $data['chip']);
            $ram = mysqli_real_escape_string($this->db->connect, $data['ram']);
            $card = mysqli_real_escape_string($this->db->connect, $data['card']);
            $drive = mysqli_real_escape_string($this->db->connect, $data['drive']);
            $display = mysqli_real_escape_string($this->db->connect, $data['display']);
            $connect = mysqli_real_escape_string($this->db->connect, $data['connect']);
            $vantay = $data['vantay'];
            $operation = mysqli_real_escape_string($this->db->connect, $data['operation']);
            $pin = $data['pin'];
            $weight = $data['weight'];
            $discount = $data['discount'];
            $quantity_product= $data['quantity'];
            $image = mysqli_real_escape_string($this->db->connect, $data['image']);
            $image2 = mysqli_real_escape_string($this->db->connect, $data['file']);
            $content = mysqli_real_escape_string($this->db->connect, $data['content']);
            $title = mysqli_real_escape_string($this->db->connect, $data['title']);
            if(empty($productName) || empty($price) || empty($short_desc) || empty($status) || empty($model) || empty($chip) || empty($ram)){
                $alert = "<div class='error'>Fields must be not empty!!</div>";
                return $alert;
            }else{
                $sql = "insert into product (name,price,brand_id,short_desc,status,model,chip,ram,card,drive,display,connect,vantay,operation,pin,weight,discount, quantity_product, image) VALUES('$productName','$price','$brand_id','$short_desc','$status','$model','$chip','$ram','$card','$drive','$display','$connect','$vantay','$operation'
                ,'$pin','$weight','$discount','$quantity_product','$image')";
                $result = $this->db->Insert($sql);

                $select = "SELECT id FROM product where name = '$productName'";
                $result1 = $this->db->Select($select);
                while($row = $result1->fetch_assoc()){
                    $ID = $row['id'];
                }

                $sql1 = "INSERT INTO product_details (product_id,img,content,title) VALUES ('$ID','$image2','$content','$title')";
                $result2 = $this->db->Insert($sql1);

                //insert category
                foreach ($cate_ids as $cate_id){
                    $query2 = "INSERT INTO cate_product (product_id,cate_id) VALUES ('$ID','$cate_id')";
                    $result3 = $this->db->Insert($query2);
                }

                if($result){
                    $alert = "<div class='success'>Add Successfully!!</div>";
                    return $alert;
                }else{
                    $alert = "<div class='error'>Failed to add product!!</div>";
                    return $alert;
                }

            }
        }

        public function show_products(){
			$query = "SELECT * FROM product";
			$result = $this->db->select($query);
			return $result;
		}


    //     public function show_list_category(){
    //         $sql = "select * from category order by id desc";
    //         $result = $this->db->Select($sql);
    //         return $result;
    //     }

    //     public function update_category($cateName, $id){
    //         $cateName = $this->format->validation($cateName);

    //         $cateName = mysqli_real_escape_string($this->db->connect, $cateName);
    //         if(empty($cateName)){
    //             $alert = "<div class='error'>Category must be not empty!!</div>";
    //             return $alert;
    //         }else{
    //             $sql = "UPDATE category SET name = '$cateName' WHERE id = '$id'";
    //             $result = $this->db->Update($sql);
    //             if($result){
    //                 $alert = "<div class='success'>Update Successfully!!</div>";
    //                 return $alert;
    //             }else{
    //                 $alert = "<div class='error'>Failed to update category!!</div>";
    //                 return $alert;
    //             }

    //         }
    //     }

    //     public function delete_category($id){
    //         $sql = "DELETE FROM category WHERE id = '$id'";
    //             $result = $this->db->Delete($sql);
    //             if($result){
    //                 $alert = "<div class='success'>Delete Successfully!!</div>";
    //                 return $alert;
    //             }else{
    //                 $alert = "<div class='error'>Failed to Delete category!!</div>";
    //                 return $alert;
    //             }
    //     }

    //     public function getcatebyId($id){
	// 		$query = "SELECT * FROM category where id = '$id'";
	// 		$result = $this->db->select($query);
	// 		return $result;
	// 	}
    }
    
?>