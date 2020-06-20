<section class="profile-page">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="profile-block">
                    <div class="user-profile">
                        <div class="wrapper-user">
                            <div class="user-img">
                                <img src="/assets/images/avatar.png" width="120" />
                            </div>
                            <p></p>
                            <h5></h5>
                        </div>
                    </div>
                    <div class="nav flex-column nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link " id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">
                            Tài khoản </a>
                        <a class="nav-link" id="v-pills-account-tab" data-toggle="pill" href="#v-pills-account" role="tab" aria-controls="v-pills-account" aria-selected="false">
                            Đổi mật khẩu </a>
                        <a class="nav-link" id="v-pills-edit-tab" data-toggle="pill" href="#v-pills-edit" role="tab" aria-controls="v-pills-edit" aria-selected="false">Chỉnh sửa thông tin </a>
                        <a class="nav-link" id="v-pills-history-tab" data-toggle="pill" href="#v-pills-history" role="tab" aria-controls="v-pills-history" aria-selected="false">
                            Lịch sử mua bánh </a>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="d-flex justify-content-between">
                        <h3 class="mb-4">Thông tin </h3>
                        <div class="icons">
                            <i class="fab fa-facebook-square"></i> <i class="fab fa-twitter-square tw" aria-hidden="true"></i> <i class="fab fa-youtube yt" aria-hidden="true"></i>
                        </div>
                    </div>


                    <div class="tab-pane fade <?= (isset($tab) && $tab == 1) ? 'show active' : ''; ?> " id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <h3 class="text-center font-weight-bold">
                            Thông tin của tôi</h3>
                        <div class="history-page">
                            <div class="courses_Card Courses_Card">
                                <?php if (isset($_SESSION['user'])) : ?>
                                    <?php $user_array = $_SESSION['user']; ?>
                                    <div class="form-group">
                                        <label for="matKhau">Tên tài khoản</label> <input type="text" class="form-control" value="<?php echo ($user_array[1]); ?>" disabled />
                                    </div>
                                    <div class="form-group">
                                        <label for="matKhau">Họ và tên</label> <input type="text" class="form-control" value="<?php echo ($user_array[2]); ?>" disabled />
                                    </div>
                                    <div class="form-group">
                                        <label for="matKhau">Số điện thoại</label> <input type="text" class="form-control" value="<?php echo ($user_array[3]); ?>" disabled />
                                    </div>
                                    <div class="form-group">
                                        <label for="matKhau">Email</label> <input type="text" class="form-control" value="<?php echo ($user_array[4]); ?>" disabled />
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade <?= (isset($tab) && $tab == 2) ? 'show active' : ''; ?> " id="v-pills-account" role="tabpanel" aria-labelledby="v-pills-account-tab">

                        <h3 class="text-center font-weight-bold">
                            Đổi mật khẩu</h3>
                        <div>
                            <form action="/profile/editp" method="post" autocomplete="off">
                                <?php if (isset($_SESSION['user'])) : ?>
                                    <?php $user_array = $_SESSION['user']; ?>
                                    <div class="form-group">
                                        <label for="taiKhoan">Tên tài khoản</label> <input type="text" class="form-control" disabled name="username" value="<?php echo ($user_array[1]); ?>" required />
                                    </div>
                                <?php endif; ?>
                                <div class="form-group">
                                    <label for="matKhau">Nhập mật khẩu hiện tại</label> <input type="password" placeholder="Current password" name="password" class="form-control" Required />
                                    <?php if (isset($alert) && $alert !== "") : ?>

                                        <div class="message message-err">
                                            <i class="fas fa-exclamation-circle"></i>
                                            <span><?php echo $alert ?></span>
                                        </div>

                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="matKhau">
                                        Nhập mật khẩu mới</label> <input type="password" placeholder="New password" name="matKhauMoi" class="form-control" Required />
                                </div>
                                <div class="form-group">
                                    <label for="matKhau">
                                        Xác nhận mật khẩu</label> <input type="password" placeholder="Confirm password" name="matKhauXacNhan" class="form-control" Required />
                                </div>
                                <?php if (isset($alert_1) && $alert_1 !== "") : ?>

                                    <div class="message message-err">
                                        <i class="fas fa-exclamation-circle"></i>
                                        <span><?php echo $alert_1 ?></span>
                                    </div>

                                <?php endif; ?>
                                <button type="submit" class="btn btn-primary">
                                    Cập nhật mật khẩu</button>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade <?= (isset($tab) && $tab == 3) ? 'show active' : ''; ?>" id="v-pills-edit" role="tabpanel" aria-labelledby="v-pills-edit-tab">
                        <h3 class="text-center font-weight-bold">Edit Information</h3>
                        <form action="/profile/editinfo" method="post" autocomplete="off">
                            <?php if (isset($_SESSION['user'])) : ?>
                                <?php $user_array = $_SESSION['user']; ?>
                                <div class="form-group">
                                    <label for="matKhau">Tền tài khoản</label> <input type="text" class="form-control" value="<?php echo ($user_array[1]); ?>" disabled />
                                </div>
                                <div class="form-group">
                                    <label for="matKhau">Email</label> <input type="text" class="form-control" value="<?php echo ($user_array[4]); ?>" disabled />
                                </div>
                                <div class="form-group">
                                    <label for="matKhau">Họ và tên</label> <input type="text" class="form-control" value="<?php echo ($user_array[2]); ?>" name="fullName" />
                                </div>
                                <div class="form-group">
                                    <label for="matKhau">Số điện thoại</label> <input type="text" class="form-control" value="<?php echo ($user_array[3]); ?>" name="phone" />
                                </div>

                            <?php endif; ?>
                            <button class="btn btn-success" type="submit">Cập nhật tài khoản</button>
                        </form>
                    </div>
                    <div class="tab-pane fade " id="v-pills-history" role="tabpanel" aria-labelledby="v-pills-edit-tab">
                        <h3 class="text-center font-weight-bold">
                            Lịch sử mua bánh</h3>
                        <hr>
                        <div class="history" style="overflow-y: auto;max-height:420px ;over-fow-x:hiden;">
                            <?php foreach ($orderHistory as $item) : ?>
                                <p class="text-center"><?php echo $item->ngayDH; ?></p>
                                <div class="row">
                                    <?php foreach ($_SESSION["spJoinCt"] as $i) : ?>
                                        <?php if ($i->CtDonHang->donhang_id == $item->maDH) { ?>
                                            <div class="col-4">
                                                <img src="/assets/img_product/<?php $_($i->hinhAnh) ?>" alt="" class="img-fluid rounded shadow-sm">
                                                <div class="text-center">
                                                    <p><?php $_($i->tenSP) ?></p>
                                                    <span>số lượng:<?php $_($i->CtDonHang->soLuong) ?></span>
                                                </div>
                                            </div>
                                    <?php }
                                    endforeach; ?>
                                </div>
                                <hr>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</section>