<?php include "views/layout/user/Header.php"; ?>
<main class="main">
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="product-detail accordion-detail">
                        <div class="row mb-50">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-gallery">
                                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                    <!-- MAIN SLIDES -->
                                    <div class="product-image-slider">

                                        <?php foreach ($imgs as $key => $vl) { ?>
                                            <figure class="border-radius-10">
                                                <img src="assets/imgs/shop/<?php echo $vl['hinh_anh'] ?>" alt="product image">
                                            </figure>
                                        <?php } ?>
                                    </div>
                                    <!-- THUMBNAILS -->
                                    <div class="slider-nav-thumbnails pl-15 pr-15">
                                        <?php foreach ($imgs as $key => $vl) { ?>
                                            <div><img src="assets/imgs/shop/<?php echo $vl['hinh_anh'] ?>" alt="product image"></div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!-- End Gallery -->
                                <div class="social-icons single-share">
                                    <ul class="text-grey-5 d-inline-block">
                                        <li><strong class="mr-10">Share this:</strong></li>
                                        <li class="social-facebook"><a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a></li>
                                        <li class="social-twitter"> <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt=""></a></li>
                                        <li class="social-instagram"><a href="#"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a></li>
                                        <li class="social-linkedin"><a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <?php foreach ($infor as $key => $vl) { ?>
                                    <div class="detail-info">
                                        <h2 class="title-detail"><?php echo $vl->ten_san_pham ?></h2>

                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                                <ins><span class="text-brand"><?php echo $vl->gia_ban ?></span></ins>
                                                <ins><span class="old-price font-md ml-15"><?php echo $vl->gia_goc ?></span></ins>
                                                <span class="save-price  font-md color3 ml-15"><?php echo ($vl->gia_ban / $vl->gia_goc) * 100 ?>% Off</span>
                                            </div>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                        <div class="short-desc mb-30">
                                            <p><?php echo $vl->mo_ta ?></p>
                                        </div>
                                        <div class="product_sort_info font-xs mb-30">
                                            <ul>
                                                <li class="mb-10"><i class="fi-rs-crown mr-5"></i> 1 Year AL Jazeera Brand Warranty</li>
                                                <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> 30 Day Return Policy</li>
                                                <li><i class="fi-rs-credit-card mr-5"></i> Cash on Delivery available</li>
                                            </ul>
                                        </div>

                                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                        <div class="detail-extralink">
                                            <div class="detail-qty border radius">
                                                <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                                <span class="qty-val">1</span>
                                                <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                            </div>
                                            <div class="product-extra-link2">
                                                <button type="submit" class="button button-add-to-cart">Add to cart</button>

                                                <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    </div>
                                    <!-- Detail Info -->
                            </div>
                        </div>
                        <div class="tab-style3">
                            <ul class="nav nav-tabs text-uppercase">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">CHI TIẾT</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">BÌNH LUẬN</a>
                                </li>
                            </ul>
                            <div class="tab-content shop_info_tab entry-main-content">
                                <div class="tab-pane fade show active" id="Description">
                                    <table class="font-md">
                                        <tbody>
                                            <?php foreach ($infor as $key => $vl) { ?>
                                                <tr class="stand-up">
                                                    <th>Số lượng sách</th>
                                                    <td>
                                                        <p><?php echo $vl->so_luong ?></p>
                                                    </td>
                                                </tr>
                                                <tr class="stand-up">
                                                    <th>Tác giả</th>
                                                    <td>
                                                        <p><?php echo $vl->id_tac_gia ?></p>
                                                    </td>
                                                </tr>
                                                <tr class="stand-up">
                                                    <th>Năm xuất bản</th>
                                                    <td>
                                                        <p><?php echo $vl->nam_xb ?></p>
                                                    </td>
                                                </tr>
                                                <tr class="stand-up">
                                                    <th>Thể loại</th>
                                                    <td>
                                                        <p><?php echo $vl->id_loai_san_pham ?></p>
                                                    </td>
                                                </tr>
                                                <tr class="stand-up">
                                                    <th>Nhà xuất bản</th>
                                                    <td>
                                                        <p><?php echo $vl->id_nha_san_xuat ?></p>
                                                    </td>
                                                </tr>
                                                <tr class="stand-up">
                                                    <th>Nhà phát hành</th>
                                                    <td>
                                                        <p><?php echo $vl->id_nha_phat_hanh ?></p>
                                                    </td>
                                                </tr>
                                                <tr class="stand-up">
                                                    <th>Trọng lượng</th>
                                                    <td>
                                                        <p><?php echo $vl->trong_luong ?></p>
                                                    </td>
                                                </tr>
                                                <tr class="stand-up">
                                                    <th>Kích thức</th>
                                                    <td>
                                                        <p><?php echo $vl->kich_thuoc ?></p>
                                                    </td>
                                                </tr>
                                                <tr class="stand-up">
                                                    <th>Số trang</th>
                                                    <td>
                                                        <p><?php echo $vl->so_trang ?></p>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="Reviews">
                                    <!--Comments-->
                                    <div class="comments-area">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <h4 class="mb-30">Customer questions & answers</h4>
                                                <div class="comment-list">
                                                    <div class="single-comment justify-content-between d-flex">
                                                        <div class="user justify-content-between d-flex">
                                                            <div class="thumb text-center">
                                                                <img src="assets/imgs/page/avatar-6.jpg" alt="">
                                                                <h6><a href="#">Jacky Chan</a></h6>
                                                                <p class="font-xxs">Since 2012</p>
                                                            </div>
                                                            <div class="desc">
                                                                <div class="product-rate d-inline-block">
                                                                    <div class="product-rating" style="width:90%">
                                                                    </div>
                                                                </div>
                                                                <p>Thank you very fast shipping from Poland only 3days.</p>
                                                                <div class="d-flex justify-content-between">
                                                                    <div class="d-flex align-items-center">
                                                                        <p class="font-xs mr-30">December 4, 2020 at 3:12 pm </p>
                                                                        <a href="#" class="text-brand btn-reply">Reply <i class="fi-rs-arrow-right"></i> </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--single-comment -->
                                                    <div class="single-comment justify-content-between d-flex">
                                                        <div class="user justify-content-between d-flex">
                                                            <div class="thumb text-center">
                                                                <img src="assets/imgs/page/avatar-7.jpg" alt="">
                                                                <h6><a href="#">Ana Rosie</a></h6>
                                                                <p class="font-xxs">Since 2008</p>
                                                            </div>
                                                            <div class="desc">
                                                                <div class="product-rate d-inline-block">
                                                                    <div class="product-rating" style="width:90%">
                                                                    </div>
                                                                </div>
                                                                <p>Great low price and works well.</p>
                                                                <div class="d-flex justify-content-between">
                                                                    <div class="d-flex align-items-center">
                                                                        <p class="font-xs mr-30">December 4, 2020 at 3:12 pm </p>
                                                                        <a href="#" class="text-brand btn-reply">Reply <i class="fi-rs-arrow-right"></i> </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--single-comment -->
                                                    <div class="single-comment justify-content-between d-flex">
                                                        <div class="user justify-content-between d-flex">
                                                            <div class="thumb text-center">
                                                                <img src="assets/imgs/page/avatar-8.jpg" alt="">
                                                                <h6><a href="#">Steven Keny</a></h6>
                                                                <p class="font-xxs">Since 2010</p>
                                                            </div>
                                                            <div class="desc">
                                                                <div class="product-rate d-inline-block">
                                                                    <div class="product-rating" style="width:90%">
                                                                    </div>
                                                                </div>
                                                                <p>Authentic and Beautiful, Love these way more than ever expected They are Great earphones</p>
                                                                <div class="d-flex justify-content-between">
                                                                    <div class="d-flex align-items-center">
                                                                        <p class="font-xs mr-30">December 4, 2020 at 3:12 pm </p>
                                                                        <a href="#" class="text-brand btn-reply">Reply <i class="fi-rs-arrow-right"></i> </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--single-comment -->
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <h4 class="mb-30">Customer reviews</h4>
                                                <div class="d-flex mb-30">
                                                    <div class="product-rate d-inline-block mr-15">
                                                        <div class="product-rating" style="width:90%">
                                                        </div>
                                                    </div>
                                                    <h6>4.8 out of 5</h6>
                                                </div>
                                                <div class="progress">
                                                    <span>5 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                                </div>
                                                <div class="progress">
                                                    <span>4 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                </div>
                                                <div class="progress">
                                                    <span>3 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                                                </div>
                                                <div class="progress">
                                                    <span>2 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                                                </div>
                                                <div class="progress mb-30">
                                                    <span>1 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                                                </div>
                                                <a href="#" class="font-xs text-muted">How are ratings calculated?</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="comment-form">
                                        <h4 class="mb-15">Add a review</h4>
                                        <div class="product-rate d-inline-block mb-30">
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-12">
                                                <form class="form-contact comment_form" action="#" id="commentForm">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="button button-contactForm">Submit
                                                            Review</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-60">
                            <div class="col-12">
                                <h3 class="section-title style-1 mb-30">Sản Phẩm Liên Quan</h3>
                            </div>
                            <div class="col-12">
                                <div class="row related-products">
                                    <?php
                                    $count_one = 0;
                                    foreach ($lien_quan as $key => $vl) {
                                        $count_one++; ?>

                                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                            <div class="product-cart-wrap small hover-up">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="index.php?controller=sanPham_view&id=<?php echo $vl->id_san_pham ?>&loai=<?php echo $vl->id_loai_san_pham ?>&botruyen=<?php echo $vl->id_bo_truyen ?>" tabindex="0">
                                                            <img class="default-img" src="assets/imgs/shop/<?php echo $vl->hinh_anh ?>" alt="">
                                                            <img class="hover-img" src="assets/imgs/shop/<?php echo $vl->hinh_anh ?>" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn hover-up" href="index.php?controller=sanPham_view&id=<?php echo $vl->id_san_pham ?>&loai=<?php echo $vl->id_loai_san_pham ?>&botruyen=<?php echo $vl->id_bo_truyen ?>"><i class="fi-rs-eye"></i></a>

                                                        <a aria-label="Mua ngay" class="action-btn hover-up" href="index.php?controller=sanPham_view&id=<?php echo $vl->id_san_pham ?>&loai=<?php echo $vl->id_loai_san_pham ?>&botruyen=<?php echo $vl->id_bo_truyen ?>"><i class="fas fa-truck"></i></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="hot">Hot</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <h2><a href="index.php?controller=sanPham_view&id=<?php echo $vl->id_san_pham ?>&loai=<?php echo $vl->id_loai_san_pham ?>&botruyen=<?php echo $vl->id_bo_truyen ?>">
                                                            <?php echo $vl->ten_san_pham ?>
                                                        </a></h2>
                                                    <div class="rating-result" title="90%">
                                                        <span>
                                                        </span>
                                                    </div>
                                                    <div class="product-price">
                                                        <span><?php echo $vl->gia_ban ?> </span>
                                                        <span class="old-price"><?php echo $vl->gia_goc ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        if ($count_one == 4) {
                                            break;
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    <div class="widget-category mb-30">
                        <h5 class="section-title style-1 mb-30 wow fadeIn animated">DANH MỤC</h5>
                        <ul class="categories">
                            <li><a href="shop.html">Shoes & Bags</a></li>
                            <li><a href="shop.html">Blouses & Shirts</a></li>
                            <li><a href="shop.html">Dresses</a></li>
                            <li><a href="shop.html">Swimwear</a></li>
                            <li><a href="shop.html">Beauty</a></li>
                            <li><a href="shop.html">Jewelry & Watch</a></li>
                            <li><a href="shop.html">Accessories</a></li>
                        </ul>
                    </div>
                    <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">BỘ TRUYỆN</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>
                        <?php
                        $count_one = 0;
                        var_dump($bo_truyen);
                        foreach ($bo_truyen as $key => $vl) {
                            $count_one++; ?>

                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="assets/imgs/shop/" alt="#">
                                </div>
                                <div class="content pt-10">
                                    <h5><a href="product-details.html"><?php echo $vl->ten_san_pham ?></a></h5>
                                    <p class="price mb-0 mt-5"><?php echo $vl->gia_ban ?></p>
                                    <div class="product-rate">
                                        <div class="product-rating" style="width:90%"></div>
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