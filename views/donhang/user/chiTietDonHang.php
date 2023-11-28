<?php include_once 'views/layout/user/Header.php'; ?>

<main class="main">
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-25">
                        <h4>Thông tin hóa đơn</h4>
                    </div>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="fname">Họ và tên:</label>
                            <input class="form-control" type="text" required="" name="txt_billing_fullname" placeholder="Họ và tên *" value="<?php echo $thongTinUs[0]->ten ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="sdt">Số điện thoại:</label>
                            <input class="form-control" required="" type="text" name="txt_billing_mobile" placeholder="Số điện thoại *" value="<?php echo $thongTinUs[0]->sdt ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="diaChi">Địa chỉ:</label>
                            <input class="form-control" type="text" name="txt_billing_addr1" required="" placeholder="Địa chỉ *" value="<?php echo $thongTinUs[0]->dia_chi ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="diaChi">Mã hóa đơn:</label>
                            <input class="form-control" id="order_id" name="order_id" type="text" value="<?php echo $thongTinUs[0]->ma_don ?>" readonly />
                        </div>
                        <input class="form-control" name="amount" type="hidden" value="<?php echo $thanhTien ?>">
                        <!-- Thời hạn thanh toán -->
                        <div class="form-group">
                            <label for="diaChi">Ngày đặt hàng:</label>
                            <input class="form-control" id="order_id" name="order_id" type="text" value="<?php echo $thongTinUs[0]->thoi_gian ?>" readonly />
                        </div>

                        <div class="form-group">
                            <label for="diaChi">Phương thức thanh toán:</label>
                            <input class="form-control" id="order_id" name="order_id" type="text" value="<?php echo $thongTinUs[0]->phung_thuc ?>" readonly />
                        </div>

                        <br>
                </div>
                <div class="col-md-6">
                    <div class="order_review">
                        <div class="mb-20">
                            <h4>Thông tin sản phẩm</h4>
                        </div>
                        <div class="table-responsive order_table text-center">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Sản phẩm</th>
                                        <th>Giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $thanhTien = 0;
                                    foreach ($thongTinSp as $sp) { ?>
                                        <tr>
                                            <td class="image product-thumbnail"><img src="assets/imgs/shop/<?php echo $sp->hinh_anh ?>" alt="#"></td>
                                            <td>
                                                <h5><a href="index.php?controller=sanPham_view&id=<?php echo $sp->id_san_pham ?>&loai=<?php echo $sp->id_loai_san_pham ?>&botruyen=<?php echo $sp->id_bo_truyen ?>"><?php echo $sp->ten_san_pham ?></a>
                                                    <span class="product-qty">x<?php echo $sp->so_luong; ?></span>
                                                </h5>

                                            </td>
                                            <td><?php echo  number_format($sp->gia, 0, ',', '.') ?> VND</td>
                                        </tr>
                                    <?php $thanhTien += $sp->so_luong * $sp->gia;
                                    } ?>
                                    <tr>
                                        <th>Phí giao hàng</th>
                                        <td colspan="2"><em>Miễn phí</em></td>
                                    </tr>
                                    <tr>
                                        <th>Thành tiền</th>
                                        <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900"><?php echo number_format($thanhTien, 0, ',', '.') ?>
                                                VND</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include_once 'views/layout/user/Footer.php'; ?>