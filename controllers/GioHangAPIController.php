<?php
include '../DAO/GioHangDAO.php';
class GioHangControllerAPI
{
    public function index($id)
    {
        $GioHangDAO = new GioHangDAO();
        $GioHangDAO->add_card($id);
    }
}
