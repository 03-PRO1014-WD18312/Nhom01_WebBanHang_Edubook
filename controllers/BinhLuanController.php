<?php
include('DAO/BinhLuaDAO.php');
class BinhLuanController
{
    public function index()
    {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == 2) {
                $BinhLuaDAO = new BinhLuanDAO();
                $list = $BinhLuaDAO->show();
                include "views/binhluan/admin/list.php";
            } else {
                include('views/trangChu/user/Home.php');
            }
        } else {
            header("Location: index.php?controller=login");
        }
    }
    public function delete()
    {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == 2) {

                $BinhLuaDAO = new BinhLuanDAO();
                $BinhLuaDAO->delete($_GET['id']);
                $_SESSION['error'] = 'Xoá thành công';
                header("Location: index.php?controller=binhLuan");
                exit();
            } else {
                include('views/trangChu/user/Home.php');
            }
        } else {
            header("Location: index.php?controller=login");
        }
    }
}
