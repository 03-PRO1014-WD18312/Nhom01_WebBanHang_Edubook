<?php
include_once('DAO/BinhLuaDAO.php');
class BinhLuanController
{
    public function index()
    {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] != 4) {
                $BinhLuaDAO = new BinhLuanDAO();
                $list = $BinhLuaDAO->show();
                include_once "views/binhluan/admin/list.php";
            } else {
                include_once('views/trangChu/user/Home.php');
            }
        } else {
            header("Location: index.php?controller=dangNhap");
        }
    }
    public function delete()
    {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] != 4) {

                $BinhLuaDAO = new BinhLuanDAO();
                $BinhLuaDAO->delete($_GET['id']);
                $_SESSION['error'] = 'Xoá thành công';
                header("Location: index.php?controller=binhLuan");
                exit();
            } else {
                include_once('views/trangChu/user/Home.php');
            }
        } else {
            header("Location: index.php?controller=dangNhap");
        }
    }
}
