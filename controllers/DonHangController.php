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
    public function fix(){
        if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
            if (isset($_GET['id'])){
                $id = $_GET['id'];
                $DonHangDAO = new DonHangDAO();
                $info = $DonHangDAO->showOneId($_GET['id']);
                include_once "views/donhang/admin/fix.php";
            }

        } else {
            header('location: index.php?controller=trangChu');
        }
    }
    public function muaHang(){
        if (isset($_SESSION['role']) && isset($_SESSION['id'])){
            if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {}
            else{
                if (isset($_GET['id'])){
                    $sanPhamDAO = new SanPhamDAO();
                    $user = new TaiKhoanDAO();
                    $thongTinUs = $user->getUsID($_SESSION['id']);
                    $thongTinSp = $sanPhamDAO->showOne($_GET['id']);
                    $tongTien = 0;
                    $thanhTien = 0;
                    foreach ($thongTinSp as $sp) {
                        $tongTien = $tongTien + $sp->gia_ban;
                    }
                    include_once "views/donHang/user/thongTin.php";
                }
                if ($_SERVER['REQUEST_METHOD'] == "POST"){
                    $_SESSION['value_hd'] = array(
                        'order_id' => $_POST['order_id'],
                        'amount' => $_POST['amount'],
                        'idsp' => $_POST['idsp'],
                        'so_luong' => $_POST['so_luong']
                    );
                    include_once "views/donhang/user/vnpay_create_payment.php";
                }
            }
        }else{
            header("Location: index.php?controller=dangNhap");
        }

    }
}
