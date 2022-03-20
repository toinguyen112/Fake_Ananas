<?php

	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	/**
	 * 
	 */
	class product
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		
	
		public function insert_product($data,$files){

			$TenHH = mysqli_real_escape_string($this->db->link, $data['TenHH']);
			$GhiChu = mysqli_real_escape_string($this->db->link, $data['GhiChu']);
			$Gia = mysqli_real_escape_string($this->db->link, $data['Gia']);
			$SoLuongHang = mysqli_real_escape_string($this->db->link, $data['SoLuongHang']);
			$Mau = mysqli_real_escape_string($this->db->link, $data['Mau']);
			//Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['Hinh']['name'];
			$file_size = $_FILES['Hinh']['size'];
			$file_temp = $_FILES['Hinh']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			//lấy hình ảnh cho vào folder upload
			$uploaded_image = "uploads/".$unique_image;
			
			if($TenHH=="" || $SoLuongHang=="" || $GhiChu=="" || $Gia=="" || $Mau=="" || $file_name ==""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				//gửi vào file tạm (temp) sau đó upload vào uploaded_image 
				move_uploaded_file($file_temp,$uploaded_image);
				$query = "INSERT INTO hanghoa(TenHH,Gia,SoLuongHang,GhiChu,Mau,Hinh) VALUES('$TenHH','$Gia','$SoLuongHang','$GhiChu','$Mau','$unique_image')";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Insert Product Successfully</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Insert Product Not Success</span>";
					return $alert;
				}
			}
		}
		
		//List trong admin
		public function show_product(){
			$query = "SELECT hanghoa.* FROM hanghoa  order by hanghoa.MSHH desc";
			$result = $this->db->select($query);
			return $result;
		}


		


		public function getproductbyId($id){
			$query = "SELECT * FROM hanghoa where MSHH = '$id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function update_product($data,$files,$id){
		
			$TenHH = mysqli_real_escape_string($this->db->link, $data['TenHH']);
			$Gia = mysqli_real_escape_string($this->db->link, $data['Gia']);
			$SoLuongHang = mysqli_real_escape_string($this->db->link, $data['SoLuongHang']);
			$GhiChu = mysqli_real_escape_string($this->db->link, $data['GhiChu']);
			$Mau = mysqli_real_escape_string($this->db->link, $data['Mau']);
			//Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['Hinh']['name'];
			$file_size = $_FILES['Hinh']['size'];
			$file_temp = $_FILES['Hinh']['tmp_name'];	

			$div = explode('.', $file_name);	//explode : phân tách tên file và phần đuôi mở rộng
			$file_ext = strtolower(end($div));	//đổi về chữ tường đuôi file (extension)
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;	//random số từ 0->10 sau đó kết hợp file_ext (tên file trong uploads) 
			//lấy hình ảnh cho vào folder upload
			$uploaded_image = "uploads/".$unique_image;

			if($TenHH=="" || $SoLuongHang=="" || $GhiChu=="" || $Gia=="" || $Mau==""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				if(!empty($file_name)){
					//Nếu người dùng chọn ảnh
					if ($file_size > 1048576) {

		    		 $alert = "<span class='success'>Image Size should be less then 2MB!</span>";
					return $alert;
				    } 

					elseif (in_array($file_ext, $permited) === false) 	//kiểm tra extension có hợp lệ ko
					{
				    	//chỉ cho up những file này
				    $alert = "<span class='success'>You can upload only:-".implode(', ', $permited)."</span>";
					return $alert;
					}
					move_uploaded_file($file_temp,$uploaded_image);
					$query = "UPDATE hanghoa SET
					TenHH = '$TenHH',
					Gia = '$Gia',
					SoLuongHang = '$SoLuongHang',
					GhiChu = '$GhiChu', 
					Mau = '$Mau',
					Hinh = '$unique_image'
					WHERE MSHH = '$id'";
					
				}else{
					//Nếu người dùng không chọn ảnh
					$query = "UPDATE hanghoa SET
					TenHH = '$TenHH',
					Gia = '$Gia',
					SoLuongHang = '$SoLuongHang',
					GhiChu = '$GhiChu', 
					Mau = '$Mau'
					WHERE MSHH = '$id'";
					
				}
				$result = $this->db->update($query);
					if($result){
						$alert = "<span class='success'>Product Updated Successfully</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Product Updated Not Success</span>";
						return $alert;
					}
				
			}
	}


		public function del_product($id){
			$query = "DELETE FROM hanghoa where MSHH = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Product Deleted Successfully</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Product Deleted Not Success</span>";
				return $alert;
			}
		}
		


	}
?>