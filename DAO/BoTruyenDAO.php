<?php
include_once 'models/BoTruyen.php';
include_once 'DAO/ConnectDAO.php';
class BoTruyenDAO extends BaseDAO
{
    // kết nối database

    // thêm mới bộ truyện
    public function add($img, $ten)
    {
        // lưu file
        $fileName = $img['name'];
        $tmp = $img['tmp_name'];
        $mov = 'assets/imgs/item/' . $fileName;
        move_uploaded_file($tmp, $mov);
        $sql = "INSERT INTO `bo_truyen`( `ten_bo_truyen`,`hinh_anh`) VALUES ('$ten','$fileName');";
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
    public function update($id, $name, $trang_thai, $img)
    {
        if (isset($img)) {
            // lưu file
            $fileName = $img['name'];
            $tmp = $img['tmp_name'];
            $mov = 'assets/imgs/item/' . $fileName;
            move_uploaded_file($tmp, $mov);
            $sql = "UPDATE `bo_truyen` SET `ten_bo_truyen`='$name',`trang_thai`='$trang_thai',`hinh_anh`='$fileName' WHERE  id_bo_truyen = $id";
        } else {
            $sql = "UPDATE `bo_truyen` SET `ten_bo_truyen`='$name',`trang_thai`='$trang_thai' WHERE  id_bo_truyen = $id";
        }
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
}
