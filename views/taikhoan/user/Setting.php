<?php include "views/layout/user/Header.php"; ?>
<main class="main">
    <section class="pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto" style="width: 100%;">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="dashboard-menu">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab"
                                            href="#dashboard" role="tab" aria-controls="dashboard"
                                            aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Đơn hàng</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab"
                                            href="#track-orders" role="tab" aria-controls="track-orders"
                                            aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Lịch sử
                                            mua hàng</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address"
                                            role="tab" aria-controls="address" aria-selected="true"><i
                                                class="fi-rs-marker mr-10"></i>Địa chỉ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab"
                                            href="#account-detail" role="tab" aria-controls="account-detail"
                                            aria-selected="true"><i class="fi-rs-user mr-10"></i>Thông tin</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php?controller=dangXuat"><i
                                                class="fi-rs-sign-out mr-10"></i>Đăng xuất</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel"
                                    aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Đơn hàng</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Mã Đơn hàng</th>
                                                            <th>Ngày đặt</th>
                                                            <th>Trạng thái</th>
                                                            <th>Sản Phẩm</th>
                                                            <th>Thanh toán</th>
                                                            <th>điều khiển</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $list_dh = [];

                                                        foreach ($list_don_hang as $vl) {
                                                            $found = false;

                                                            foreach ($list_dh as &$vl2) {
                                                                if ($vl2['id'] == $vl->id_don_hang) {
                                                                    $vl2['san_pham'] .= "<br>" . $vl->ten_san_pham;
                                                                    $vl2['tien'] += $vl->so_luong * $vl->gia;
                                                                    $found = true;
                                                                    break;
                                                                }
                                                            }
                                                            if (!$found) {
                                                                $id = $vl->id_don_hang;
                                                                $ngay = $vl->thoi_gian;
                                                                $trang_thai = $vl->trang_thai_don_hang;
                                                                $san_pham = $vl->ten_san_pham;
                                                                $tien = $vl->so_luong * $vl->gia;

                                                                $list_dh[] = [
                                                                    'id' => $id,
                                                                    'ngay' => $ngay,
                                                                    'trang_thai' => $trang_thai,
                                                                    'san_pham' => $san_pham,
                                                                    'tien' => $tien
                                                                ];
                                                            }
                                                        }
                                                        ?>
                                                        <?php

                                                        foreach ($list_dh as $key => $vl) {

                                                        ?>
                                                        <tr>
                                                            <td><?php echo $vl['id'] ?></td>
                                                            <td><?php echo $vl['ngay'] ?></td>
                                                            <td><?php echo $vl['trang_thai'] ?></td>
                                                            <td><?php echo $vl['san_pham'] ?></td>
                                                            <td><?php echo $vl['tien'] ?></td>
                                                            <td><a href="#" class="btn-small d-block">View</a></td>
                                                        </tr>
                                                        <?php
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="track-orders" role="tabpanel"
                                    aria-labelledby="track-orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Lịch sử mua hàng</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Mã Đơn hàng</th>
                                                            <th>Ngày đặt</th>
                                                            <th>Trạng thái</th>
                                                            <th>Sản Phẩm</th>
                                                            <th>Thanh toán</th>
                                                            <th>điều khiển</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $list_dh = [];

                                                        foreach ($list_lich_su as $vl) {
                                                            $found = false;

                                                            foreach ($list_dh as &$vl2) {
                                                                if ($vl2['id'] == $vl->id_don_hang) {
                                                                    $vl2['san_pham'] .= "<br>" . $vl->ten_san_pham;
                                                                    $vl2['tien'] += $vl->so_luong * $vl->gia;
                                                                    $found = true;
                                                                    break;
                                                                }
                                                            }

                                                            if (!$found) {
                                                                $id = $vl->id_don_hang;
                                                                $ngay = $vl->thoi_gian;
                                                                $trang_thai = $vl->trang_thai_don_hang;
                                                                $san_pham = $vl->ten_san_pham;
                                                                $tien = $vl->so_luong * $vl->gia;

                                                                $list_dh[] = [
                                                                    'id' => $id,
                                                                    'ngay' => $ngay,
                                                                    'trang_thai' => $trang_thai,
                                                                    'san_pham' => $san_pham,
                                                                    'tien' => $tien
                                                                ];
                                                            }
                                                        }
                                                        ?>
                                                        <?php

                                                        foreach ($list_dh as $key => $vl) {

                                                        ?>
                                                        <tr>
                                                            <td><?php echo $vl['id'] ?></td>
                                                            <td><?php echo $vl['ngay'] ?></td>
                                                            <td><?php echo $vl['trang_thai'] ?></td>
                                                            <td><?php echo $vl['san_pham'] ?></td>
                                                            <td><?php echo $vl['tien'] ?></td>
                                                            <td><a href="#" class="btn-small d-block">View</a></td>
                                                        </tr>
                                                        <?php
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card mb-3 mb-lg-0">
                                                <div class="card-header">
                                                    <h5 class="mb-0">Địa chỉ mặc định</h5>
                                                </div>
                                                <div class="card-body">
                                                    <address>000 Interstate<br> 00 Business Spur,<br> Sault Ste.
                                                        <br>Marie, MI 00000
                                                    </address>
                                                    <p>New York</p>
                                                    <a href="#" class="btn-small">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="mb-0">Địa chỉ khác</h5>
                                                </div>
                                                <div class="card-body">
                                                    <address>4299 Express Lane<br>
                                                        Sarasota, <br>FL 00000 USA <br>Phone: 1.000.000.0000</address>
                                                    <p>Sarasota</p>
                                                    <a href="#" class="btn-small">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-detail" role="tabpanel"
                                    aria-labelledby="account-detail-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Thông tin tài khoản</h5>
                                        </div>
                                        <div class="card-body">

                                            <form method="post" name="enq">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label>Hình ảnh<span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="dname"
                                                            type="file">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Tên người dùng <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="dname"
                                                            type="text">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Địa chỉ email <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="email"
                                                            type="email">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Mật khẩu <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="password"
                                                            type="password">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Mật Khẩu mới <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="npassword"
                                                            type="password">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Xác thực mật khẩu <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="cpassword"
                                                            type="password">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-fill-out submit"
                                                            name="submit" value="Submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include "views/layout/user/Footer.php"; ?>