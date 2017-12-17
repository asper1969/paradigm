<?php get_header(); ?>
<?php $lang = pll_current_language();
?>
<div class="main-menu">
    <img src="<?php echo get_template_directory_uri(); ?>/prod/images/elements/logo.png" alt="Paradigm Projects Kazakhstan">
    <?php
    if($lang == 'ru'){
        wp_nav_menu(array('menu' => 108));
    }elseif($lang == 'kk'){
        wp_nav_menu(array('menu' => 109));
    }else{
        wp_nav_menu(array('menu' => 110));
    }
    ?>

    <div class="close-btn">+</div>
</div>
<div class="nav-elements">
    <div class="btn btn-menu">
        <div class="line">...</div>
        <div class="line">......</div>
        <div class="line">...</div>
    </div>
    <div class="logo">
        <a href="/">
            <img src="<?php echo get_template_directory_uri(); ?>/prod/images/logo.png" alt="Paradigm Projects Kazakhstan">
        </a>
    </div>
    <ul class="langs"><?php pll_the_languages();?></ul>
</div>

<?php
$page = $wp_query->get_queried_object();
$page_meta = get_post_meta($page->ID);
if(isset($page_meta['image'])){
    $image_id = $page_meta['image'][0];
}else{
    $image_id = $page_meta['Изображение в подвале страницы'][0];
}
$image = fly_get_attachment_image_src($image_id, array(1920, 600))['src'];
$page_slug = $page->post_name;
?>
<?php if($page_slug == 'contacts'
        || $page_slug == 'contacts-1'
        || $page_slug == 'contacts-2'):?>
    <div class="container page">
        <div class="block block-text">
            <h1 class="title">
                <?php echo $page->post_title;?>
            </h1>
            <div class="text">
                <?php echo $page->post_content;?>
            </div>
        </div>
        <div class="block block-form">
            <?php
            $post = 0;

            if($lang == 'ru'){
                $post = get_post(142);
            }elseif($lang == 'kk'){
                $post = get_post(143);
            }else{
                $post = get_post(144);
            }

            $name = $post->post_name;
            ?>
            <?php echo do_shortcode( '[cf7-form cf7key="' . $name . '"]' ); ?>
        </div>
    </div>
<?php else:?>
    <div class="info page">
        <h1 class="title">
            <?php echo $page->post_title;?>
        </h1>
        <div class="text">
            <?php echo $page->post_content;?>
        </div>
    </div>
<?php endif;?>
<div class="img">
    <img src="<?php echo $image?>" alt="">
</div>
<footer>
    <div class="wrapper">
        <div class="logo">
            <img src="<?php echo get_template_directory_uri(); ?>/prod/images/elements/logo.png" alt="Paradigm Projects Kazakhstan">
        </div>
        <div class="container">
            <div class="socials">
                <?php
                //            $post_id = pll_get_post(99);
                $post = get_post(99);
                echo $post->post_content;
                ?>
            </div>
            <div class="copyright">Копирайт Remedy</div>
        </div>
    </div>
</footer>
<?php get_footer(); ?>
