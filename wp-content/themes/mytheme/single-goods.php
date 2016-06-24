<?php

$goods = new Goods(get_the_ID());

get_header(); ?>

<section class="section-banner">
    <?php the_post_thumbnail(); ?>
</section>

<section class="section-info">
    <div class="row"><strong>商品名称：</strong><?php the_title(); ?></div>
    <div class="row"><strong>商品价格：</strong><?php echo $goods->price; ?></div>
    <div class="row"><strong>剩余库存：</strong><?php echo $goods->inventory; ?></div>
    <hr/>
    <div class="row">
        <strong>
            <a href="<?php echo home_url('/cart/') ?>?add=<?php echo $goods->post->ID ?>">加入购物车</a>
        </strong>
    </div>
</section>

<?php get_footer();