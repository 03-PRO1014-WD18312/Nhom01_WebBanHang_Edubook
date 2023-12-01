<?php
include_once 'models/Email.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class EmailDAO
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->cauHinh();
    }
    private function cauHinh()
    {
        $this->mail->isSMTP();
        $this->mail->SMTPDebug = 0;
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = 'ssl';
        $this->mail->Host = "smtp.gmail.com";
        $this->mail->Port = 465;
        $this->mail->isHTML(true);
        $this->mail->Username = "theduong2932004@gmail.com";
        $this->mail->Password = "z w b f l z f f r j b l a r l j";
        $this->mail->setFrom("theduong2932004@gmail.com");
    }
    public function quenMatKhau($maCode,$nguoiNhan)
    {
        $tieuDe = "Đặt lại mật khẩu";
        $this->mail->Subject = mb_encode_mimeheader($tieuDe, "UTF-8", "B");
        $this->mail->Body = '<h1>Mã code đặt lại mật khẩu của bạn là: '.$maCode.'</h1>';
        $this->mail->addAddress($nguoiNhan);
        if (!$this->mail->send()) {
            echo "Không thể gửi email: " . $this->mail->ErrorInfo;
        }
    }
}
?>
