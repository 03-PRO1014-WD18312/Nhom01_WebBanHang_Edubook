<?php
include 'DAO/LoaiTruyenDAO.php';
class LoaiSanPhamController
{
    // lấy danh sách loại truyện
    public function index()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            $LoaiTruyenDAO = new LoaiTruyenDAO();
            $list = $LoaiTruyenDAO->show();
            include "views/danhmuc/admin/list.php";
        } else {
            include('views/home/user/Home.php');
        }
    }
    // tạo mới loại truện
    public function add()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            if (isset($_POST['ten'])) {
                $LoaiTruyenDAO = new LoaiTruyenDAO();
                $LoaiTruyenDAO->add($_POST['ten']);
                $list = $LoaiTruyenDAO->show();
                $_SESSION['error'] = 'thêm mới thành công';
                header('location: index.php?controller=loaisanpham');
            } else {
                include('views/danhmuc/admin/add.php');
            }
        } else {
            include('views/home/user/Home.php');
        }
    }
    // xoá loại truyện
    public function remove()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            $LoaiTruyenDAO = new LoaiTruyenDAO();
            $LoaiTruyenDAO->remove($_GET['id']);
            $list = $LoaiTruyenDAO->show();
            $_SESSION['error'] = 'Xoá thành công';
            header('location: index.php?controller=loaisanpham');
        } else {
            include('views/home/user/Home.php');
        }
    }
    // sửa loại truyện
    public function update()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            if (isset($_POST['ten'])) {
                $LoaiTruyenDAO = new LoaiTruyenDAO();
                $LoaiTruyenDAO->update($_POST['id'],$_POST['ten'],$_POST['trang_thai']);
                $list = $LoaiTruyenDAO->show();
                $_SESSION['error'] = 'Sửa thông tin thành công';
                header('location: index.php?controller=loaisanpham');
            } else {
                $LoaiTruyenDAO = new LoaiTruyenDAO();
                $list = $LoaiTruyenDAO->showOne($_GET['id']);
                include "views/danhmuc/admin/fix.php";
            }
        } else {
            include('views/home/user/Home.php');
        }
    }
}
