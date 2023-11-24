<?php
include_once "DAO/DonHangDao.php";

class DonHangController
{
    public function index()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
            $DonHangDAO = new DonHangDAO();
            $list = $DonHangDAO->show();
            include_once "views/donhang/admin/list.php";
        } else {
            header('location: index.php?controller=trangChu');
        }
    }
    public function delete()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
            $DonHangDAO = new DonHangDAO();
            $DonHangDAO->delete($_GET['id']);
            $list = $DonHangDAO->show();
            $_SESSION['error'] = 'Xoá thành công';
            header('location: index.php?controller=donHang');
            exit();
        } else {
            header('location: index.php?controller=trangChu');
        }
    }
    public function showTT()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
            $DonHangDAO = new DonHangDAO();
            $list = $DonHangDAO->showTTDH();
            include_once "views/trangThaiDonHang/admin/list.php";
        } else {
            header('location: index.php?controller=trangChu');
        }
    }
    function update_tt()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $DonHangDAO = new DonHangDAO();
                $DonHangDAO->update_tt($_POST['id_trang_thai_don_hang'], $_POST['ten_trang_thai_don_hang']);
                $list = $DonHangDAO->showTTDH();
                $_SESSION['error'] = 'Sửa thông tin thành công';
                header('location: index.php?controller=trangThaiDH');
                exit();
            } else if (isset($_GET['id'])) {
                $DonHangDAO = new DonHangDAO();
                $list = $DonHangDAO->showOneTTDH($_GET['id']);
                include_once "views/trangThaiDonHang/admin/update.php";
            }
        } else {
            header('location: index.php?controller=trangChu');
        }
    }
    public function update_tt_dh()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
            $DonHangDAO = new DonHangDAO();
            $DonHangDAO->donHang_update_tt($_GET['id'], $_GET['tt']);
            $list = $DonHangDAO->showTTDH();
            $_SESSION['error'] = 'Sửa thông tin thành công';
            header("location: index.php?controller=donHang");
            exit();
        } else {
            header('location: index.php?controller=trangChu');
        }
    }
    public function fix()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $DonHangDAO = new DonHangDAO();
                $info = $DonHangDAO->showOneId($_GET['id']);
                include_once "views/donhang/admin/fix.php";
            }
        } else {
            header('location: index.php?controller=trangChu');
        }
    }
    public function muaHang()
    {
        if (isset($_SESSION['role']) && isset($_SESSION['id'])) {
            if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
            } else {
                if (isset($_GET['nd']) && $_GET['nd']=="muaHang") {
                    $sanPhamDAO = new SanPhamDAO();
                    $user = new TaiKhoanDAO();
                    $thongTinUs = $user->getUsID($_SESSION['id']);
                    $thongTinSp = $sanPhamDAO->showOne($_POST['idsp']);
                    $soLuong = $_POST['so_luong'];
                    $thanhTien = 0;
                    foreach ($thongTinSp as $sp) {
                        $thanhTien = $thanhTien + ($sp->gia_ban * $soLuong);
                    }
                    include_once "views/donHang/user/thongTin.php";
                }
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $_SESSION['value_hd'] = array(
                        'mahd' => $_POST['order_id'],
                        'amount' => $_POST['amount'],
                        'idsp' => $_POST['idsp'],
                        'soLuongGH' => $_POST['idsp'],
                        'so_luong' => $_POST['so_luong']
                    );
                    include_once "views/donhang/user/vnpay_create_payment.php";
                }
            }
        } else {
            header("Location: index.php?controller=dangNhap");
        }
    }
    public function showCard()
    {
        if (isset($_SESSION['role']) && isset($_SESSION['id'])) {
            if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
            } else {
                if(isset($_GET['nd']) && $_GET['nd'] == "thongTin"){
                    $sanPhamDAO = new SanPhamDAO();
                    $user = new TaiKhoanDAO();
                    $thongTinUs = $user->getUsID($_SESSION['id']);
                    $thongTinSp = $sanPhamDAO->card($_SESSION['id'],$_POST['card']);
                    if (isset($_POST['so_luong'])){
                        $soLuong = $_POST['so_luong'];
                    }else{
                        $soLuong = 0;
                    }
                    $thanhTien = 0;
                    foreach ($thongTinSp as $sp) {
                        $thanhTien = $thanhTien + ($sp->gia_ban * $sp->so_luong);
                    }
                    include_once "views/donHang/user/thongTin.php";
                }
                if (isset($_GET['nd']) && $_GET['nd'] == "thanhToan") {
                    $sanPhamDAO = new SanPhamDAO();
                    $_SESSION['value_hd'] = array(
                        'mahd' => $_POST['order_id'],
                        'amount' => $_POST['amount'],
                        'idsp' => $_POST['idsp'],
                        'soLuong' => $_POST['soLuong'],
                        'so_luong' => $_POST['so_luong']
                    );
//                    echo $_SESSION['value_hd']['idsp'][0];
//                    foreach ($_SESSION['value_hd'] as $key => $sp) {
////                        var_dump($sp); // Hiển thị thông tin chi tiết về biến $sp
//                        echo $sp[1]; // Hiển thị kiểu dữ liệu của phần tử đầu tiên trong mảng idsp
//                    }

//                    $thongTinSp = $sanPhamDAO->card($_SESSION['id'],$_SESSION['value_hd']['idsp']);
//                    foreach ($thongTinSp as $sl) {
//                        $_SESSION['soLuong'][] = $sl->so_luong;
//                    }
                    include_once "views/donhang/user/vnpay_create_payment.php";
                }
            }
        } else {
            header("Location: index.php?controller=dangNhap");
        }
    }
    public function addHD(){
        $sanPhamDAO = new SanPhamDAO();
    }
}
