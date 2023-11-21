<?php
include_once('models/BinhLuan.php');
include_once 'DAO/ConnectDAO.php';
class BinhLuanDAO extends BaseDAO
{
    // kết nối database

    // lấy dữ liệu toàn bộ tác giả trên data base
    public function show()
    {
        $sql = "SELECT `id_binh_luan`, users.ten, san_pham.ten_san_pham, `noi_dung_binh_luan`, `ngay_binh_luan`, `danh_gia` FROM `binh_luan` JOIN san_pham ON san_pham.id_san_pham = binh_luan.id_san_pham join users on users.id_user=binh_luan.id_user";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        $users = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create a Login object and add it to the array
            $user = new BinhLuan($row['id_binh_luan'], $row['ten'], $row['ten_san_pham'], $row['noi_dung_binh_luan'], $row['danh_gia'], $row['ngay_binh_luan']);
            $users[] = $user;
        }

        return $users;
    }
    // lệnh thêm mới tác giả
    public function add($name)
    {
        $sql = "INSERT INTO `tac_gia`( `ten_tac_gia`) VALUES ('$name')";
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
