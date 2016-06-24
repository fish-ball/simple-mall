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

    /**
     * TODO: 将一个商品添加到当前用户的购物车
     * @param $goods Goods|int 需要添加到购物车的商品
     */
    function addToCart($goods) {
    }

    /**
     * TODO: 将一个商品从当前用户的购物车移除
     * @param $goods Goods|int 需要从购物车移除的商品
     */
    function delFromCart($goods) {
    }

    /**
     * TODO: 将当前用户的购物车提交
     * @return SalesOrder|false 如果创建订单成功，返回订单对象，否则返回 false
     */
    function commitCart() {
    }

    /**
     * TODO: 获取当前用户所有订单的列表
     * @return SalesOrder[]
     */
    function getOrderList() {
    }

}
Customer::init();


class SalesOrder extends CustomPost {

    public static $post_type = 'sales_order';
    public static $post_type_name = '销售订单';
    public static $post_type_name_plural =
        '销售订单';
    public static $post_type_supports = array();
    public static $menu_icon = 'dashicons-list-view';

    /**
     * TODO: 返回整张订单的金额
     * @return float|int
     */
    function getAmount() {
    }

    /**
     * TODO: 将订单标记为已支付
     */
    function setPaid() {
    }

    /**
     * TODO: 将订单标记为已发货
     */
    function setDelivered() {
    }

    /**
     * TODO: 将订单标记为已签收
     */
    function setConfirmed() {
    }

}
SalesOrder::init();


class GoodsCategory extends CustomTaxonomy {
    public static $taxonomy = 'goods_category';
    public static $taxonomy_name = '商品分类';
    public static $taxonomy_name_plural = '商品分类';
    public static $post_types = array('goods');
}
GoodsCategory::init();