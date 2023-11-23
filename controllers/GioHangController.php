<?php
include_once('DAO/GioHangDAO.php');
class GioHangController
{
    public function index()
    {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] != 4) {
                $TaiKhoanDAO = new TaiKhoanDAO();
                $list = $TaiKhoanDAO->show();
                include_once "views/taiKhoan/admin/list.php";
            } else {
                $GioHang = new GioHangDAO();
                $list = $GioHang->show($_SESSION['id']);
                $sum = $GioHang->sum($_SESSION['id']);
                include_once "views/taikhoan/user/Cart.php";
            }
        } else {
            header("Location: index.php?controller=dangNhap");
        }
    }
}
