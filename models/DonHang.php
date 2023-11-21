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
class ChiTietDonHang{
    public $id_chi_tiet_don_hang,$id_san_pham,$id_don_hang,$gia,$ten_san_pham,$so_luong;
    public function __construct($id_chi_tiet_don_hang,$id_san_pham,$id_don_hang,$gia,$ten_san_pham,$so_luong)
    {
        $this->id_chi_tiet_don_hang = $id_chi_tiet_don_hang;
        $this->id_san_pham = $id_san_pham;
        $this->id_don_hang = $id_don_hang;
        $this->gia = $gia;
        $this->ten_san_pham = $ten_san_pham;
        $this->so_luong = $so_luong;
    }
}