<?php
include_once 'DAO/TacGiaDAO.php';
class TacGiaController
{
    // danh sách tac gia
    public function index()
    {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] != 4) {
                $TacGiaDAO = new TacGiaDAO();
                $list = $TacGiaDAO->show();
                include_once "views/tacGia/admin/list.php";
            } else {
                include_once('views/trangChu/user/Home.php');
            }
        } else {
            header("Location: index.php?controller=login");
        }
    }
    // thêm mới tác giả
    public function add()
    {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] != 4) {
                if (isset($_POST['ten'])) {
                    $TacGiaDAO = new tacGiaDAO();
                    $TacGiaDAO->add($_POST['ten']);
                    $_SESSION['error'] = 'thêm mới thành công';
                    header("Location: index.php?controller=tacGia");
                    exit();
                } else {
                    include_once('views/tacGia/admin/add.php');
                }
            } else {
                include_once('views/trangChu/user/Home.php');
            }
        } else {
            header("Location: index.php?controller=login");
        }
    }
    // xoá tác giả
    public function delete()
    {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] != 4) {
                $TacGiaDAO = new tacGiaDAO();
                $TacGiaDAO->delete($_GET['id']);
                $_SESSION['error'] = 'Xoá thành công';
                header("Location: index.php?controller=tacGia");
                exit();
            } else {
                include_once('views/trangChu/user/Home.php');
            }
        } else {
            header("Location: index.php?controller=login");
        }
    }
    // sửa tác giả
    public function update()
    {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] != 4) {
                if (isset($_POST['id'])) {
                    $TacGiaDAO = new TacGiaDAO();
                    $TacGiaDAO->fix($_POST['id'], $_POST['ten'], $_POST['trang_thai']);
                    $_SESSION['error'] = 'Sửa thông tin thành công';
                    header("Location: index.php?controller=tacGia");
                    exit();
                } else {
                    if (isset($_GET['id'])) {
                        $TacGiaDAO = new TacGiaDAO();
                        $list = $TacGiaDAO->showOne($_GET['id']);
                        include_once('views/tacGia/admin/fix.php');
                    } else {
                        header("Location: index.php?controller=tacGia");
                    }
                }
            } else {
                include_once('views/trangChu/user/Home.php');
            }
        } else {
            header("Location: index.php?controller=login");
        }
    }
}
