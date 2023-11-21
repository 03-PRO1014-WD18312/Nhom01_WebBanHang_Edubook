<?php
include "views/layout/user/Header.php";
?>
<main class="main">
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row product-grid-3">
                        <?php
                        $count_one = 0;
                        foreach ($list as $key => $vl) {
                            $count_one++;

                        ?>
                            <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                <div class="product-cart-wrap mb-30" style="max-width: 400px ;">
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
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
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
                                        <span>$238.85 </span>
                                        <span class="old-price">$245.8</span>
                                    </div>
                                    <div class="product-action-1 show">
                                        <button aria-label="Add To Cart" id="add_card" onclick="addToCart(<?php echo $vl->id_san_pham ?>)" class="action-btn hover-up"><i class="fi-rs-shopping-bag-add"></i></button>
                                    </div>
                                </div>
                            </div>
                    </div>
                <?php
                            if ($count_one == 12) {
                                break;
                            }
                        }
                ?>
                </div>
                <!--pagination-->
                <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-start">
                            <li class="page-item active"><a class="page-link" href="#">01</a></li>
                            <li class="page-item"><a class="page-link" href="#">02</a></li>
                            <li class="page-item"><a class="page-link" href="#">03</a></li>
                            <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">16</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fi-rs-angle-double-small-right"></i></a></li>
                        </ul>
                    </nav>
                </div>

            </div>
            <div class="col-lg-3 primary-sidebar sticky-sidebar">
                <div class="row">
                    <div class="col-lg-12 col-mg-6"></div>
                    <div class="col-lg-12 col-mg-6"></div>
                </div>
                <div class="widget-category mb-30">
                    <h5 class="section-title style-1 mb-30 wow fadeIn animated">Danh mục</h5>
                    <ul class="categories">
                        <?php foreach ($danh_muc as $key => $vl) { ?>
                            <li><a href="index.php?controller=sanPham&id=<?php echo $vl->id ?>"><?php echo $vl->ten ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <!-- Product sidebar Widget -->
                <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                    <div class="widget-header position-relative mb-20 pb-10">
                        <h5 class="widget-title mb-10">New products</h5>
                        <div class="bt-1 border-color-1"></div>
                    </div>
                    <?php
                    $count_one = 0;
                    foreach ($list as $key => $vl) {
                        $count_one++;

                    ?>
                        <div class="single-post clearfix">
                            <div class="image">
                                <img src="assets/imgs/shop/<?php echo $vl->hinh_anh ?>" alt="#">
                            </div>
                            <div class="content pt-10">
                                <h5><a href="index.php?controller=sanPham_view&id=<?php echo $vl->id_san_pham ?>&loai=<?php echo $vl->id_loai_san_pham ?>&botruyen=<?php echo $vl->id_bo_truyen ?>"><?php echo $vl->ten_san_pham ?></a>
                                </h5>
                                <p class="price mb-0 mt-5"><?php echo $vl->gia_ban ?></p>
                                <div class="product-rate">
                                    <div class="product-rating" style="width:100%"></div>
                                </div>
                            </div>
                        </div>
                    <?php
                        if ($count_one == 3) {
                            break;
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
        </div>
    </section>
</main>
<?php include "views/layout/user/Footer.php"; ?>