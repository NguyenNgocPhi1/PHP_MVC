<?php
     $filepath = realpath(dirname(__FILE__));
     include_once ($filepath.'/../lib/database.php');
     include_once ($filepath.'/../helpers/format.php');
?>
<?php
    class cart
    {
        private $db;
        private $fm;
        function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function add_to_cart($quantity,$id){
            $quantity = $this->fm->validation($quantity);
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $id = mysqli_real_escape_string($this->db->link, $id);
            $sid = session_id();

            $query = "select * from tbl_product where productid = '$id'";
            $result = $this->db->select($query)->fetch_assoc();

            $image = $result['image'];
            $price = $result['price'];
            $productname = $result['productname'];
            $checkcart = "SELECT * FROM tbl_cart WHERE productid = '$id' AND sid = '$sid' ";
 			$check_cart = $this->db->select($checkcart);
 				if($check_cart){
 					$alert = "<span>product already added</span>";
 					return $alert;
 				}
                else{
                    $query1 = "insert into tbl_cart(productid,quantity,sid,image,price,productname) 
                                values('$id','$quantity','$sid','$image','$price','$productname')";
                    $insert = $this->db->insert($query1);
                    if($insert){
                        header('location:shoping-cart.php');
                    }else{
                        header('location:404.php');
                    }
                }
                
            
        }
        public function get_product_cart(){
            $sid = session_id();
            $query = "select * from tbl_cart where sid = '$sid'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_quantity_cart($quantity, $cartid){
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $cartid = mysqli_real_escape_string($this->db->link, $cartid);
            $query = "update tbl_cart set quantity = '$quantity' where cartid = '$cartid'";
            $result = $this->db->update($query);
            if($result){
                header('location:shoping-cart.php');
            }else{
                $msg = "<span class='error'>Product Quantity Updated Not Successfully</span>";
                return $msg;
            }
        }
        public function delete_cart($cartid){
            $cartid = mysqli_real_escape_string($this->db->link, $cartid);
            $query = "delete from tbl_cart where cartid = '$cartid'";
            $result = $this->db->update($query);
            if($result){
                header('location:shoping-cart.php');
            }else{
                $msg = "<span class='error'>Product Quantity Delete Not Successfully</span>";
                return $msg;
            }
        }
        public function check_cart(){
            $sid = session_id();

            $query = "select * from tbl_cart where sid = '$sid'";
            $result = $this->db->select($query);
            return $result;
        }
    }
?>