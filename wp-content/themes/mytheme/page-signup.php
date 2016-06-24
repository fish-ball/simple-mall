<?php

if($_POST) {

    // 提交注册

    $username = sanitize_user(@$_POST['username'] ?: '');
    $password = addslashes(@$_POST['username'] ?: '');

    $customer = Customer::create($username, $password);

    echo "<script>alert('注册成功！'); location.href = '/login/';</script>";

}

get_header(); ?>

<h1>用户注册</h1>

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
        <input type="submit" value="注册" />
        <a href="<?php echo home_url('/signup/');?>">去登录</a>
    </div>
</form>

<?php get_footer();
