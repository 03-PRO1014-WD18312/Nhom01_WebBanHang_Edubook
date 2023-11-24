<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>VNPAY RESPONSE</title>
        <!-- Bootstrap core CSS -->
<!--        <link href="../assets/bootstrap.min.css" rel="stylesheet"/>-->
<!--         Custom styles for this template -->
<!--        <link href="../assets/jumbotron-narrow.css" rel="stylesheet">-->
<!--        <script src="../assets/jquery-1.11.3.min.js"></script>-->
    </head>
    <body>
        <?php
        session_start();
        function connect(){
            $servername = "localhost";
            $username = "root";
            $password = "";
            try {
                $conn = new PDO("mysql:host=$servername;dbname=du_an_1",$username,$password);
                $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                //echo "thanh cong";
            } catch (PDOException $e){
                //echo "lỗi";
            }
            return $conn;
        }
        function getData($query, $params = [], $getAll = true) {
            $conn = connect();
            $stmt = $conn->prepare($query);
            $stmt->execute($params);
            if ($getAll) {
                return $stmt->fetchAll();
            }
            return $stmt->fetch();
        }
        function get_time() {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $currentTime = time();
            $timestamp = $currentTime;
            return date("Y-m-d H:i:s", $timestamp);
        }
        function addDH($id_user,$time)
        {
            $sql = "INSERT INTO `don_hang`(`id_user`, `thoi_gian`, `id_trang_thai_don_hang`) VALUES (?,?,1)";
            return getData($sql, [$id_user,$time], false);
        }
        function addHD($id_don_hang,$ma_hoa_don,$phuong_thuc,$trangThai)
        {
            $sql = "INSERT INTO `ho_don`(`id_don_hang`, `ma_hoa_don`, `phuong_thuc`, `trang_thai`) VALUES (?,?,?,?)";
            return getData($sql, [$id_don_hang,$ma_hoa_don,$phuong_thuc,$trangThai], false);
        }
        function addChiTietDH($id_san_pham,$id_don_hang,$gia,$ten_san_pham,$so_luong)
        {
            $sql = "INSERT INTO `chi_tiet_don_hang`(`id_san_pham`, `id_don_hang`, `gia`, `ten_san_pham`, `so_luong`) VALUES (?,?,?,?,?)";
            return getData($sql, [$id_san_pham,$id_don_hang,$gia,$ten_san_pham,$so_luong], false);
        }
        function getOneIdDesc()
        {
            $sql = "SELECT id_don_hang FROM don_hang ORDER BY id_don_hang DESC LIMIT 1";
            return getData($sql);
        }
        function showOne($id)
        {
            $sql = "SELECT * FROM `san_pham` WHERE id_san_pham = ?";
            return getData($sql,[$id]);
        }
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        /*
         * To change this license header, choose License Headers in Project Properties.
         * To change this template file, choose Tools | Templates
         * and open the template in the editor.
         */

        $vnp_TmnCode = "87J682PG"; //Website ID in VNPAY System
        $vnp_HashSecret = "KQJDGPOXRJQROQWOENLOACLRFKMTUCSF"; //Secret key
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost/php/Nhom01_WebBanHang_Edubook/views/donhang/user/vnpay_return.php";
        $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
        //Config input format
        //Expire
        $startTime = date("YmdHis");
        $expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        if ($_GET['vnp_ResponseCode'] == 00 && $_GET['vnp_TransactionStatus'] == 00){
            addDH($_SESSION['id'],get_time());
            $newIdDH = getOneIdDesc();
            $sanPham =  showOne($_SESSION['value_hd']['idsp']);
            addChiTietDH($_SESSION['value_hd']['idsp'],$newIdDH[0]['id_don_hang'],$sanPham[0]['gia_ban'],$sanPham[0]['ten_san_pham'],$_SESSION['value_hd']['so_luong']);
            addHD($newIdDH[0]['id_don_hang'], $_SESSION['value_hd']['mahd'],"vnpay",1);
        }
        unset($_SESSION['value_hd']);
        ?>
        <!--Begin display -->
        <div class="container">
            <div class="header clearfix">
                <h3 class="text-muted">VNPAY RESPONSE</h3>
            </div>
            <div class="table-responsive">
                <div class="form-group">
                    <label >Mã đơn hàng:</label>

                    <label><?php echo $_GET['vnp_TxnRef'] ?></label>
                </div>
                <div class="form-group">

                    <label >Số tiền:</label>
                    <label><?php echo number_format(($_GET['vnp_Amount']/100), 0, ',', '.') ?> VND</label>
                </div>
                <div class="form-group">
                    <label >Nội dung thanh toán:</label>
                    <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
                </div>
                <div class="form-group">
                    <label >Mã phản hồi (vnp_ResponseCode):</label>
                    <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
                </div>
                <div class="form-group">
                    <label >Mã GD Tại VNPAY:</label>
                    <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
                </div>
                <div class="form-group">
                    <label >Mã Ngân hàng:</label>
                    <label><?php echo $_GET['vnp_BankCode'] ?></label>
                </div>
                <div class="form-group">
                    <label >Thời gian thanh toán:</label>
                    <label><?php echo $_GET['vnp_PayDate'] ?></label>
                </div>
                <div class="form-group">
                    <label >Kết quả:</label>
                    <label>
                        <?php
                        if ($secureHash == $vnp_SecureHash) {
                            if ($_GET['vnp_ResponseCode'] == '00') {
                                echo "<span style='color:blue'>GD Thanh cong</span>";
                            } else {
                                echo "<span style='color:red'>GD Khong thanh cong</span>";
                            }
                        } else {
                            echo "<span style='color:red'>Chu ky khong hop le</span>";
                        }
                        ?>

                    </label>
                </div>
            </div>
            <p>
                &nbsp;
            </p>
            <footer class="footer">
                   <p>&copy; VNPAY <?php echo date('Y')?></p>
            </footer>
        </div>  
    </body>
</html>
