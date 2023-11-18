<?php
include "DAO/DonHangDao.php";

class DonHangController
{
    public function index()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            $DonHangDAO = new DonHangDAO();
            $list = $DonHangDAO->show();
            include "views/donhang/admin/list.php";
        } else {
            include('views/home/user/Home.php');
        }
    }
    public function delete()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            $DonHangDAO = new DonHangDAO();
            $DonHangDAO->delete($_GET['id']);
            $list = $DonHangDAO->show();
            include "views/donhang/admin/list.php";
        } else {
            include('views/home/user/Home.php');
        }
    }
}