<?php
include 'models/DonHang.php';
include 'models/TrangThaiDonHang.php';

class DonHangDAO{
    private $PDO;
    public function __construct()
    {
        require('config/PDO.php');
        $this->PDO = $pdo;
    }
    public function show(){
        $sql = "SELECT * FROM `don_hang` INNER JOIN `trang_thai_don_hang` ON don_hang.id_trang_thai_don_hang = trang_thai_don_hang.id_trang_thai_don_hang ORDER BY `id_don_hang` DESC";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new DonHang($row['id_don_hang'], $row['id_user'],$row['thoi_gian'] ,$row['id_trang_thai_don_hang'],$row['ten_trang_thai_don_hang'],);
            $lists[] = $product;
        }
        return $lists;
    }
    public function delete($id_don_hang){
        $sql = "DELETE FROM `don_hang` WHERE id_don_hang = ".$id_don_hang;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    public function fix($id){
        $sql = "SELECT * FROM don_hang INNER JOIN bang2 ON bang1.id = bang2.id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    public function showTTDH(){
        $sql = "SELECT * FROM `trang_thai_don_hang` WHERE 1";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new TrangThaiDonHang($row['id_trang_thai_don_hang'], $row['ten_trang_thai_don_hang']);
            $lists[] = $product;
        }
        return $lists;
    }
    public function showOneTTDH($id){
        $sql = "SELECT * FROM `trang_thai_don_hang` WHERE id_trang_thai_don_hang = " . $id;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new TrangThaiDonHang($row['id_trang_thai_don_hang'], $row['ten_trang_thai_don_hang']);
            $lists[] = $product;
        }
        return $lists;
    }
    public function update_tt($id_trang_thai_don_hang,$ten_trang_thai_don_hang){
        $sql = "UPDATE `trang_thai_don_hang` SET `ten_trang_thai_don_hang`='$ten_trang_thai_don_hang' WHERE id_trang_thai_don_hang = ".$id_trang_thai_don_hang;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    public function donHang_update_tt($id_don_hang,$tt){
        $sql = "UPDATE `don_hang` SET `id_trang_thai_don_hang`='$tt' WHERE id_don_hang = " . $id_don_hang;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }

}