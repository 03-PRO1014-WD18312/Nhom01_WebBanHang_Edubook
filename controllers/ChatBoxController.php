<?php
include_once 'DAO/ChatBoxDAOAPI.php';
class ChatBoxController
{
    public function index()
    {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] != 4) {
                include_once "views/chatbox/admin/users.php";
            } else {
                $ChatBoxDAO = new User();
                $id = $ChatBoxDAO->getId();
                $GioHangDAO = new GioHangDAO();
                $sum = $GioHangDAO->sum($_SESSION['id']);
                include_once "views/chatbox/user/chatbox.php";
            }
        } else {
            $sum = 0;

            $ChatBoxDAO = new User();
            $id = $ChatBoxDAO->getId();
            include_once "views/chatbox/user/chatbox.php";
        }
    }
    public function chat()
    {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] != 4) {
                include_once "views/chatbox/admin/chatbox.php";
            } else {
                $ChatBoxDAO = new User();
                $id = $ChatBoxDAO->getId();
                include_once "views/chatbox/user/chatbox.php";
            }
        } else {
            header("Location: index.php?controller=dangNhap");
        }
    }
}
