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
            include_once('views/trangChu/user/Home.php');
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
            include_once('views/trangChu/user/Home.php');
        }
    }
    public function showTT()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
            $DonHangDAO = new DonHangDAO();
            $list = $DonHangDAO->showTTDH();
            include_once "views/trangThaiDonHang/admin/list.php";
        } else {
            include_once('views/trangChu/user/Home.php');
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
            include_once('views/trangChu/user/Home.php');
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
            include_once('views/trangChu/user/Home.php');
        }
    }
}
