<?php
class DonHangDAOAPI
{
    private $pdo;
    public function __construct()
    {
        require_once('../../config/PDO.php');
        $this->pdo = $pdo;
    }
    public function showUser($id)
    {
        // session_start(); // You need to start the session to access $_SESSION variables.

        // $id = $_SESSION['id'];
        // $incoming_id = $_POST['incoming_id'];
        // $output = "";
        $sql = "SELECT  users.ten,users.sdt,dia_chi.dia_chi FROM `don_hang` JOIN users ON users.id_user = don_hang.id_user JOIN ho_don ON ho_don.id_don_hang = don_hang.id_don_hang JOIN dia_chi ON users.id_user = dia_chi.id_user WHERE dia_chi.trang_thai =1 AND don_hang.id_don_hang =$id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();
        $output = "";
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $output .= "  <h5 style='color: dimgray'>Thông tin khách hàng</h5>
                <p>Người đặt hàng: " . $row['ten'] . " </p>
                <p>Số điện thoại: " . $row['sdt'] . " </p>
                <p>Địa chỉ nhận hàng: " . $row['dia_chi'] . " </p>";
            }
        } else {
            $output .= "aaaaaaa";
        }
        return $output;
    }
}
