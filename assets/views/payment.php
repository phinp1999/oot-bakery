<div id="payCourses" style="display: none"></div>
<div class="checkout-page">
    <div class="checkout-content">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-xs-12">
                    <div class="your-items">
                        <h3>Sản phẩm</h3><br>
                        <div class="list-course">
                            <?php 
                                if(isset($_SESSION["order"]))
                                foreach ($_SESSION["spJoinCt"] as $item): ?>
                            <?php if($item->CtDonHang->donhang_id == $_SESSION["order"][0]){?>
                            <div class="item my-1">
                                <div class="media">
                                    <img class="p-img" src="/assets/img_product/<?php $_($item->hinhAnh) ?>" />
                                    <div class=" media-body">
                                        <strong class="name-course"> <?php $_($item->tenSP) ?></strong>
                                        <hr>
                                        <span>Số lượng: <?php $_($item->CtDonHang->soLuong) ?></span><br />
                                        <span class="text-success">Đơn giá: <?php $_($item->giaSP) ?>đ</span>
                                    </div>
                                </div>
                            </div>
                            <?php }endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-xs-12">
                    <div class="total-pay">
                        <h3>Thành tiền: <?php $_($total)?>đ <small>(Đã tính thuế Vat: 10%)</small></h3><br />
                        <div class="total">
                            <div class="payment">
                                <div class="pay-methods">
                                    <span class="title">Phương thức thanh toán: </span>
                                    <span class="pay-cart"> Thanh toán khi nhận hàng
                                    </span>
                                </div>
                                <div class="info-paymanet">
                                    <p>Họ tên: <?php $_($user->hoTen)?></p>
                                    <p>Số điện thoại: <?php $_($user->dienThoai)?></p>
                                    <p>Email: <?php $_($user->email)?></p>
                                </div>
                                <form method="POST" action="/payment/pay" onSubmit="alertSuccess()">
                                    <div class="form-group">
                                        <label for="">Địa chỉ nhận hàng</label>
                                        <input type="text" class="form-control" placeholder="Địa chỉ" name="diaChi"
                                            required />
                                    </div>
                                    <button type="submit" class="btn btn-success" id="payment">Đặt hàng</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>