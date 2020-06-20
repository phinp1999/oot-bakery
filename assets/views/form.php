<div class="bg-custom">
    <div class="cont <?= (isset($activeTab) && $activeTab == 1) ? 's--signup' : ''; ?>">
        <div class="form sign-in">
            <h2>Chào mừng trở lại</h2>
            <form method="POST" action="/form/login">
                <label>
                    <span>Tên tài khoản</span>
                    <input type="text" name="username" value="<?= (isset($username_2) && $username_2 !== "") ? $username_2 : ''; ?>" />
                </label>
                <label>
                    <span>Mật Khẩu</span>
                    <input type="password" name="password" value="<?= (isset($password_2) && $password_2 !== "") ? $password_2 : ''; ?>" />
                </label>
                <?php if (isset($handleErr) && $handleErr !== "") : ?>
                    <div class="message message-err text-center mt-2">
                        <i class="fas fa-exclamation-circle"></i>
                        <span><?= $handleErr ?></span>
                    </div>
                <?php endif; ?>
                <p class="forgot-pass">
                    Quên mật khẩu?</p>
                <button type="submit" class="submit btn-f">Đăng nhập</button>
                <button type="button" class="fb-btn btn-f">
                    Kết nối với <span>facebook</span></button>
            </form>
        </div>
        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">
                    <h2>Mới đây?</h2>
                    <p>Đăng ký và khám phá số lượng lớn các cơ hội mới!</p>
                </div>
                <div class="img__text m--in">
                    <h2>Một trong số chúng tôi? </h2>
                    <p>
                        Nếu bạn đã có tài khoản, chỉ cần đăng nhập. Chúng tôi đã nhớ bạn!</p>
                </div>
                <div class="img__btn">
                    <span class="m--up">Đăng ký</span>
                    <span class="m--in">Đăng nhập</span>
                </div>
            </div>
            <div class="form sign-up">
                <h2>Chào mừng trở lại</h2>
                <form method="POST" action="/form/register">
                    <label>
                        <span>Tên tài khoản</span><span class="requierd"> *<span>
                                <input type="text" name="username" value="<?= (isset($username) && $username !== "") ? $username : ''; ?>" />
                                <?php if (isset($nameErr) && $nameErr !== "") : ?>

                                    <div class="message message-err">
                                        <i class="fas fa-exclamation-circle"></i>
                                        <span><?php echo $nameErr ?></span>
                                    </div>

                                <?php endif; ?>
                    </label>
                    <label>
                        <span>Mật khẩu</span><span class="requierd"> *<span>
                                <input type="password" name="password" value="" />
                                <?php if (isset($passErr) && $passErr !== "") : ?>

                                    <div class="message message-err">
                                        <i class="fas fa-exclamation-circle"></i>
                                        <span><?php echo $passErr ?></span>
                                    </div>

                                <?php endif; ?>
                    </label>
                    <label>
                        <span>Họ và tên</span>
                        <input type="text" name="fullname" value="<?= (isset($fullname) && $fullname !== "") ? $fullname : ''; ?>" />
                    </label>
                    <label>
                        <span>Email</span><span class="requierd"> *<span>
                                <input type="email" name="email" value="<?= (isset($email) && $email !== "") ? $email : ''; ?>" />

                                <?php if (isset($emailErr) && $emailErr !== "") : ?>

                                    <div class="message message-err">
                                        <i class="fas fa-exclamation-circle"></i>
                                        <span><?php echo $emailErr ?></span>
                                    </div>

                                <?php endif; ?>
                    </label>
                    <label>
                        <span>Số điện thoại</span>
                        <input type="number" name="phone" value="<?= (isset($phone) && $phone !== "") ? $phone : ''; ?>" />
                    </label>

                    <button type="submit" class="submit btn-f">Đăng ký</button>
                    <button type="button" class="fb-btn btn-f">
                        Tham gia với <span>facebook</span></button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($msgAlert) && $msgAlert) {
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal({
            title: "Congrats!",
            text: "You have signed up successfully!",
            icon: "success",
            button: "OK",
          });';
    echo '}, 1000);</script>';
}
?>