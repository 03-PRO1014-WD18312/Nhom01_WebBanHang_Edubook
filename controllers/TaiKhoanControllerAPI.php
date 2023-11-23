<?php
include_once('../../DAO/TaiKhoanDAOAPI.php');
class TaiKhoanControllerAPI
{
    public function add($text)
    {
        $TaiKhoanDAO = new TaiKhoaDAOAPI();
        $a = $TaiKhoanDAO->add($text);
        return $a;
    }
}
