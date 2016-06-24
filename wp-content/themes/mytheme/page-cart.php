<?php

$customer = Customer::get_current();

if (!$customer) {
    wp_redirect(home_url('/login/'));
    exit;
}

if(@$_POST['commit'] === 'true') {
    // 将购物车提交到订单
    $order = $customer->commitCart();
    if($order) {
        // 如果提交成功，跳转到订单页面
        wp_redirect(get_the_permalink($order->post->ID)); exit;
    } else {
        echo '<script>alert("订单提交失败!"); location.href="/cart/";</script>'; exit;
    }
}

if (isset($_GET['add'])) {
    $goods = @new Goods(intval($_GET['add']), true);
    if ($goods) {
        @$customer->addToCart($goods);
    }
    // 消除参数刷新页面
    wp_redirect(home_url('/cart/'));
    exit;
}

if (isset($_GET['del'])) {
    $goods = @new Goods(intval($_GET['del']), true);
    if ($goods) {
        @$customer->delFromCart($goods);
    }
    // 消除参数刷新页面
    wp_redirect(home_url('/cart/'));
    exit;
}

$cart_detail = get_field('shopping_cart', 'user_' . $customer->user->ID) ?: array();

get_header(); ?>

<?php foreach($cart_detail as $row) {
    $goods = new Goods($row['goods']); ?>
<div>
    <p>
        <strong>商品：</strong>
        <a href="<?php get_the_permalink($goods->post->ID);?>">
            <?php echo get_the_title($goods->post->ID); ?></a>
        x <?php echo @$row['quantity']; ?>
        <a href="?del=<?php echo $goods->post->ID; ?>" style="color: blue;">[删除]</a>
    </p>
</div>
<?php } ?>

<form method="post">
    <input type="hidden" name="commit" value="true" />
    <input type="submit" value="提交订单" />
    <a href="<?php echo get_author_posts_url($customer->user->ID); ?>" style="color: blue;">查看我的订单</a>
</form>

<?php get_footer();