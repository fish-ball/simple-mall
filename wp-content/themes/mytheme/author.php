<?php

$customer = Customer::get_current();

if (!$customer) {
    wp_redirect(home_url('/login/'));
    exit;
}

$orders = $customer->getOrderList();

get_header(); ?>

TODO: 列出所有当前用户的订单

<?php get_footer();