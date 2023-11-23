<?php
include "views/layout/user/Header.php";
?>

<body>
    <section class="product-tabs section-padding position-relative wow fadeIn animated " ">
        <div class=" bg-square" style="background-color: #fff;">
        </div>

        <div class="container">
            <!-- danh muc -->
            <div class="tab-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <?php
                    foreach ($danh_muc as $key => $vl) {
                        $ten[] = $vl->ten;
                        $id[] = $vl->id;
                    } ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true"><?php echo $ten[0] ?></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two" type="button" role="tab" aria-controls="tab-two" aria-selected="false"><?php echo $ten[1] ?></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-three" data-bs-toggle="tab" data-bs-target="#tab-three" type="button" role="tab" aria-controls="tab-three" aria-selected="false"><?php echo $ten[2] ?></button>
                    </li>
                </ul>
            </div>
            <!--End nav-tabs-->
            <div class="tab-content wow fadeIn animated" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                    <div class="row product-grid-4">
                        <?php
                        $count_one = 0;
                        foreach ($san_pham as $key => $vl) {

                            if ($vl->id_loai_san_pham == $id[0]) {
                                $count_one++;
                        ?>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom" style="min-height: 300px; max-height:300px ; overflow: hidden;">
                                                <a href="index.php?controller=sanPham_view&id=<?php echo $vl->id_san_pham ?>&loai=<?php echo $vl->id_loai_san_pham ?>&botruyen=<?php echo $vl->id_bo_truyen ?>">
                                                    <img class="default-img" src="assets/imgs/shop/<?php echo $vl->hinh_anh ?>" style="margin: auto;min-height:  300px;" alt="loi">
                                                    <img class="hover-img" src="assets/imgs/shop/<?php echo $vl->hinh_anh ?>" style="margin: auto;min-height:  300px;" alt="loi">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn hover-up" href="index.php?controller=sanPham_view&id=<?php echo $vl->id_san_pham ?>&loai=<?php echo $vl->id_loai_san_pham ?>&botruyen=<?php echo $vl->id_bo_truyen ?>""><i
                                                class=" fi-rs-eye"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Mua ngay" class="action-btn hover-up" href="index.php?controller=muaHang&id=<?php echo $vl->id_san_pham ?>"><i class="fas fa-truck"></i></i></a>
                                            </div>

                                        </div>
                                        <div class="product-content-wrap" id="productInfo">
                                            <h2><a href="index.php?controller=sanPham_view&id=<?php echo $vl->id_san_pham ?>&loai=<?php echo $vl->id_loai_san_pham ?>&botruyen=<?php echo $vl->id_bo_truyen ?>""><?php echo $vl->ten_san_pham ?></a></h2>
                                    <div class=" rating-result" title="90%">
                                                    <span>
                                                        <span>90%</span>
                                                    </span>
                                        </div>
                                        <div class="product-price">
                                            <span><?php echo  number_format($vl->gia_ban, 0, ',', '.') ?> VND</span>
                                            <span class="old-price"><?php echo  number_format($vl->gia_goc, 0, ',', '.') ?>
                                                VND</span>
                                        </div>
                                        <div class="product-action-1 show">
                                            <button aria-label="Add To Cart" id="add_card" onclick="addToCart(<?php echo $vl->id_san_pham ?>)" class="action-btn hover-up"><i class="fi-rs-shopping-bag-add"></i></button>
                                        </div>
                                    </div>
                                </div>
                    </div>
            <?php }
                            if ($count_one == 8) {
                                break;
                            }
                        }
            ?>
                </div>
                <!--End product-grid-4-->
            </div>
            <!--En tab one (Featured)-->
            <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                <div class="row product-grid-4">
                    <?php
                    $count_tow = 0;
                    foreach ($san_pham as $key => $vl) {
                        if ($vl->id_loai_san_pham == $id[1]) {
                            $count_tow++;
                    ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom" style="min-height: 300px; max-height:300px ; overflow: hidden;">
                                            <a href="index.php?controller=sanPham_view&id=<?php echo $vl->id_san_pham ?>&loai=<?php echo $vl->id_loai_san_pham ?>&botruyen=<?php echo $vl->id_bo_truyen ?>">
                                                <img class="default-img" src="assets/imgs/shop/<?php echo $vl->hinh_anh ?>" style="margin: auto;min-height:  300px;" alt="loi">
                                                <img class="hover-img" src="assets/imgs/shop/<?php echo $vl->hinh_anh ?>" style="margin: auto;min-height:  300px;" alt="loi">
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up" href="index.php?controller=sanPham_view&id=<?php echo $vl->id_san_pham ?>&loai=<?php echo $vl->id_loai_san_pham ?>&botruyen=<?php echo $vl->id_bo_truyen ?>""><i
                                                class=" fi-rs-eye"></i></a>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Mua ngay" class="action-btn hover-up" href="index.php?controller=muaHang&id=<?php echo $vl->id_san_pham ?>"><i class="fas fa-truck"></i></i></a>
                                        </div>

                                    </div>
                                    <div class="product-content-wrap" id="productInfo">
                                        <h2><a href="index.php?controller=sanPham_view&id=<?php echo $vl->id_san_pham ?>&loai=<?php echo $vl->id_loai_san_pham ?>&botruyen=<?php echo $vl->id_bo_truyen ?>""><?php echo $vl->ten_san_pham ?></a></h2>
                                    <div class=" rating-result" title="90%">
                                                <span>
                                                    <span>90%</span>
                                                </span>
                                    </div>
                                    <div class="product-price">
                                        <span><?php echo  number_format($vl->gia_ban, 0, ',', '.') ?> VND</span>
                                        <span class="old-price"><?php echo  number_format($vl->gia_goc, 0, ',', '.') ?>
                                            VND</span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <button aria-label="Add To Cart" id="add_card" onclick="addToCart(<?php echo $vl->id_san_pham ?>)" class="action-btn hover-up"><i class="fi-rs-shopping-bag-add"></i></button>
                                    </div>
                                </div>
                            </div>
                </div>
        <?php }
                        if ($count_tow == 8) {
                            break;
                        }
                    } ?>
            </div>
            <!--End product-grid-4-->
        </div>
        <!--En tab two (Popular)-->
        <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
            <div class="row product-grid-4">
                <?php
                $count_three = 0;
                foreach ($san_pham as $key => $vl) {
                    if ($vl->id_loai_san_pham == $id[2]) {
                        $count_three++;
                ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom" style="min-height: 300px; max-height:300px ; overflow: hidden;">
                                        <a href="index.php?controller=sanPham_view&id=<?php echo $vl->id_san_pham ?>&loai=<?php echo $vl->id_loai_san_pham ?>&botruyen=<?php echo $vl->id_bo_truyen ?>">
                                            <img class="default-img" src="assets/imgs/shop/<?php echo $vl->hinh_anh ?>" alt="loi" width="100%" alt="" style="margin:  auto;min-height:  300px;">
                                            <img class="hover-img" src="assets/imgs/shop/<?php echo $vl->hinh_anh ?>" alt="loi" width="100%" alt="" style="margin: auto;min-height: 300px;">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up" href="index.php?controller=sanPham_view&id=<?php echo $vl->id_san_pham ?>&loai=<?php echo $vl->id_loai_san_pham ?>&botruyen=<?php echo $vl->id_bo_truyen ?>""><i
                                                class=" fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Mua ngay" class="action-btn hover-up" href="index.php?controller=muaHang&id=<?php echo $vl->id_san_pham ?>"><i class="fas fa-truck"></i></i></a>
                                    </div>

                                </div>
                                <div class="product-content-wrap" id="productInfo">
                                    <h2><a href="index.php?controller=sanPham_view&id=<?php echo $vl->id_san_pham ?>&loai=<?php echo $vl->id_loai_san_pham ?>&botruyen=<?php echo $vl->id_bo_truyen ?>""><?php echo $vl->ten_san_pham ?></a></h2>
                                    <div class=" rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                </div>
                                <div class="product-price">
                                    <span><?php echo  number_format($vl->gia_ban, 0, ',', '.') ?> VND</span>
                                    <span class="old-price"><?php echo  number_format($vl->gia_goc, 0, ',', '.') ?>
                                        VND</span>
                                </div>
                                <div class="product-action-1 show">
                                    <button aria-label="Add To Cart" id="add_card" onclick="addToCart(<?php echo $vl->id_san_pham ?>)" class="action-btn hover-up"><i class="fi-rs-shopping-bag-add"></i></button>
                                </div>
                            </div>
                        </div>
            </div>
    <?php }
                    if ($count_three == 8) {
                        break;
                    }
                } ?>
        </div>
        <!--End product-grid-4-->
        </div>
        <!--En tab three (New added)-->
        </div>
        <!--End tab-content-->
        </div>
    </section>
</body>
<?php include "views/layout/user/Footer.php"; ?>