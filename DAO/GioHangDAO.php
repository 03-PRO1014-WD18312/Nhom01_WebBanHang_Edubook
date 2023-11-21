<?php

class GioHangDAO
{

    private $pdo;
    public function __construct()
    {
        require_once('../config/PDO.php');
        $this->pdo = $pdo;
    }
    // thêm giỏ hàng
    public function add_card($data)
    {
        session_start(); // You need to start the session to access $_SESSION variables.

        // $outgoing_id = $_SESSION['id'];
        // $incoming_id = $_POST['incoming_id'];
        // $output = "";
        $sql = "INSERT INTO `gio_hang` (`id_user`, `id_san_pham`, `so_luong`) VALUES ( '31', $data, '1');";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();
    }
}
