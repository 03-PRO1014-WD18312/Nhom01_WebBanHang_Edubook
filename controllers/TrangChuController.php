<?php
class TrangChuController
{
    public function index()
    {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == 2) {
                include_once('views/trangChu/admin/Home.php');
            } else {
                include_once('views/trangChu/user/Home.php');
            }
        } else {
            header("Location: index.php?controller=dangNhap");
        }
    }
}
