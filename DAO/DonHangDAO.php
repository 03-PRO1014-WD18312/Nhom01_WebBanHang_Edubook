<?php
include 'models/DonHang.php';

class DonHangDAO{
    private $PDO;
    public function __construct()
    {
        require('config/PDO.php');
        $this->PDO = $pdo;
    }
    public function show(){
        $sql = "SELECT * FROM `don_hang` WHERE 1";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new DonHang($row['id_don_hang'], $row['id_san_pham'], $row['id_user'], $row['so_luong'], $row['thanh_tien'],
                $row['id_thanh_toan'], $row['id_phieu_giam_gia'],$row['id_trang_thai_don_hang'],);
            $lists[] = $product;
        }
        return $lists;
    }
    public function delete($id_don_hang){
        $sql = "DELETE FROM `don_hang` WHERE id_don_hang = ".$id_don_hang;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
}