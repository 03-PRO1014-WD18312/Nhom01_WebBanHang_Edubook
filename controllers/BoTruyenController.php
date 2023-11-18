<?php
include 'DAO/BoTruyenDAO.php';
class BoTruyenController
{
    // lấy danh sách bộ truyện
    public function index()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            $BoTruyenDAO = new BoTruyenDAO();
            $list = $BoTruyenDAO->show();
            include "views/botruyen/admin/list.php";
        } else {
            include('views/home/user/Home.php');
        }
    }
    // tạo mới bộ truện
    public function add()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            if (isset($_POST['ten'])) {
                $BoTruyenDAO = new BoTruyenDAO();
                $BoTruyenDAO->add($_FILES['img'],$_POST['ten']);
                $list = $BoTruyenDAO->show();
                $_SESSION['error'] = 'thêm mới thành công';
                header('location: index.php?controller=boTruyen');
            } else {
                include('views/botruyen/admin/add.php');
            }
        } else {
            include('views/home/user/Home.php');
        }
    }
    // xoá bộ truyện
    public function remove()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            $BoTruyenDAO = new BoTruyenDAO();
            $BoTruyenDAO->remove($_GET['id']);
            $list = $BoTruyenDAO->show();
            $_SESSION['error'] = 'Xoá thành công';
            header('location: index.php?controller=boTruyen');
        } else {
            include('views/home/user/Home.php');
        }
    }
    // sửa bộ truyện
    public function update()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            if (isset($_POST['ten'])) {
                $BoTruyenDAO = new BoTruyenDAO();
                $BoTruyenDAO->update($_POST['id'],$_POST['ten'],$_POST['trang_thai'],$_FILES['img']);
                $list = $BoTruyenDAO->show();
                $_SESSION['error'] = 'Sửa thông tin thành công';
                header('location: index.php?controller=boTruyen');
            } else {
                $BoTruyenDAO = new BoTruyenDAO();
                $list = $BoTruyenDAO->showOne($_GET['id']);
                include "views/botruyen/admin/fix.php";
            }
        } else {
            include('views/home/user/Home.php');
        }
    }
}
