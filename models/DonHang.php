<?php
class DonHang{
    public $id_don_hang,$id_user,$thoi_gian,$id_trang_thai_don_hang,$ten_tt_don_hang;
    public function __construct($id_don_hang,$id_user,$thoi_gian,$id_trang_thai_don_hang,$ten_tt_don_hang)
    {
        $this->id_don_hang = $id_don_hang;
        $this->id_user = $id_user;
        $this->thoi_gian = $thoi_gian;
        $this->id_trang_thai_don_hang = $id_trang_thai_don_hang;
        $this->ten_tt_don_hang = $ten_tt_don_hang;
    }
}