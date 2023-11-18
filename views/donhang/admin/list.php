<?php include "views/layout/admin/Header.php";
?>
<!-- Begin Page Content -->

<!-- /.container-fluid -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách loại sản phẩm</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Id đơn hàng</th>
                            <th>Id sản phẩm</th>
                            <th>Id user</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Id thanh toán</th>
                            <th>Phiếu giảm giá</th>
                            <th>Trạng thái</th>
                            <th>button</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Id đơn hàng</th>
                            <th>Id sản phẩm</th>
                            <th>Id user</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Id thanh toán</th>
                            <th>Phiếu giảm giá</th>
                            <th>Trạng thái</th>
                            <th>button</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach ($list as $i => $dh) {?>
                        <tr>
                            <td><?php echo $i+1?></td>
                            <td><?php echo $dh->id_don_hang?></td>
                            <td><?php echo $dh->id_san_pham?></td>
                            <td><?php echo $dh->id_user?></td>
                            <td><?php echo $dh->so_luong?></td>
                            <td><?php echo $dh->thanh_tien?></td>
                            <td><?php echo $dh->id_thanh_toan?></td>
                            <td><?php echo $dh->id_phieu_giam_gia?></td>
                            <td><?php echo $dh->id_trang_thai_don_hang?></td>
                           <td>
                               <a href="index.php?controller=donHang_delete&id=<?php echo $dh->id_don_hang?>">Xóa</a>
                           </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- End of Main Content -->
<?php include "views/layout/admin/Footer.php"; ?>