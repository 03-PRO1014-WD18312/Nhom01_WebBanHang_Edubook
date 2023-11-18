<?php
include "DAO/DonHangDao.php";

class DonHangController
{
    public function index()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 2) {
            $DonHangDAO = new DonHangDAO();
            $list = $DonHangDAO->show();
            include "views/donhang/admin/list.php";
        } else {
            include('views/trangChu/user/Home.php');
        }
    }
    public function delete()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 2) {
            $DonHangDAO = new DonHangDAO();
            $DonHangDAO->delete($_GET['id']);
            $list = $DonHangDAO->show();
            include "views/donhang/admin/list.php";
        } else {
            include('views/trangChu/user/Home.php');
        }
    }
    public function showTT()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 2) {
            $DonHangDAO = new DonHangDAO();
            $list = $DonHangDAO->showTTDH();
            include "views/trangThaiDonHang/admin/list.php";
        } else {
            include('views/trangChu/user/Home.php');
        }
    }
    function update_tt()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 2) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $DonHangDAO = new DonHangDAO();
                $DonHangDAO->update_tt($_POST['id_trang_thai_don_hang'], $_POST['ten_trang_thai_don_hang']);
                $list = $DonHangDAO->showTTDH();
                include "views/trangThaiDonHang/admin/list.php";
            } else if (isset($_GET['id'])) {
                $DonHangDAO = new DonHangDAO();
                $list = $DonHangDAO->showOneTTDH($_GET['id']);
                include "views/trangThaiDonHang/admin/update.php";
            }
        } else {
            include('views/trangChu/user/Home.php');
        }
    }
    public function update_tt_dh()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 2) {
            $DonHangDAO = new DonHangDAO();
            $DonHangDAO->donHang_update_tt($_GET['id'], $_GET['tt']);
            $list = $DonHangDAO->showTTDH();
            header("location: index.php?controller=donHang");
        } else {
            include('views/trangChu/user/Home.php');
        }
    }
}
