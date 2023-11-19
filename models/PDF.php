<?php
class PDF
{
    public $ma_hoa_don, $thoi_gian, $dia_chi, $tong_tien, $ten_san_pham, $noidung, $trang_thai;
    public function __construct($ma_hoa_don, $thoi_gian, $dia_chi, $tong_tien, $ten_san_pham, $noidung, $trang_thai)
    {
        $this->ma_hoa_don = $ma_hoa_don;
        $this->thoi_gian = $thoi_gian;
        $this->dia_chi = $dia_chi;
        $this->tong_tien = $tong_tien;
        $this->ten_san_pham = $ten_san_pham;
        $this->noidung = $noidung;
        $this->trang_thai = $trang_thai;
    }
}
