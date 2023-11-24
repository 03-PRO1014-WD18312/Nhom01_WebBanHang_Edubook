<?php
include_once 'models/BoTruyen.php';
include_once 'DAO/ConnectDAO.php';
class BoTruyenDAO extends BaseDAO
{
    // show list
    public function showList()
    {
        $sql = "SELECT *
        FROM bo_truyen ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new ShowBoTruyen($row['id_bo_truyen'], $row['ten_bo_truyen'], $row['hinh_anh'], $row['id_loai_truyen'], $row['gia_ban'], $row['gia_goc'], $row['mo_ta']);
            $lists[] = $product;
        }
        return $lists;
    }
    //.
    public function showView($id)
    {
        $sql = "SELECT *
        FROM bo_truyen  where id_bo_truyen = $id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new ShowBoTruyen($row['id_bo_truyen'], $row['ten_bo_truyen'], $row['hinh_anh'], $row['id_loai_truyen'], $row['gia_ban'], $row['gia_goc'], $row['mo_ta']);
            $lists[] = $product;
        }
        return $lists;
    }
    //.
    public function list($id,$loai)
    {
        $sql = "SELECT *
        FROM bo_truyen  where id_bo_truyen != $id and id_loai_truyen = $loai";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new ShowBoTruyen($row['id_bo_truyen'], $row['ten_bo_truyen'], $row['hinh_anh'], $row['id_loai_truyen'], $row['gia_ban'], $row['gia_goc'], $row['mo_ta']);
            $lists[] = $product;
        }
        return $lists;
    }
    // thêm mới bộ truyện
    public function add($ten, $loai, $img,$gia_ban, $gia_goc, $mo_ta)
    {
        // lưu file
        $fileName = $img['name'];
        $tmp = $img['tmp_name'];
        $mov = 'assets/imgs/shop/' . $fileName;
        move_uploaded_file($tmp, $mov);
        $sql = "INSERT INTO `bo_truyen`( `id_loai_truyen`, `ten_bo_truyen`, `gia_ban`, `gia_goc`, `mo_ta`, `hinh_anh`) VALUES ('$loai','$ten','$gia_ban','$gia_goc','$mo_ta','$img');";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    // lấy danh sách bộ truyện
    public function show()
    {
        $sql = "SELECT bo_truyen.*, COUNT(san_pham.id_san_pham) AS so_luong_sach
        FROM bo_truyen
        LEFT JOIN san_pham ON bo_truyen.id_bo_truyen = san_pham.id_bo_truyen
        GROUP BY bo_truyen.id_bo_truyen;";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new BoTruyen($row['id_bo_truyen'], $row['ten_bo_truyen'], $row['trang_thai'], $row['so_luong_sach'], $row['hinh_anh']);
            $lists[] = $product;
        }

        return $lists;
    }
    // xoá bộ truyện
    public function remove($id)
    {
        $sql = "UPDATE `bo_truyen` SET `trang_thai`= 0 WHERE id_bo_truyen = $id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    // lấy thông tin 1 bộ truyện theo id
    public function showOne($id)
    {
        $sql = "SELECT * FROM `bo_truyen` WHERE id_bo_truyen =$id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new BoTruyen($row['id_bo_truyen'], $row['ten_bo_truyen'], $row['trang_thai'], 0, $row['hinh_anh']);
            $lists[] = $product;
        }
        return $lists;
    }
    // sửa bộ truyên
    public function update($id,$loai, $name,$gia_ban, $gia_goc,$mo_ta, $trang_thai, $img)
    {
        if (isset($img)) {
            // lưu file
            $fileName = $img['name'];
            $tmp = $img['tmp_name'];
            $mov = 'assets/imgs/shop/' . $fileName;

            move_uploaded_file($tmp, $mov);
            $sql = "UPDATE `bo_truyen` SET `id_loai_truyen`='$loai',`ten_bo_truyen`='$name',`gia_ban`='$gia_ban',`gia_goc`='$gia_goc',`mo_ta`='$mo_ta',`hinh_anh`='$fileName',`trang_thai`='$trang_thai' WHERE   id_bo_truyen = $id";
        } else {
            $sql = "UPDATE `bo_truyen` SET `id_loai_truyen`='$loai',`ten_bo_truyen`='$name',`gia_ban`='$gia_ban',`gia_goc`='$gia_goc',`mo_ta`='$mo_ta',`trang_thai`='$trang_thai' WHERE   id_bo_truyen = $id";
        }
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
}
