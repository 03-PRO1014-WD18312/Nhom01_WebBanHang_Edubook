<?php
include_once "DAO/EmailDAO.php";
class EmailController{
    public function quenMatKhau(){
        if (isset($_GET['nhapEmail'])){
            // Chưa có check email
            $EmailDAO = new EmailDAO();
            $maCode = time();
            $_SESSION['maCode'] = $maCode;
            $email = $_POST['email'];
            $EmailDAO->quenMatKhau($maCode,$email);
            include_once "views/dangNhap/NhapCode.php";
        }elseif (isset($_GET['nhapCode'])){
            if ($_POST['maCode'] == $_SESSION['maCode']){
                $email = $_POST['email'];
                include_once "views/dangNhap/MatKhauMoi.php";
            }else{
                //Thiếu thông báo nhập sai mã code
                $email = $_POST['email'];
                include_once "views/dangNhap/NhapCode.php";
            }
        }elseif (isset($_GET['datLaiMatKhau'])){
            unset($_SESSION['maCode']);
            if ($_POST['mk1'] == $_POST['mk2']){
                $TaiKhoanDAO = new TaiKhoanDAO();
                $TaiKhoanDAO->updateMK($_POST['mk1'],$_POST['email']);
                header("location: index.php?controller=dangNhap");
            }else{
                //Thiếu thông báo nhập không trùng mk
                $email = $_POST['email'];
                include_once "views/dangNhap/MatKhauMoi.php";
            }
        }else{
            include_once "views/dangNhap/NhapEmail.php";
        }

    }
}