<?php
class TrangChuController
{
    public function index()
    {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == 2) {
                include('views/trangChu/admin/Home.php');
            } else {
                include('views/trangChu/user/Home.php');
            }
        } else {
            header("Location: index.php?controller=dangNhap");
        }
    }
}
