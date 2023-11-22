<?php
class GioiThieuController
{
    public function index()
    {
        $GioHangDAO = new GioHangDAO();
        $sum = $GioHangDAO->sum($_SESSION['id']);
        include_once "views/gioithieu/gioithieu.php";
    }
}
