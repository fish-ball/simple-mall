<?php

$goods = Goods::query();
$goods_categories = GoodsCategory::all();

get_header(); ?>

<div class="banner">
    <img src="<?=get_template_directory_uri()?>/images/banner.jpg" />
</div>

<section class="section-category">
    <h2 class="subtitle">热门分类</h2>
    <div class="goods-categories">
        <?php foreach($goods_categories as $cat) {?>
            <a href="<?php echo get_term_link($cat->term, GoodsCategory::$taxonomy) ?>">
                <?php echo $cat->term->name; ?>
            </a>
        <?php } ?>
    </div>
</section>

<section class="section-goods">
    <h2 class="subtitle">所有商品</h2>
    <ul class="goods-list">
        <?php foreach($goods as $item) {?>
            <li>
                <a href="<?php the_permalink($item->post->ID);?>">
                    <img src="<?php echo get_the_post_thumbnail_url($item->post); ?>" />
                    <h5><?php echo get_the_title($item->post->ID); ?></h5>
                </a>
            </li>
        <?php }?>
    </ul>
</section>

<?php get_footer(); ?>
