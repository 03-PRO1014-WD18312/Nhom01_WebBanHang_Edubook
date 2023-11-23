<?php
class TaiKhoaDAOAPI
{
    private $pdo;
    public function __construct()
    {
        require_once('../../config/PDO.php');
        $this->pdo = $pdo;
    }
    public function add($test)
    {
        session_start(); // You need to start the session to access $_SESSION variables.

        $id = $_SESSION['id'];


        $sql = "SELECT COUNT(*) FROM `dia_chi` WHERE id_user = $id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $so_luong = $stmt->fetchColumn();
        if ($so_luong > 0) {
            $sql = "INSERT INTO `dia_chi` ( `id_user`, `dia_chi`, `trang_thai`) VALUES ( '35', '$test', '0')";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        } else {
            $sql = "INSERT INTO `dia_chi` ( `id_user`, `dia_chi`, `trang_thai`) VALUES ( '35', '$test', '1')";
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();
        }
    }
    public function show_dia_chi($id)
    {
        $sql = "SELECT * FROM `dia_chi` WHERE id_user = $id ORDER BY trang_thai";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $output = "";
        if ($stmt->rowCount() > 0) {
            $output .= "";
        }
        return $output;
    }
}
