<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>VNPAY RESPONSE</title>

    </head>
    <body>
        <?php
        session_start();
        function connect(){
            $servername = "localhost";
            $username = "root";
            $password = "";
            try {
                $conn = new PDO("mysql:host=$servername;dbname=du_an_1",$username,$password);
                $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                //echo "thanh cong";
            } catch (PDOException $e){
                //echo "lỗi";
            }
            return $conn;
        }
        function getData($query, $params = [], $getAll = true) {
            $conn = connect();
            $stmt = $conn->prepare($query);
            $stmt->execute($params);
            if ($getAll) {
                return $stmt->fetchAll();
            }
            return $stmt->fetch();
        }
        function get_time() {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $currentTime = time();
            $timestamp = $currentTime;
            return date("Y-m-d H:i:s", $timestamp);
        }
        function addDH($id_user,$time)
        {
            $sql = "INSERT INTO `don_hang`(`id_user`, `thoi_gian`, `id_trang_thai_don_hang`) VALUES (?,?,1)";
            return getData($sql, [$id_user,$time], false);
        }
        function addHD($id_don_hang,$ma_hoa_don,$phuong_thuc,$trangThai)
        {
            $sql = "INSERT INTO `ho_don`(`id_don_hang`, `ma_hoa_don`, `phuong_thuc`, `trang_thai`) VALUES (?,?,?,?)";
            return getData($sql, [$id_don_hang,$ma_hoa_don,$phuong_thuc,$trangThai], false);
        }
        function addChiTietDH($id_san_pham,$id_don_hang,$gia,$ten_san_pham,$so_luong)
        {
            $sql = "INSERT INTO `chi_tiet_don_hang`(`id_san_pham`, `id_don_hang`, `gia`, `ten_san_pham`, `so_luong`) VALUES (?,?,?,?,?)";
            return getData($sql, [$id_san_pham,$id_don_hang,$gia,$ten_san_pham,$so_luong], false);
        }
        function getOneIdDesc()
        {
            $sql = "SELECT id_don_hang FROM don_hang ORDER BY id_don_hang DESC LIMIT 1";
            return getData($sql);
        }
        function showOne($id)
        {
            $sql = "SELECT * FROM `san_pham` WHERE id_san_pham = ?";
            return getData($sql,[$id]);
        }
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        /*
         * To change this license header, choose License Headers in Project Properties.
         * To change this template file, choose Tools | Templates
         * and open the template in the editor.
         */

        $vnp_TmnCode = "87J682PG"; //Website ID in VNPAY System
        $vnp_HashSecret = "KQJDGPOXRJQROQWOENLOACLRFKMTUCSF"; //Secret key
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost/php/Nhom01_WebBanHang_Edubook/views/donhang/user/vnpay_return.php";
        $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
        //Config input format
        //Expire
        $startTime = date("YmdHis");
        $expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        if ($_GET['vnp_ResponseCode'] == 00 && $_GET['vnp_TransactionStatus'] == 00){
            if ($_SESSION['value_hd']['so_luong'] == 0){
                addDH($_SESSION['id'],get_time());
                $newIdDH = getOneIdDesc();
//                foreach ($_SESSION['value_hd']['idsp'] as $i => $item) {
//                    echo $_SESSION['value_hd']['soLuong'][$i] . "<br>";
//                    echo $_SESSION['value_hd']['idsp'][$i];
//                }

                foreach ($_SESSION['value_hd']['idsp'] as $i => $sp) {
                        $sanPham =  showOne($sp);
                        addChiTietDH($_SESSION['value_hd']['idsp'][$i],$newIdDH[0]['id_don_hang'],$sanPham[0]['gia_ban'],$sanPham[0]['ten_san_pham'],$_SESSION['value_hd']['soLuong'][$i]);
                }
                addHD($newIdDH[0]['id_don_hang'], $_SESSION['value_hd']['mahd'],"vnpay",1);
            }else{
                addDH($_SESSION['id'],get_time());
                $newIdDH = getOneIdDesc();
                $sanPham =  showOne($_SESSION['value_hd']['idsp']);
                addChiTietDH($_SESSION['value_hd']['idsp'],$newIdDH[0]['id_don_hang'],$sanPham[0]['gia_ban'],$sanPham[0]['ten_san_pham'],$_SESSION['value_hd']['so_luong']);
                addHD($newIdDH[0]['id_don_hang'], $_SESSION['value_hd']['mahd'],"vnpay",1);
            }
        }
        unset($_SESSION['value_hd']);
        ?>
        <!DOCTYPE html>
        <html class="no-js" lang="en">

        <head>
            <meta charset="utf-8">
            <title>Edu-Book</title>
            <!-- chat -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"
                  integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw=="
                  crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="../../../assets/css/chatbox/style1.css">
            <meta http-equiv="x-ua-compatible" content="ie=edge">
            <meta name="description" content="">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta property="og:title" content="">
            <meta property="og:type" content="">
            <meta property="og:url" content="">
            <meta property="og:image" content="">
            <link rel="shortcut icon" type="image/x-icon" href="../../../assets/imgs/theme/favicon.ico">
            <link rel="stylesheet" href="../../../assets/css/main.css">
            <link rel="stylesheet" href="../../../assets/css/custom.css">
            <link rel="stylesheet" href="../../../assets/css/gioithieu/gioithieu.css">
        </head>

        <body>
        <header class="header-area header-style-1 header-height-2">
            <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
                <div class="container">
                    <div class="header-wrap">
                        <div class="logo logo-width-1">
                            <a href="../../../index.php?controller=trangChu"><img src="../../../assets/imgs/logo/logo.jpg" alt="logo"></a>
                        </div>
                        <div class="header-right">
                            <div class="search-style-1">
                                <form action="../../../index.php?controller=search" method="post">
                                    <input type="text" name="search" placeholder="Tìm kiếm...">
                                </form>
                            </div>
                            <div class="header-action-right">
                                <div class="header-action-2">
                                    <div class="header-action-icon-2">
                                    </div>
                                    <div class="header-action-icon-2">
                                        <a class="mini-cart-icon" href="../../../index.php?controller=giohang">
                                            <img alt="Surfside Media" src="../../../assets/imgs/theme/icons/icon-cart.svg">
                                            <span class="pro-count blue cart" id="card"><?php echo $sum ?></span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom header-bottom-bg-color sticky-bar">
                <div class="container">
                    <div class="header-wrap header-space-between position-relative">
                        <div class="logo logo-width-1 d-block d-lg-none">
                            <a href="index.html"><img src="../../../assets/imgs/logo/logo.jpg" alt="logo"></a>
                        </div>
                        <div class="header-nav d-none d-lg-flex">
                            <div class="main-categori-wrap d-none d-lg-block">
                                <a class="categori-button-active" href="#">
                                    <span class="fi-rs-apps"></span> Danh mục
                                </a>
                                <div class="categori-dropdown-wrap categori-dropdown-active-large">
                                    <ul>
                                        <li><a href="shop.html"><i class="surfsidemedia-font-desktop"></i>Computer &
                                                Office</a></li>
                                        <li><a href="shop.html"><i class="surfsidemedia-font-cpu"></i>Consumer
                                                Electronics</a></li>
                                        <li><a href="shop.html"><i class="surfsidemedia-font-diamond"></i>Jewelry &
                                                Accessories</a></li>
                                        <!-- <li>
                                            <ul class="more_slide_open" style="display: none;">
                                                <li><a href="shop.html"><i class="surfsidemedia-font-desktop"></i>Beauty,
                                                        Health</a></li>
                                                <li><a href="shop.html"><i class="surfsidemedia-font-cpu"></i>Bags and
                                                        Shoes</a></li>
                                                <li><a href="shop.html"><i class="surfsidemedia-font-diamond"></i>Consumer
                                                        Electronics</a></li>
                                                <li><a href="shop.html"><i class="surfsidemedia-font-home"></i>Automobiles &
                                                        Motorcycles</a></li>
                                            </ul>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                            <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                                <nav>
                                    <ul>
                                        <li><a class="active" href="../../../index.php?controller=trangChu">Trang chủ </a></li>
                                        <li><a href="../../../index.php?controller=sanPham">Sản phẩm</a></li>
                                        <li><a href="../../../index.php?controller=gioiThieu">Giới thiệu</a></li>
                                        <li><a href="../../../index.php?controller=chatBox">Liên hệ </a></li>
                                        <li><a href="../../../index.php?controller=boTruyen">Bộ truyện </a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="hotline d-none d-lg-block">
                            <a href="../../../index.php?controller=taiKhoan">Setting</a>
                        </div>
                        <div class="header-action-right d-block d-lg-none">
                            <div class="header-action-2">
                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="../../../index.php?controller=cart">
                                        <img alt="Surfside Media" src="../../../assets/imgs/theme/icons/icon-cart.svg">
                                        <span class="pro-count white card" id="card"></span>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </header>
        <div class="mobile-header-active mobile-header-wrapper-style">
            <div class="mobile-header-wrapper-inner">
                <div class="mobile-header-top">
                    <div class="mobile-header-logo">
                        <a href="../../../index.php?controller=trangChu"><img src="../../../assets/imgs/logo/logo.png" alt="logo"></a>
                    </div>
                </div>
                <div class="mobile-header-content-area">
                    <div class="mobile-search search-style-3 mobile-header-border">
                        <form action="#">
                            <input type="text" placeholder="Search for items…">
                            <button type="submit"><i class="fi-rs-search"></i></button>
                        </form>
                    </div>
                    <div class="mobile-menu-wrap mobile-header-border">

                        <!-- mobile menu start -->
                        <nav>
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                            href="index.html">Trang chủ</a></li>
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a href="shop.html">Sản
                                        phẩm</a>
                                </li>
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a href="blog.html">Giới
                                        thiệu</a>
                                </li>
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a href="blog.html">Giới
                                        thiệu</a>
                                </li>
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Danh mục</a>
                                    <ul class="dropdown">
                                        <li><a href="#">English</a></li>
                                        <li><a href="#">French</a></li>
                                        <li><a href="#">German</a></li>
                                        <li><a href="#">Spanish</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <!-- mobile menu end -->
                    </div>
                    <div class="mobile-header-info-wrap mobile-header-border">
                        <div class="single-mobile-header-info">
                            <a href="login.html">Đăng nhập </a>
                        </div>
                        <div class="single-mobile-header-info">
                            <a href="register.html">Đăng ký</a>
                        </div>
                    </div>
                    <div class="mobile-social-icon">
                        <h5 class="mb-15 text-grey-4">Follow Us</h5>
                        <a href="#"><img src="../../../assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                        <a href="#"><img src="../../../assets/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                        <a href="#"><img src="../../../assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                        <a href="#"><img src="../../../assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a>
                        <a href="#"><img src="../../../assets/imgs/theme/icons/icon-youtube.svg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <!--Begin display -->
        <div class="container" style="text-align: center">
            <div class="header clearfix">
                <h3 class="text-muted">VNPAY RESPONSE</h3>
            </div>
            <div class="table-responsive">
                <div class="form-group">
                    <label >Mã đơn hàng:</label>

                    <label><?php echo $_GET['vnp_TxnRef'] ?></label>
                </div>
                <div class="form-group">

                    <label >Số tiền:</label>
                    <label><?php echo number_format(($_GET['vnp_Amount']/100), 0, ',', '.') ?> VND</label>
                </div>
                <div class="form-group">
                    <label >Nội dung thanh toán:</label>
                    <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
                </div>
                <div class="form-group">
                    <label >Mã phản hồi (vnp_ResponseCode):</label>
                    <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
                </div>
                <div class="form-group">
                    <label >Mã GD Tại VNPAY:</label>
                    <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
                </div>
                <div class="form-group">
                    <label >Mã Ngân hàng:</label>
                    <label><?php echo $_GET['vnp_BankCode'] ?></label>
                </div>
                <div class="form-group">
                    <label >Thời gian thanh toán:</label>
                    <label><?php echo $_GET['vnp_PayDate'] ?></label>
                </div>
                <div class="form-group">
                    <label >Kết quả:</label>
                    <label>
                        <?php
                        if ($secureHash == $vnp_SecureHash) {
                            if ($_GET['vnp_ResponseCode'] == '00') {
                                echo "<span style='color:blue'>GD Thanh cong</span>";
                            } else {
                                echo "<span style='color:red'>GD Khong thanh cong</span>";
                            }
                        } else {
                            echo "<span style='color:red'>Chu ky khong hop le</span>";
                        }
                        ?>

                    </label>
                </div>
            </div>
            <p>
                &nbsp;
            </p>
            <footer class="main">
                <section class="newsletter p-30 text-white wow fadeIn animated">
                    <div class="container">

                    </div>
                </section>
                <section class="section-padding footer-mid">
                    <div class="container pt-15 pb-20">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="widget-about font-md mb-md-5 mb-lg-0">
                                    <div class="logo logo-width-1 wow fadeIn animated">
                                        <a href="index.html"><img src="../../../assets/imgs/logo/logo.jpg" alt="logo"></a>
                                    </div>
                                    <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">Contact</h5>
                                    <p class="wow fadeIn animated">
                                        <strong>Địa chỉ: </strong>25 Trịnh Văn Bô
                                    </p>
                                    <p class="wow fadeIn animated">
                                        <strong>Số điện thoại</strong>+1 0000-000-000
                                    </p>
                                    <p class="wow fadeIn animated">
                                        <strong>Email: </strong>contact@fpt.edu.vn
                                    </p>
                                    <h5 class="mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated">Follow Us</h5>
                                    <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                                        <a href="#"><img src="../../../assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                                        <a href="#"><img src="../../../assets/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                                        <a href="#"><img src="../../../assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                                        <a href="#"><img src="../../../assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a>
                                        <a href="#"><img src="../../../assets/imgs/theme/icons/icon-youtube.svg" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3">
                                <h5 class="widget-title wow fadeIn animated">Về</h5>
                                <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                                    <li><a href="#">Về chúng tôi</a></li>
                                    <li><a href="#">Thông tin giao hàng</a></li>
                                    <li><a href="#">Chính sách sản phẩm</a></li>
                                    <li><a href="#">Điều khoản và điều kiện</a></li>
                                    <li><a href="#">Liên hệ chúng tôi</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-2  col-md-3">
                                <h5 class="widget-title wow fadeIn animated">Tài khoản của tôi</h5>
                                <ul class="footer-list wow fadeIn animated">
                                    <li><a href="my-account.html">Tài khoản của tôi</a></li>
                                    <li><a href="#">Xem giỏ hàng</a></li>
                                    <li><a href="#">Sản phẩm yêu thích</a></li>
                                    <li><a href="#">Theo dõi đơn hàng</a></li>
                                    <li><a href="#">Đặt hàng</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-4 mob-center">
                                <h5 class="widget-title wow fadeIn animated">Cài đặt ứng dụng</h5>
                                <div class="row">
                                    <div class="col-md-8 col-lg-12">
                                        <p class="wow fadeIn animated">Từ App Store hoặc Google Play</p>
                                        <div class="download-app wow fadeIn animated mob-app">
                                            <a href="#" class="hover-up mb-sm-4 mb-lg-0"><img class="active"
                                                                                              src="../../../assets/imgs/theme/app-store.jpg" alt=""></a>
                                            <a href="#" class="hover-up"><img src="../../../assets/imgs/theme/google-play.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-12 mt-md-3 mt-lg-0">
                                        <p class="mb-20 wow fadeIn animated">Cổng thanh toán an toàn</p>
                                        <img class="wow fadeIn animated" src="../../../assets/imgs/theme/payment-method.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="container pb-20 wow fadeIn animated mob-center">
                    <div class="row">
                        <div class="col-12 mb-20">
                            <div class="footer-bottom"></div>
                        </div>
                        <div class="col-lg-6">
                            <p class="float-md-left font-sm text-muted mb-0">
                                <a href="privacy-policy.html">Chính sách bảo mật</a> | <a href="terms-conditions.html">Điều khoản và
                                    điều kiện</a>
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <p class="text-lg-end text-start font-sm text-muted mb-0">
                                &copy; <strong class="text-brand">EduBook</strong> Mọi quyền được bảo lưu
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- Vendor JS-->
            <script src="../../../assets/js/vendor/modernizr-3.6.0.min.js"></script>
            <script src="../../../assets/js/vendor/jquery-3.6.0.min.js"></script>
            <script src="../../../assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
            <script src="../../../assets/js/vendor/bootstrap.bundle.min.js"></script>
            <script src="../../../assets/js/plugins/slick.js"></script>
            <script src="../../../assets/js/plugins/jquery.syotimer.min.js"></script>
            <script src="../../../assets/js/plugins/wow.js"></script>
            <script src="../../../assets/js/plugins/jquery-ui.js"></script>
            <script src="../../../assets/js/plugins/perfect-scrollbar.js"></script>
            <script src="../../../assets/js/plugins/magnific-popup.js"></script>
            <script src="../../../assets/js/plugins/select2.min.js"></script>
            <script src="../../../assets/js/plugins/waypoints.js"></script>
            <script src="../../../assets/js/plugins/counterup.js"></script>
            <script src="../../../assets/js/plugins/jquery.countdown.min.js"></script>
            <script src="../../../assets/js/plugins/images-loaded.js"></script>
            <script src="../../../assets/js/plugins/isotope.js"></script>
            <script src="../../../assets/js/plugins/scrollup.js"></script>
            <script src="../../../assets/js/plugins/jquery.vticker-min.js"></script>
            <script src="../../../assets/js/plugins/jquery.theia.sticky.js"></script>
            <script src="../../../assets/js/plugins/jquery.elevatezoom.js"></script>
            <!-- Template  JS -->
            <script src="../../../assets/js/main.js?v=3.3"></script>
            <script src="../../../assets/js/shop.js?v=3.3"></script>
            <script src="../../../assets/js/addcard.js"></script>
            <!-- địa chỉ -->
            <script src="../../../assets/js/form_dia_chi.js"></script>
        </body>

        </html>
        </div>  
    </body>
</html>
