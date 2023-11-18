<?php
session_start();
include_once 'controllers/DangNhapController.php';
include_once 'controllers/TrangChuController.php';
include_once 'controllers/SanPhamController.php';
// include_once 'controllers/SettingController.php';
include_once 'controllers/GioHangController.php';
include_once 'controllers/LoaiSanPhamController.php';
include_once 'controllers/BoTruyenController.php';
include_once 'controllers/DonHangController.php';
include_once 'controllers/NhaPhatHanhController.php';
include_once 'controllers/NhaXuatBanController.php';
include_once 'controllers/TacGiaController.php';
include_once 'controllers/TaiKhoanController.php';
include_once 'controllers/ChatBoxController.php';
include_once 'controllers/BinhLuanController.php';
include_once 'controllers/PDFController.php';
$controller = $_GET['controller'] ?? 'trangChu';
// routing controller
switch ($controller) {
    case 'trangChu':
        $TrangChuController = new TrangChuController();
        $TrangChuController->index();
        break;
    case 'dangNhap':
        $DangNhapController = new DangNhapController();
        $DangNhapController->index();
        break;
    case 'dangKy':
        $DangNhapController = new DangNhapController();
        $DangNhapController->signup();
        break;
    case 'dangXuat':
        $DangNhapController = new DangNhapController();
        $DangNhapController->logout();
        break;
    case 'quenMatKhau':
        break;
    case 'sanPham':
        $SanPhamController = new SanPhamController();
        $SanPhamController->index();
        break;
    case 'sanPham_view':
        $SanPhamController = new SanPhamController();
        $SanPhamController->productDetail();
        break;
    case 'sanPham_add':
        $SanPhamController = new SanPhamController();
        $SanPhamController->add();
        break;
    case 'sanPham_fix':
        $SanPhamController = new SanPhamController();
        $SanPhamController->fix();
        break;
    case 'sanPham_fix_dlimg':
        $SanPhamController = new SanPhamController();
        $SanPhamController->sanPham_fix_dlimg();
        break;
    case 'sanPham_delete':
        $SanPhamController = new SanPhamController();
        $SanPhamController->delete();
        break;
        // case 'sanPham':
        //     $SanPhamController = new SanPhamController();
        //     $SanPhamController->index();
        //     break;
        // case 'sanPhamDetail':
        //     $SanPhamController = new SanPhamController();
        //     $SanPhamController->sanPhamDetail();
        //     break;
    case 'nhaPhatHanh':
        $NhaPhathanhController = new NhaphathanhController();
        $NhaPhathanhController->index();
        break;
    case 'nhaPhatHanh_add':
        $NhaPhathanhController = new NhaphathanhController();
        $NhaPhathanhController->add();
        break;
    case 'nhaPhatHanh_fix':
        $NhaPhathanhController = new NhaphathanhController();
        $NhaPhathanhController->update();
        break;
    case 'nhaPhatHanh_delete':
        $NhaPhathanhController = new NhaphathanhController();
        $NhaPhathanhController->remove();
        break;
    case 'nhaXuatBan':
        $NhaXuatController = new NhaXuatBanController();
        $NhaXuatController->index();
        break;
    case 'nhaXuatBan_add':
        $NhaXuatController = new NhaXuatBanController();
        $NhaXuatController->add();
        break;
    case 'nhaXuatBan_fix':
        $NhaXuatController = new NhaXuatBanController();
        $NhaXuatController->update();
        break;
    case 'nhaXuatBan_delete':
        $NhaXuatController = new NhaXuatBanController();
        $NhaXuatController->remove();
        break;
    case 'donHang':
        $DonHangController = new DonHangController();
        $DonHangController->index();
        break;
    case 'donHang_update_tt':
        $DonHangController = new DonHangController();
        $DonHangController->update_tt_dh();
        break;
    case 'donHang_fix':
        $DonHangController = new PDFController();
        $DonHangController->indexXuat();

        break;
    case 'donHang_delete':
        $DonHangController = new DonHangController();
        $DonHangController->delete();
        break;
    case 'trangThaiDH':
        $DonHangController = new DonHangController();
        $DonHangController->showTT();
        break;
    case 'trangThaiDH_update':
        $DonHangController = new DonHangController();
        $DonHangController->update_tt();
        break;
        // case 'donHang':
        //     $DonHangController = new DonHangController();
        //     $DonHangController->index();
        //     break;
        // case 'donHang_add':
        //     $DonHangController = new DonHangController();
        //     $DonHangController->index();
        //     break;
        // case 'donHang_fix':
        //     $DonHangController = new DonHangController();
        //     $DonHangController->index();
        //     break;
        // case 'donHang_delete':
        //     $DonHangController = new DonHangController();
        //     $DonHangController->index();
        //     break;
    case 'boTruyen':
        $BoTruyenController = new BoTruyenController();
        $BoTruyenController->index();
        break;
    case 'boTruyen_add':
        $BoTruyenController = new BoTruyenController();
        $BoTruyenController->add();
        break;
    case 'boTruyen_fix':
        $BoTruyenController = new BoTruyenController();
        $BoTruyenController->update();
        break;
    case 'boTruyen_delete':
        $BoTruyenController = new BoTruyenController();
        $BoTruyenController->remove();
        break;
    case 'loaisanpham':
        $loaiSanPhamController = new LoaiSanPhamController();
        $loaiSanPhamController->index();
        break;
    case 'loaisanpham_add':
        $loaiSanPhamController = new LoaiSanPhamController();
        $loaiSanPhamController->add();
        break;
    case 'loaisanpham_fix':
        $loaiSanPhamController = new LoaiSanPhamController();
        $loaiSanPhamController->update();
        break;
    case 'loaisanpham_delete':
        $loaiSanPhamController = new LoaiSanPhamController();
        $loaiSanPhamController->remove();
        break;
    case 'tacGia':
        $TacGiaController = new TacGiaController();
        $TacGiaController->index();
        break;
    case 'tacGia_add':
        $TacGiaController = new TacGiaController();
        $TacGiaController->add();
        break;
    case 'tacGia_fix':
        $TacGiaController = new TacGiaController();
        $TacGiaController->update();
        break;
    case 'tacGia_delete':
        $TacGiaController = new TacGiaController();
        $TacGiaController->delete();
        break;
    case 'taiKhoan':
        $TaiKhoansController = new TaiKhoanController();
        $TaiKhoansController->index();
        break;
    case 'taiKhoan_add':
        $TaiKhoansController = new TaiKhoanController();
        $TaiKhoansController->add();
        break;
    case 'taiKhoan_fix':
        $TaiKhoansController = new TaiKhoanController();
        $TaiKhoansController->fix();
        break;
    case 'taiKhoan_delete':
        $TaiKhoansController = new TaiKhoanController();
        $TaiKhoansController->delete();
        break;
    case 'binhLuan':
        $BinhLuanController = new BinhLuanController();
        $BinhLuanController->index();
        break;
    case 'binhLuan_add':
        break;
    case 'binhLuan_delete':
        break;
    case 'theodoi':
        break;
    case 'theodoi_add':
        break;
    case 'theodoi_delete':
        break;
    case 'giohang':
        break;
    case 'giohang_add':
        break;
    case 'giohang_fix':
        break;
    case 'giohang_delete':
        break;
    case 'setting':
        $SettingController = new SettingController();
        $SettingController->index();
        break;
    case 'chatBox':
        $ChatBoxController = new ChatBoxController();
        $ChatBoxController->index();
        break;
    case 'chatBox_mes':
        $ChatBoxController = new ChatBoxController();
        $ChatBoxController->chat();
        break;
    default:
        break;
}
unset($_SESSION['error']);
