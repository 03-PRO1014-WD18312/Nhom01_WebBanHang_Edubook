<?php
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
                include_once "views/taikhoan/user/Cart.php";
            }
        } else {
            header("Location: index.php?controller=dangNhap");
        }
    }
}
