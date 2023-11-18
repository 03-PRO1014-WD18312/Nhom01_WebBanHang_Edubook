<?php
include "DAO/SanPhamDAO.php";
//include "DAO/TacGiaDAO.php";
//include "DAO/SanPhamDAO.php";

class ProductController{
    public function index(){
        if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {

            $sanPhamDAO = new SanPhamDAO();
            $list = $sanPhamDAO->show();
            include "views/sach/admin/list.php";
        }else{
            include "views/home/user/Home.php";
        }
    }
    public function productDetail(){
        include "views/home/user/ProductDetail.php";
    }
    public function add(){
        if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            if ($_SERVER['REQUEST_METHOD'] == "POST"){
                $sanPhamDAO = new SanPhamDAO();
                $sanPhamDAO->add($_POST['ten_san_pham'],$_POST['mo_ta'],$_POST['gia_ban'],$_POST['gia_goc'],
                    $_POST['so_luong'],$_POST['so_trang'],$_POST['id_tac_gia'],$_POST['nam_xb'],$_POST['kich_thuoc'],$_POST['trong_luong'],
                    get_time(), $_POST['id_loai_san_pham'] ,$_POST['id_bo_truyen'],$_POST['id_nha_san_xuat'],$_POST['id_nha_phat_hanh']);
                $count = 0;
                $id = $sanPhamDAO->getOneIdDesc();
                $idSanPham = $id[0]->id_san_pham;
                $thuMucDich = "assets/imgs/shop/";
                if (isset($_FILES["images"])) {
                    foreach ($_FILES["images"]["tmp_name"] as $key => $tmp_name) {
                        $tenTep = basename($_FILES["images"]["name"][$key]);
                        $duongDanLuuTep = $thuMucDich . $tenTep;
                        if (move_uploaded_file($tmp_name, $duongDanLuuTep)) {
                            $anh = $tenTep;
                            $sanPhamDAO->addImgs($anh, $idSanPham);
                            if ($count == 0){
                                $sanPhamDAO->updateImgSP($anh, $idSanPham);
                                $count = 1;
                            }
                        } else {
                            echo "Có lỗi khi tải lên ảnh: " . $tenTep;
                        }
                    }
                } else {
                    echo "Không có ảnh nào được chọn.";
                }

                $list = $sanPhamDAO->show();
                header("location: index.php?controller=sanPham");
            }else{
                $sanPhamDAO = new SanPhamDAO();
                $tg = $sanPhamDAO->showtg();
                $nsx = $sanPhamDAO->showNSX();
                $l = $sanPhamDAO->showL();
                $nph = $sanPhamDAO->showPH();
                $b = $sanPhamDAO->showB();

                include "views/sach/admin/add.php";
            }
        }else{
            include "views/home/user/Home.php";
        }
    }
    public function delete(){
        if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            if (isset($_GET['id'])){
                $sanPhamDAO = new SanPhamDAO();
                $sanPhamDAO->deleteASP($_GET['id']);
                $sanPhamDAO->deleteSP($_GET['id']);
                $list = $sanPhamDAO->show();
                include "views/sach/admin/list.php";
            }
        }else{
            include "views/home/user/Home.php";
        }
    }
    public function fix(){
        if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            if (isset($_GET['id'])){
                $sanPhamDAO = new SanPhamDAO();
                $tg = $sanPhamDAO->showtg();
                $nsx = $sanPhamDAO->showNSX();
                $l = $sanPhamDAO->showL();
                $nph = $sanPhamDAO->showPH();
                $b = $sanPhamDAO->showB();
                $imgs = $sanPhamDAO->imgs($_GET['id']);
                $list = $sanPhamDAO->showOne($_GET['id']);
                include "views/sach/admin/fix.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == "POST"){
                $sanPhamDAO = new SanPhamDAO();
                //upload sản phẩm
                $hinhAnh = $_POST['hinh_anh_sp_old'];
                if (isset($_FILES['hinh_anh_sp']) && $_FILES['hinh_anh_sp']['error'] === UPLOAD_ERR_OK) {
                    $hinhAnh = img();
                }
                $sanPhamDAO->fix($_POST['ten_san_pham'],$_POST['mo_ta'],$hinhAnh,$_POST['gia_ban'],$_POST['gia_goc'],
                $_POST['so_luong'],$_POST['so_trang'],$_POST['id_tac_gia'],$_POST['nam_xb'],$_POST['kich_thuoc'],$_POST['trong_luong'],
                $_POST['id_loai_san_pham'] ,$_POST['id_bo_truyen'],$_POST['id_nha_san_xuat'],$_POST['id_nha_phat_hanh'],$_POST['id_san_pham']);
                // kiểm tra xem có ảnh sản phẩm mới không
                $idSanPham = $_POST['id_san_pham'];
                $thuMucDich = "assets/imgs/shop/";
                if (isset($_FILES["images"])) {
                    foreach ($_FILES["images"]["tmp_name"] as $key => $tmp_name) {
                        $tenTep = basename($_FILES["images"]["name"][$key]);
                        $duongDanLuuTep = $thuMucDich . $tenTep;
                        if (move_uploaded_file($tmp_name, $duongDanLuuTep)) {
                            $anh = $tenTep;
                            $sanPhamDAO->addImgs($anh, $idSanPham);
                        } else {
                            echo "Có lỗi khi tải lên ảnh: " . $tenTep;
                        }
                    }
                } else {
                    echo "Không có ảnh nào được chọn.";
                }
                $list = $sanPhamDAO->show();
                header("location: index.php?controller=sanPham");
            }
        }else{
            include "views/home/user/Home.php";
        }
    }
    public function sanPham_fix_dlimg(){
        if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            if (isset($_GET['id_san_pham'])){
                $sanPhamDAO = new SanPhamDAO();
                if (isset($_GET['id_hinh_anh'])){
                    $sanPhamDAO->deleteOneASP($_GET['id_hinh_anh']);
                }
                $tg = $sanPhamDAO->showtg();
                $nsx = $sanPhamDAO->showNSX();
                $l = $sanPhamDAO->showL();
                $nph = $sanPhamDAO->showPH();
                $b = $sanPhamDAO->showB();
                $imgs = $sanPhamDAO->imgs($_GET['id_san_pham']);
                $list = $sanPhamDAO->showOne($_GET['id_san_pham']);
                include "views/sach/admin/fix.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == "POST"){
                $sanPhamDAO = new SanPhamDAO();
                //upload sản phẩm
                $hinhAnh = $_POST['hinh_anh_sp_old'];
                if (isset($_FILES['hinh_anh_sp']) && $_FILES['hinh_anh_sp']['error'] === UPLOAD_ERR_OK) {
                    $hinhAnh = img();
                }
                $sanPhamDAO->fix($_POST['ten_san_pham'],$_POST['mo_ta'],$hinhAnh,$_POST['gia_ban'],$_POST['gia_goc'],
                    $_POST['so_luong'],$_POST['so_trang'],$_POST['id_tac_gia'],$_POST['nam_xb'],$_POST['kich_thuoc'],$_POST['trong_luong'],
                    $_POST['id_loai_san_pham'] ,$_POST['id_bo_truyen'],$_POST['id_nha_san_xuat'],$_POST['id_nha_phat_hanh'],$_POST['id_san_pham']);
                // kiểm tra xem có ảnh sản phẩm mới không
                $idSanPham = $_POST['id_san_pham'];
                $thuMucDich = "assets/imgs/shop/";
                if (isset($_FILES["images"])) {
                    foreach ($_FILES["images"]["tmp_name"] as $key => $tmp_name) {
                        $tenTep = basename($_FILES["images"]["name"][$key]);
                        $duongDanLuuTep = $thuMucDich . $tenTep;
                        if (move_uploaded_file($tmp_name, $duongDanLuuTep)) {
                            $anh = $tenTep;
                            $sanPhamDAO->addImgs($anh, $idSanPham);
                        } else {
                            echo "Có lỗi khi tải lên ảnh: " . $tenTep;
                        }
                    }
                } else {
                    echo "Không có ảnh nào được chọn.";
                }
                $list = $sanPhamDAO->show();
                header("location: index.php?controller=sanPham");
            }
        }else{
            include "views/home/user/Home.php";
        }
    }
}