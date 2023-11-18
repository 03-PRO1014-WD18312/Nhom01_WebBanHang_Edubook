<?php
include 'models/SanPham.php';
//include 'models/NhaXuatBan.php';
include 'models/LoaiSanPham.php';
include 'models/NhaPhatHanh.php';
include 'models/NhaSanXuat.php';
include 'models/AnhSanPham.php';

class SanPhamDAO {
    private $PDO;
    public function __construct()
    {
        require('config/PDO.php');
        $this->PDO = $pdo;
    }
    public function add($ten_san_pham,$mo_ta,$gia_ban,$gia_goc,$so_luong,$so_trang,$id_tac_gia,$nam_xb,$kich_thuoc,$trong_luong,$ngay_nhap,$id_loai_san_pham ,$id_bo_truyen,$id_nha_san_xuat,$id_nha_phat_hanh){
        $sql = "INSERT INTO `san_pham`(`ten_san_pham`, `mo_ta`, `gia_ban`, `gia_goc`, `so_luong`,
               `so_trang`, `id_tac_gia`, `nam_xb`, `kich_thuoc`, `trong_luong`,`ngay_nhap`, `id_loai_san_pham`, `id_bo_truyen`, `id_nha_san_xuat`,
               `id_nha_phat_hanh`) VALUES ('$ten_san_pham','$mo_ta','$gia_ban','$gia_goc',
             '$so_luong','$so_trang','$id_tac_gia','$nam_xb','$kich_thuoc','$trong_luong','$ngay_nhap','$id_loai_san_pham','$id_bo_truyen','$id_nha_san_xuat',
             '$id_nha_phat_hanh')";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    public function show(){
        $sql = "SELECT * FROM `san_pham` WHERE 1";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new SanPham($row['id_san_pham'], $row['ten_san_pham'], $row['mo_ta'],$row['hinh_anh'],$row['gia_ban'],$row['gia_goc']
                ,$row['so_luong'],$row['so_trang'],$row['id_tac_gia'],$row['nam_xb'],$row['kich_thuoc'],$row['trong_luong'],$row['ngay_nhap'],
                $row['id_loai_san_pham'],$row['id_bo_truyen'],
                $row['id_nha_san_xuat'],$row['id_nha_phat_hanh'],$row['trang_thai'],
            );
            $lists[] = $product;
        }
        return $lists;
    }
    public function showOne($id){
        $sql = "SELECT * FROM `san_pham` WHERE id_san_pham = ".$id;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new SanPham($row['id_san_pham'], $row['ten_san_pham'], $row['mo_ta'],$row['hinh_anh'],$row['gia_ban'],$row['gia_goc']
                ,$row['so_luong'],$row['so_trang'],$row['id_tac_gia'],$row['nam_xb'],$row['kich_thuoc'],$row['trong_luong'],$row['ngay_nhap'],
                $row['id_loai_san_pham'],$row['id_bo_truyen'],
                $row['id_nha_san_xuat'],$row['id_nha_phat_hanh'],$row['trang_thai'],
            );
            $lists[] = $product;
        }
        return $lists;
    }
    public function getOneIdDesc(){
        $sql = "SELECT * FROM san_pham ORDER BY id_san_pham DESC LIMIT 1";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new SanPham($row['id_san_pham'], $row['ten_san_pham'], $row['mo_ta'],$row['hinh_anh'],$row['gia_ban'],$row['gia_goc']
                ,$row['so_luong'],$row['so_trang'],$row['id_tac_gia'],$row['nam_xb'],$row['kich_thuoc'],$row['trong_luong'],$row['ngay_nhap'],
                $row['id_loai_san_pham'],$row['id_bo_truyen'],
                $row['id_nha_san_xuat'],$row['id_nha_phat_hanh'],$row['trang_thai'],
            );
            $lists[] = $product;
        }
        return $lists;
    }
    // add nhiều ảnh
    public function addImgs($hinh_anh,$id_san_pham){
        $sql = "INSERT INTO `anh_san_pham`( `hinh_anh`, `id_san_pham`) VALUES ('$hinh_anh','$id_san_pham')";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    // update ảnh sản phẩm
    public function updateImgSP($hinh_anh,$id_san_pham){
        $sql = "UPDATE `san_pham` SET `hinh_anh`='$hinh_anh' WHERE id_san_pham = ".$id_san_pham;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    public function deleteSP($id_san_pham){
        $sql = "DELETE FROM `san_pham` WHERE id_san_pham = ".$id_san_pham;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    public function deleteASP($id_san_pham){
        $sql = "DELETE FROM `anh_san_pham` WHERE id_san_pham = ".$id_san_pham;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    public function deleteOneASP($id_anh_san_pham){
        $sql = "DELETE FROM `anh_san_pham` WHERE id_anh_san_pham = ".$id_anh_san_pham;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    public function fix($ten_san_pham,$mo_ta,$hinh_anh_sp,$gia_ban,$gia_goc,$so_luong,$so_trang,$id_tac_gia,$nam_xb,$kich_thuoc,$trong_luong,$id_loai_san_pham ,$id_bo_truyen,$id_nha_san_xuat,$id_nha_phat_hanh,$id){
        $sql = "UPDATE `san_pham` SET `ten_san_pham`='$ten_san_pham',`mo_ta`='$mo_ta',`hinh_anh`='$hinh_anh_sp',
              `gia_ban`='$gia_ban',`gia_goc`='$gia_goc',`so_luong`='$so_luong',`so_trang`='$so_trang',`id_tac_gia`='$id_tac_gia',
              `nam_xb`='$nam_xb',`kich_thuoc`='$kich_thuoc',`trong_luong`='$trong_luong',
              `id_loai_san_pham`='$id_loai_san_pham',`id_bo_truyen`='$id_bo_truyen',`id_nha_san_xuat`='$id_nha_san_xuat',
              `id_nha_phat_hanh`='$id_nha_phat_hanh' WHERE `id_san_pham` = ".$id;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    //lấy danh sách imgs
    public function imgs($id){
        $sql = "SELECT * FROM `anh_san_pham` WHERE id_san_pham = ".$id;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $users = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create a Login object and add it to the array
            $user = new AnhSanPham(
                $row['id_anh_san_pham'],
                $row['hinh_anh'],
                $row['id_san_pham']
            );
            $users[] = $user;
        }

        return $users;
    }
    // lấy danh sách tác giả
    public function showtg()
    {
        $sql = "SELECT * FROM `tac_gia` WHERE 1";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        $users = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create a Login object and add it to the array
            $user = new TacGia(
                $row['id_tac_gia'],
                $row['ten_tac_gia'],
                $row['trang_thai'],
                0
            );

            $users[] = $user;
        }

        return $users;
    }
    // lấy danh sách loại
    public function showL()
    {
        $sql = "SELECT * FROM `loai_san_pham` WHERE 1";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        $users = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create a Login object and add it to the array
            $user = new LoaiSanPham(
                $row['id_loai_san_pham'],
                $row['ten_loai_san_pham'],
                $row['trang_thai'],0
            );

            $users[] = $user;
        }

        return $users;
    }
    public function showPH()
    {
        $sql = "SELECT * FROM `nha_phat_hanh` WHERE 1";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        $users = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create a Login object and add it to the array
            $user = new NhaPhatHanh(
                $row['id_nha_phat_hanh'],
                $row['ten_nha_phat_hanh'],
                $row['trang_thai'],0
            );

            $users[] = $user;
        }

        return $users;
    }
    public function showB()
    {
        $sql = "SELECT * FROM `bo_truyen` WHERE 1";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        $users = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create a Login object and add it to the array
            $user = new NhaPhatHanh(
                $row['id_bo_truyen'],
                $row['ten_bo_truyen'],
                $row['trang_thai'],0
            );

            $users[] = $user;
        }

        return $users;
    }
    public function showNSX()
    {
        $sql = "SELECT * FROM `nha_san_xuat` WHERE 1";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        $users = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create a Login object and add it to the array
            $user = new NhaSanXuat(
                $row['id_nha_san_xuat'],
                $row['ten_nha_san_xuat'],
                $row['trang_thai'],0
            );

            $users[] = $user;
        }

        return $users;
    }
    // delete ảnh sản phẩm
}
?>