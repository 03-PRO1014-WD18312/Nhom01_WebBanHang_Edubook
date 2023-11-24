<?php
include_once 'DAO/BoTruyenDAO.php';
class BoTruyenController
{
    // lấy danh sách bộ truyện
    public function index()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
            $BoTruyenDAO = new BoTruyenDAO();
            $list = $BoTruyenDAO->show();
            include_once "views/botruyen/admin/list.php";
        } else {
            $loaiTruyenDAO = new loaiTruyenDAO();

            $danh_muc = $loaiTruyenDAO->show();
            $BoTruyenDAO = new BoTruyenDAO();
            $san_pham = $BoTruyenDAO->showList();
            include_once('views/botruyen/user/botruyen.php');
        }
    }
    //
    public function showOne(){
        if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
            $BoTruyenDAO = new BoTruyenDAO();
            $list = $BoTruyenDAO->show();
            include_once "views/botruyen/admin/list.php";
        } else {
           
            $BoTruyenDAO = new BoTruyenDAO();
            $bo_truyen = $BoTruyenDAO->showView($_GET['id']);
            $bo_truyen_lien_quan = $BoTruyenDAO->list($_GET['id'],$_GET['loai']);
            $SanPhamDAO = new SanPhamDAO();
            $san_pham= $SanPhamDAO->showBo($_GET['id']);
            include_once('views/botruyen/user/botruyenDetal.php');
        }
    }
    // tạo mới bộ truện
    public function add()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
            if (isset($_POST['ten'])) {
                $BoTruyenDAO = new BoTruyenDAO();
                $BoTruyenDAO->add($_POST['ten'],$_POST['id_loai_san_pham'],$_FILES['img'],$_POST['giaban'],$_POST['giagoc'],$_POST['mo_ta']);
                $list = $BoTruyenDAO->show();

                $_SESSION['error'] = 'thêm mới thành công';
                header('location: index.php?controller=boTruyen');
                exit();
            } else {
                $loaiTruyenDAO = new loaiTruyenDAO();
                $loai = $loaiTruyenDAO->show();
                $danh_muc = $loaiTruyenDAO->show();
                $BoTruyenDAO = new BoTruyenDAO();
                $san_pham = $BoTruyenDAO->show();
                include_once('views/botruyen/admin/add.php');
            }
        } else {
            header('location: index.php?controller=trangChu');
        }
    }
    // xoá bộ truyện
    public function remove()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
            $BoTruyenDAO = new BoTruyenDAO();
            $BoTruyenDAO->remove($_GET['id']);
            $list = $BoTruyenDAO->show();
            $_SESSION['error'] = 'Xoá thành công';
            header('location: index.php?controller=boTruyen');
            exit();
        } else {
            header('location: index.php?controller=trangChu');
        }
    }
    // sửa bộ truyện
    public function update()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
            if (isset($_POST['ten'])) {
                $BoTruyenDAO = new BoTruyenDAO();
                $BoTruyenDAO->update($_POST['id'],$_POST['loai'], $_POST['ten'],$_POST['giaban'],$_POST['giagoc'],$_POST['mota'], $_POST['trang_thai'],$_FILES['img'] );
                $list = $BoTruyenDAO->show();
                $_SESSION['error'] = 'Sửa thông tin thành công';
                header('location: index.php?controller=boTruyen');
                exit();
            } else {
                $BoTruyenDAO = new BoTruyenDAO();
                $list = $BoTruyenDAO->showView($_GET['id']);
                $loaiTruyenDAO = new LoaiTruyenDAO();
                $loai = $loaiTruyenDAO->show();
                include_once "views/botruyen/admin/fix.php";
            }
        } else {
            header('location: index.php?controller=trangChu');
        }
    }
}
