<?php include "views/layout/admin/Header.php";
?>
<!-- Begin Page Content -->

<!-- /.container-fluid -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách đơn hàng</h1>
    <h1>
        <?php if (isset($_SESSION['error'])) {
            echo $_SESSION['error'];
        } ?>
    </h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Id đơn hàng</th>
                            <th>Id user</th>
                            <th>Thời gian</th>
                            <th>Trạng thái</th>
                            <th>Chi tiết</th>
                            <th>button</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Id đơn hàng</th>
                            <th>Id user</th>
                            <th>Thời gian</th>
                            <th>Trạng thái</th>
                            <th>Chi tiết</th>
                            <th>button</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($list as $i => $dh) { ?>
                            <tr>
                                <td><?php echo $i + 1 ?></td>
                                <td><?php echo $dh->id_don_hang ?></td>
                                <td><?php echo $dh->id_user ?></td>
                                <td><?php echo $dh->thoi_gian ?></td>
                                <td <?php
                                    if ($dh->ten_tt_don_hang == "Chờ xác nhận") {
                                        echo 'style="color: Yellow"';
                                    } elseif ($dh->ten_tt_don_hang == "Đang giao hàng") {
                                        echo 'style="color: Green"';
                                    } elseif ($dh->ten_tt_don_hang == "Hủy") {
                                        echo 'style="color: Blue"';
                                    } elseif ($dh->ten_tt_don_hang == "Đã giao hàng") {
                                        echo 'style="color: Red"';
                                    } elseif ($dh->ten_tt_don_hang == "Giao hàng không thành công") {
                                        echo 'style="color: Gray"';
                                    }
                                    ?>>
                                    <?php echo $dh->ten_tt_don_hang ?></td>
                                <td>
                                    <a href="index.php?controller=donHang_fix&id=<?php echo $dh->id_don_hang ?>">Chi tiết
                                        đơn
                                        hàng</a>
                                </td>
                                <td>
                                    <?php
                                    if ($dh->id_trang_thai_don_hang == 1) {
                                        echo ' <button style="border: none;background-color: #2850c3;border-radius: 3px"><a style="padding: 3px;color: white" href="index.php?controller=donHang_update_tt&tt=2&id=' . $dh->id_don_hang . '">Giao hàng</a></button>';
                                    } elseif ($dh->id_trang_thai_don_hang == 2) {
                                        echo '<button style="border: none;background-color: #2850c3;border-radius: 3px"><a style="padding: 3px;color: white" href="index.php?controller=donHang_update_tt&tt=3&id=' . $dh->id_don_hang . '">Giao hàng thành công</a></button> <br> <br> <button style="border: none;background-color: #2850c3;border-radius: 3px"><a style="padding: 3px;color: white" href="index.php?controller=donHang_update_tt&tt=4&id=' . $dh->id_don_hang . '">Giao hàng không thành công</a></button>';
                                    } elseif ($dh->id_trang_thai_don_hang == 3 || $dh->id_trang_thai_don_hang == 4 || $dh->id_trang_thai_don_hang == 5) {
                                        echo '<p>' . $dh->ten_tt_don_hang . '</p>';
                                    }
                                    ?>

                                    <?php ?>
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