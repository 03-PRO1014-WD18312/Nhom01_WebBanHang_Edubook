<?php
class DonHang{
    public $id_don_hang,$id_san_pham,$id_user,$so_luong,$thanh_tien,$id_thanh_toan,$id_phieu_giam_gia,$id_trang_thai_don_hang;
    public function __construct( $id_don_hang,$id_san_pham,$id_user,$so_luong,$thanh_tien,$id_thanh_toan,$id_phieu_giam_gia,$id_trang_thai_don_hang)
    {
        $this->id_don_hang = $id_don_hang;
        $this->id_san_pham = $id_san_pham;
        $this->id_user = $id_user;
        $this->so_luong = $so_luong;
        $this->thanh_tien = $thanh_tien;
        $this->id_thanh_toan = $id_thanh_toan;
        $this->id_phieu_giam_gia = $id_phieu_giam_gia;
        $this->id_trang_thai_don_hang = $id_trang_thai_don_hang;
    }
}