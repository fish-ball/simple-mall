<?php

if($_POST) {

    // 提交登录

    $username = sanitize_user(@$_POST['username'] ?: '');
    $password = addslashes(@$_POST['username'] ?: '');

    $user = wp_signon(array(
        'user_login' => $username,
        'user_password' => $password,
    ));

    if($user) {
        echo "<script>alert('登录成功！'); location.href = '/cart/';</script>";
    }

}

get_header(); ?>

    <h1>用户登录</h1>

    <form method="post">
        <div class="row">
            <label>用户名：</label>
            <input type="text" name="username" title="用户名" />
        </div>
        <div class="row">
            <label>密码：</label>
            <input type="password" name="username" title="密码" />
        </div>
        <div class="row">
            <input type="submit" value="登录" />
            <a href="<?php echo home_url('/signup/');?>">去注册</a>
        </div>
    </form>

<?php get_footer();
