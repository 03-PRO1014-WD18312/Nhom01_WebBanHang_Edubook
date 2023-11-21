<main class="main">
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-25">
                        <h4>Thông tin hóa đơn</h4>
                    </div>
                    <form method="post">
                        <div class="form-group">
                            <label for="fname">Họ và tên:</label>
                            <input type="text" required="" name="ten" placeholder="Họ và tên *">
                        </div>
                        <div class="form-group">
                            <label for="sdt">Số điện thoại</label>
                            <input required="" type="text" name="sdt" placeholder="Số điện thoại *">
                        </div>
                        <div class="form-group">
                            <input type="text" name="billing_address" required="" placeholder="Address *">
                        </div>
                        <div class="form-group">
                            <input required="" type="text" name="email" placeholder="Email address *">
                        </div>
                    </form>
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
                                    <th colspan="2">Product</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="image product-thumbnail"><img src="assets/imgs/shop/product-1-1.jpg" alt="#"></td>
                                    <td>
                                        <h5><a href="product-details.html">Yidarton Women Summer Blue</a></h5> <span class="product-qty">x 2</span>
                                    </td>
                                    <td>$180.00</td>
                                </tr>
                                <tr>
                                    <td class="image product-thumbnail"><img src="assets/imgs/shop/product-2-1.jpg" alt="#"></td>
                                    <td>
                                        <h5><a href="product-details.html">LDB MOON Women Summe</a></h5> <span class="product-qty">x 1</span>
                                    </td>
                                    <td>$65.00</td>
                                </tr>
                                <tr>
                                    <td class="image product-thumbnail"><img src="assets/imgs/shop/product-3-1.jpg" alt="#"></td>
                                    <td><i class="ti-check-box font-small text-muted mr-10"></i>
                                        <h5><a href="product-details.html">Women's Short Sleeve Loose</a></h5> <span class="product-qty">x 1</span>
                                    </td>
                                    <td>$35.00</td>
                                </tr>
                                <tr>
                                    <th>SubTotal</th>
                                    <td class="product-subtotal" colspan="2">$280.00</td>
                                </tr>
                                <tr>
                                    <th>Shipping</th>
                                    <td colspan="2"><em>Free Shipping</em></td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">$280.00</span></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                        <div class="payment_method">
                            <div class="mb-25">
                                <h5>Phương thức thanh toán</h5>
                            </div>
                        </div>
                        <a href="#" class="btn btn-fill-out btn-block mt-30">Thanh toán khi nhận hàng</a>
                        <a href="#" class="btn btn-fill-out btn-block mt-30">Thanh toán vnpay</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>