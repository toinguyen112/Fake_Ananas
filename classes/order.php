<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
    class order{

        private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

        public function add_order($mskh){
            
           
            $today = date('Y-m-d');
            $week = strtotime(date("Y-m-d", strtotime($today)) . " +1 week");
            $week = strftime("%Y-%m-%d", $week);
           

            if($mskh=="" || $today=="" || $week=="")
            {
                $alert = "<span>Đặt hàng không thành công</span>";
                return $alert;
            }
            else{
                $query = "INSERT INTO dathang(MSKH,NgayDH,NgayGH) VALUE('$mskh','$today','$week')";
                $result = $this->db->insert($query);
            }
        }

        public function show_order(){
            $query = "SELECT * FROM dathang";
            $result = $this->db->select($query);
            return $result;
        }

        // public function del_order($mskh){
        //     $query = "DELETE *FROM dathang where MSKH = '$mskh'";
        //     $result = $this->db->delete($query);
        //     if($result){
        //         $alert = "<span class='success'>Xóa đơn hàng thành công</span>";
        //         return $alert;
        //     }
        //     else{
        //         $alert ="<span class='error'>Xóa đơn hàng không thành công</span>";
        //         return $alert;
        //     }
        // }
    }
?>