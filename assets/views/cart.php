<div class="cart-page">
    <div class="container ">
        <div class="row justify-content-around">
            <div class="col-md-7 col-sm-12 col-xs-12 p-3 bg-white rounded shadow-sm">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="p-2 pr-3 text-uppercase product">Sản phẩm</div>
                                </th>
                                <th scope="col" class="border-0 bg-light price">
                                    <div class="py-2 text-uppercase">Đơn giá</div>
                                </th>
                                <th scope="col" class="border-0 bg-light remove">
                                    <div class="py-2 text-uppercase">Số lượng</div>
                                </th>
                                <th scope="col" class="border-0 bg-light remove">
                                    <div class="py-2 text-uppercase">Xoá</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <form method="POST" action="/Cart/customValue" class="form-cart">
                                <?php 
                                if(isset($_SESSION["order"]))
                                foreach ($_SESSION["spJoinCt"] as $item): ?>
                                <?php if($item->CtDonHang->donhang_id == $_SESSION["order"][0]){?>
                                <tr>
                                    <td scope="row" class="border-0">
                                        <div class="p-2 d-flex align-items-center">
                                            <img src="/assets/img_product/<?php $_($item->hinhAnh) ?>" alt=""
                                                class="img-fluid rounded shadow-sm">
                                            <div class="ml-3 d-inline-block align-middle info">
                                                <h5 class="mt-0">
                                                    <div class="text-dark d-inline-block align-middle">
                                                        <?php $_($item->tenSP) ?>
                                                    </div>
                                                </h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="border-0 align-middle"><span><?php $_($item->giaSP) ?><small>
                                                đ</small></span></td>
                                    <td class="border-0 align-middle td-sl">
                                        <a href="/Cart/dec/<?php $_($item->maSP) ?>" class="btn-ctr">-</a>

                                        <input class="oi-number" type="number" name="<?php $_($item->maSP) ?>"
                                            value="<?php $_($item->CtDonHang->soLuong) ?>">
                                        <a href="/Cart/inc/<?php $_($item->maSP) ?>" class="btn-ctr">+</a>
                                    </td>
                                    <td class="border-0 align-middle">
                                        <a href="/Cart/delete/<?php $_($item->maSP) ?>" class="text-dark">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php }endforeach; ?>
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12 p-3 bg-white rounded shadow-sm">
                <div class="bg-light px-4 py-3 text-uppercase font-weight-bold">
                    Hoá đơn</div>
                <div class="p-4">
                    <ul class="list-unstyled mb-4">
                        <li class="d-flex justify-content-between py-3 border-bottom">
                            <strong class="text-muted">Tổng giá trị: <?php $_($subtotal) ?> đ</strong>
                        </li>
                        <li class="d-flex justify-content-between py-3 border-bottom">
                            <strong class="text-muted">Thuế VAT: 10%</strong>
                        </li>
                        <li class="d-flex justify-content-between py-3 border-bottom">
                            <strong class="text-muted">Thành tiền: <?php $_($subtotal*1.1) ?> đ</strong>
                        </li>
                    </ul>
                    <a href="/" class="btn btn-dark rounded-pill py-2 btn-block">
                        Continue shopping </a> <a href="/payment" class="btn btn-dark rounded-pill py-2 btn-block">
                        Procceed to
                        checkout </a>
                </div>
            </div>
        </div>
    </div>
</div>