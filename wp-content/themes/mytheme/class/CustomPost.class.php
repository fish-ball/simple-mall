<?php

class Goods extends CustomPost {
    public static $post_type = 'goods';
    public static $post_type_name = '商品';
    public static $post_type_name_plural = '商品';
    public static $post_type_supports =
        array('title', 'thumbnail', 'excerpt', 'editor', 'comments');
    public static $menu_icon = 'dashicons-cart';
}
Goods::init();  // 注册这个自定义类


class Customer extends CustomUserType {
    static $role = 'customer';
    static $display_name = '会员';
    static $capabilities = array('read');
}
Customer::init();


class SalesOrder extends CustomPost {
    public static $post_type = 'sales_order';
    public static $post_type_name = '销售订单';
    public static $post_type_name_plural =
        '销售订单';
    public static $post_type_supports = array();
    public static $menu_icon = 'dashicons-list-view';
}
SalesOrder::init();


class GoodsCategory extends CustomTaxonomy {
    public static $taxonomy = 'goods_category';
    public static $taxonomy_name = '商品分类';
    public static $taxonomy_name_plural = '商品分类';
    public static $post_types = array('goods');
}
GoodsCategory::init();