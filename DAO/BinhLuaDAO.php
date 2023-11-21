<?php
include_once('models/BinhLuan.php');
include_once 'DAO/ConnectDAO.php';
class BinhLuanDAO extends BaseDAO
{
    // lấy dữ liệu toàn bộ tác giả trên data base
    public function show()
    {
        $sql = "SELECT `id_binh_luan`, users.ten,users.anh, san_pham.ten_san_pham, `noi_dung_binh_luan`, `ngay_binh_luan`, `danh_gia` FROM `binh_luan` JOIN san_pham ON san_pham.id_san_pham = binh_luan.id_san_pham join users on users.id_user=binh_luan.id_user ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        $users = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create a Login object and add it to the array
            $user = new BinhLuan($row['id_binh_luan'], $row['ten'], $row['ten_san_pham'], $row['noi_dung_binh_luan'], $row['ngay_binh_luan'],$row['anh'], $row['danh_gia']);
            $users[] = $user;
        }

        return $users;
    }
    // lấy dữ liệu bình luận cụ thể của sản phẩm
    public function showOne($id)
    {
        $sql = "SELECT `id_binh_luan`, users.ten,users.anh, san_pham.ten_san_pham, `noi_dung_binh_luan`, `ngay_binh_luan`, `danh_gia` FROM `binh_luan` JOIN san_pham ON san_pham.id_san_pham = binh_luan.id_san_pham join users on users.id_user=binh_luan.id_user Where binh_luan.id_san_pham = $id  ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        $users = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create a Login object and add it to the array
            $user = new BinhLuan($row['id_binh_luan'], $row['ten'], $row['ten_san_pham'], $row['noi_dung_binh_luan'], $row['ngay_binh_luan'],$row['anh'], $row['danh_gia']);
            $users[] = $user;
        }

        return $users;
    }
    // lệnh thêm mới tác giả
    public function add($idpro,$iduser,$mes)
    {
        $sql = "INSERT INTO `binh_luan`( `id_user`, `id_san_pham`, `noi_dung_binh_luan`, `ngay_binh_luan`, `danh_gia`) VALUES ('$iduser','$idpro','$mes','2023-11-21 12:33:11','5')";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    // xoá bình luận
    public function delete($id)
    {
        $sql = "UPDATE `tac_gia` SET `trang_thai`=0 WHERE  `id_tac_gia`=$id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
}
