<?php
include 'DAO/NhaXuatBanDAO.php';
class NhaXuatBanController
{
    // lấy danh sách bộ truyện
    public function index()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            $NhaSanXuatDAO = new NhaSanXuatDAO();
            $list = $NhaSanXuatDAO->show();
            include "views/nhaxuatban/admin/list.php";
        } else {
            include('views/home/user/Home.php');
        }
    }
    // tạo mới bộ truện
    public function add()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            if (isset($_POST['ten'])) {
                $NhaSanXuatDAO = new NhaSanXuatDAO();
                $NhaSanXuatDAO->add($_POST['ten']);
                $list = $NhaSanXuatDAO->show();
                $_SESSION['error'] = 'thêm mới thành công';
                header('location: index.php?controller=nhaSanXuat');
            } else {
                include('views/nhaxuatban/admin/add.php');
            }
        } else {
            include('views/home/user/Home.php');
        }
    }
    // xoá bộ truyện
    public function remove()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            $NhaSanXuatDAO = new NhaSanXuatDAO();
            $NhaSanXuatDAO->remove($_GET['id']);
            $list = $NhaSanXuatDAO->show();
            $_SESSION['error'] = 'Xoá thành công';
            header('location: index.php?controller=nhaXuatBan');
        } else {
            include('views/home/user/Home.php');
        }
    }
    // sửa bộ truyện
    public function update()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            if (isset($_POST['ten'])) {
                $NhaSanXuatDAO = new NhaSanXuatDAO();
                $NhaSanXuatDAO->update($_POST['id'],$_POST['ten'],$_POST['trang_thai']);
                $list = $NhaSanXuatDAO->show();
                $_SESSION['error'] = 'Sửa thông tin thành công';
                header('location: index.php?controller=nhaXuatBan');
            } else {
                $NhaSanXuatDAO = new NhaSanXuatDAO();
                $list = $NhaSanXuatDAO->showOne($_GET['id']);
                include "views/nhaxuatban/admin/fix.php";
            }
        } else {
            include('views/home/user/Home.php');
        }
    }
}
