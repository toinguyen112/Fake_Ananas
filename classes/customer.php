<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
    class customer{

        private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

        public function insert_customer($data){

            $HoTenKH = mysqli_real_escape_string($this->db->link, $data['HoTenKH']);
            $TenCongTy = mysqli_real_escape_string($this->db->link, $data['TenCongTy']);
            $SoDienThoai = mysqli_real_escape_string($this->db->link, $data['SoDienThoai']);
            $Email = mysqli_real_escape_string($this->db->link, $data['Email']);
            $MatKhau = mysqli_real_escape_string($this->db->link, $data['MatKhau']);

            if($HoTenKH=="" || $TenCongTy=="" || $SoDienThoai=="" || $Email=="" || $MatKhau ==""){
				$alert = "<span class='error'>Cần điền đầy đủ thông tin.</span>";
				return $alert;
            }else{
				$check_email = "SELECT * FROM khachhang WHERE Email='$Email' LIMIT 1";
				$result_check = $this->db->select($check_email);
				if($result_check){
					$alert = "<span class='error'>Email Đã tồn tại!</span>";
					return $alert;
				}
                else{
                $query = "INSERT INTO khachhang(HoTenKH,TenCongTy,SoDienThoai,Email,MatKhau) VALUES('$HoTenKH','$TenCongTy','$SoDienThoai','$Email','$MatKhau')";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Đăng ký tài khoản thành công.</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Đăng ký tài khoản không thành công.</span>";
					return $alert;
				}
                }
        }
    }


	public function login_customers($data){
		$Email = mysqli_real_escape_string($this->db->link, $data['Email']);
		$MatKhau = mysqli_real_escape_string($this->db->link, $data['MatKhau']);
			if($Email=='' || $MatKhau==''){
				$alert = "<span class='error'>Email và mật khẩu không được rỗng.</span>";
				return $alert;
			}else{
				$check_login = "SELECT * FROM khachhang WHERE Email='$Email' AND MatKhau='$MatKhau'";
				$result_check = $this->db->select($check_login);
				if($result_check){

					$value = $result_check->fetch_assoc();
					Session::set('customer_login',true);
					Session::set('customer_id',$value['MSKH']);
					Session::set('customer_name',$value['HoTenKH']);
					
					$alert = "<span class='success'>Đăng nhập thành công <a href='index.php'>Đến trang chủ</a></span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Email và mật khẩu không đúng.</span>";
					return $alert;
				}
			}

	}


}
?>