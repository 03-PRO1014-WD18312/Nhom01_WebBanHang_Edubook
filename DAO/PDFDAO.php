<?php
require_once 'vendor/autoload.php'; // Load autoloader của Composer
use TCPDF as TCPDF;

class PDFDAO extends TCPDF
{
    function Header()
    {
        // Thêm nội dung phần đầu hóa đơn nếu cần
        $this->SetFont('dejavusans', 'B', 16);
        $this->Cell(0, 10, '', 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer()
    {
        // Thêm nội dung phần chân hóa đơn nếu cần
        $this->SetY(-15);
        $this->SetFont('dejavusans', 'I', 8);
        $this->Cell(0, 10, 'Trang ' . $this->getAliasNumPage(), 0, 0, 'C');
    }

    function generateInvoice($info)
    {
        // var_dump($info);

        if ($info[0]->trang_thai == 1) {
            $gia = 0;
        } else {
            $gia = $info[0]->tong_tien;
        }
        // Dữ liệu hóa đơn cố định
        $invoiceData = [
            ['ma_hoa_don' => $info[0]->ma_hoa_don,    'tong_tien' => $gia, 'ten' => $info[0]->ten_san_pham, 'noidung' => $info[0]->noidung, 'ngaydat' => $info[0]->thoi_gian, 'diachi' => $info[0]->dia_chi]
            // ...
        ];

        // Tạo một trang mới
        $this->AddPage();
        // Thêm dữ liệu hóa đơn
        $this->SetFont('dejavusans', '', 12);
        $this->MultiCell(180, 200, '
<table style="border: 1px solid black;width: 100%;">
    <tr style="height: 60px">
        <td style="border-bottom: 1px dashed black">
            <img src="assets/imgs/donHang/logo.png"  alt="">
        </td>
        <td style="border: 1px dashed black;display: flex;justify-content: center;align-items: center;padding: 15px">
            <img src="assets/imgs/donHang/maVach.png" style="width: 200px;height: 50px;margin: 15px" alt="">
            <p><b>Mã vạch</b>: 121 342 433 433</p>
        </td>
    </tr>
    <tr>
        <td style="border-bottom: 1px dashed black;">
            <b>Từ:</b>
            <p>Cao Đẳng FPT Folytechnic cơ sở Trịnh Văn Bô (Nam Từ Liêm - Hà Nội)</p>
        </td>
        <td style="border-bottom: 1px dashed black;border-left: 1px dashed black">
            <b>Đến:</b>(Chỉ giao hàng giờ hành chính)
            <p>' . $invoiceData[0]['diachi'] . '</p>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="border-bottom: 1px dashed black;text-align: center">
            <h2 style="text-align: center;width: 100%;height: 30px;">MÃ HÓA ĐƠN: ' . $invoiceData[0]['ma_hoa_don'] . '</h2>
            <br>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="border-bottom: 1px dashed black;width: 70%">
            <b>Nội dung hàng (Tổng số lượng sản phẩm)</b>
            <p>1. ' . $invoiceData[0]['ten'] . '</p>           
            <b>Nội dung khách hàng</b>
            <p>' . $invoiceData[0]['noidung'] . '</p>
        </td>
        <td colspan="1" style="border-left: 1px dashed black;border-bottom: 1px dashed black;height: 30%">
            <table style="height: 100%">
                <tr>
                    <td>
                        <img src="assets/imgs/donHang/qrcode.png" style="width: 100px;height: 100px" alt="">
                    </td>
                </tr>
                <tr>
                    <td style="border-top: 1px dashed black;width: 130px"></td>
                </tr>
                <tr>
                    <td >
                        <p>Ngày đặt hàng</p>
                        <b>' . $invoiceData[0]['ngaydat'] . '</b>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr style="border: 1px solid black;width: 100%;height: 200px">
        <td style="width: 50%">
            <p>Tiền thu người nhận:</p>
            <h3>' . $invoiceData[0]['tong_tien'] . ' VND</h3>
        </td>
        <td style="width: 50%">
            <p>Khối lượng tối đa 5kg</p>
            <div style="height: 150px;border: 1px solid black;width: 20px;" >
                <b>Chữ ký người nhận</b>
                <p>Xác nhận Hàng nguyên vẹn, không móp méo, bể vỡ <br> <br></p>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="border-bottom: 1px dashed black;border-top: 1px dashed black;text-align: center">
            <p><b>Chỉ dẫn giao hàng:</b> Không đồng kiểm; Chuyển hoàn sau 3 lần phát; Lưu kho tối đa 5 ngày.</p>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center">
            <p><b style="color: red">Lưu ý:</b> trước khi mở hàng cần quay video làm bằng chứng để thực hiện bảo hành theo điều khoản shop.</p>
        </td>
    </tr>
</table>

', 0, null, false, 1, null, null, true, true, true, true, null);

        // Tải về trực tiếp trên trình duyệt
        $this->Output('invoice.pdf', 'D');
    }
}
