<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	class cart {

		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function add_to_cart($id,$soluong){

			$id = mysqli_real_escape_string($this->db->link, $id);
			$sId = session_id();
			$check_cart = "SELECT * FROM chitietdathang WHERE MSHH = '$id' AND sId ='$sId'";
			$result_check_cart = $this->db->select($check_cart);
			if($result_check_cart){
				$msg = "<span class='error'>Sản phẩm đã được thêm vào giỏ hàng</span>";
				return $msg;
			}else{

				$query = "SELECT * FROM hanghoa WHERE MSHH = '$id'";
				$result = $this->db->select($query)->fetch_assoc();
				
				$hinh = $result["Hinh"];
				$gia = $result["Gia"];
				$tenHH = $result["TenHH"];
				$giamgia = 10;
				$query_insert = "INSERT INTO chitietdathang (MSHH,sId,TenHH,Gia,SoLuongHang,Hinh,giamgia) VALUES('$id','$sId','$tenHH','$gia','$soluong','$hinh','$giamgia')";
				$insert_cart = $this->db->insert($query_insert);
				if($insert_cart){
					$msg = "<span class='error'>Thêm sản phẩm thành công</span>";
					return $msg;
				}
			}
			
		}

		public function getAll(){
			$query = "SELECT *FROM chitietdathang";
			$result = $this->db->select($query);
			return $result;
		}

		public function get_product_cart(){
			$sId = session_id();
			$query = "SELECT *FROM chitietdathang WHERE sId = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}

		public function count_item(){
			$sId = session_id();
			$query = "SELECT COUNT(*) FROM chitietdathang";
		}

		public function del_cart($cartId){
			$cartid = mysqli_real_escape_string($this->db->link, $cartId);
			$query = "DELETE FROM chitietdathang WHERE giohangId = '$cartid'";
			$result = $this->db->delete($query);
			if($result){
				$msg = "<span class='success'>Xóa thành công sản phẩm</span>";
				return $msg;
			}
		}

		public function check_cart(){
			$sId = session_id();
			$query = "SELECT * FROM chitietdathang WHERE sId = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}

		public function delete_all_cart(){
			$sId = session_id();
			$query = "DELETE FROM chitietdathang WHERE sId = '$sId'";
			$result = $this->db->delete($query);
			return $result;
		}

		
		
	}
?>