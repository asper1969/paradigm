<?php
$lang = pll_current_language();
$args = array(
    'category' => pll_get_term(14)
);
$slides = get_posts($args);

get_header(); ?>

<div class="main-menu">
    <?php
    if($lang == 'ru'){
        wp_nav_menu(array('menu' => 108));
    }elseif($lang == 'kk'){
        wp_nav_menu(array('menu' => 109));
    }else{
        wp_nav_menu(array('menu' => 110));
    }
    ?>
</div>
<div class="nav-elements">
    <div class="btn btn-menu">
        <div class="line">...</div>
        <div class="line">......</div>
        <div class="line">...</div>
    </div>
    <div class="logo">
        <img src="<?php echo get_template_directory_uri(); ?>/prod/images/logo.png" alt="Paradigm Projects Kazakhstan">
    </div>
    <ul class="langs"><?php pll_the_languages();?></ul>
</div>
<div class="slider">
    <?php foreach($slides as $slide): ?>
    <?php
    $slide_id = $slide->ID;
    $slide_meta = get_post_meta($slide_id);
    $slide_img_id = $slide_meta['slide'][0];
    $slide_img = fly_get_attachment_image_src($slide_img_id, array(1920, 600))['src'];
    ?>
    <div class="slide" style="background: url(<?php echo $slide_img;?>); background-size: cover;">
        <div class="container">
            <div class="title">
                <?php echo $slide->post_title;?>
            </div>
            <div class="text">
                <?php echo $slide->post_content;?>
            </div>
            <a href="<?php echo $slide_meta['more'][0];?>" class="more">
                <?php
                if($lang == 'ru'){
                    echo 'Перейти';
                }elseif($lang == 'kk'){
                    echo 'Өту';
                }else{
                    echo 'More';
                }
                ?>
            </a>
        </div>
    </div>
    <?php endforeach;?>
</div>
<div class="portfolio">
    <div class="col col-title">
        <?php
        $parent_cat_id = pll_get_term(19);
        $services_cat = get_category($parent_cat_id);
        ?>
        <h2 class="title">
            <?php echo $services_cat->name;?>
        </h2>
        <div class="text">
            <?php echo $services_cat->description;?>
        </div>
    </div>
    <?php
    $terms = get_term_children($parent_cat_id, 'category');
    $arr_indexes = [0,1,6,7];
    ?>
    <?php foreach($terms as $key=>$term_id):?>
        <?php
        $term = get_category($term_id);
        $image_url = get_wp_term_image($term_id);
        $image_id =  pippin_get_image_id($image_url);
        $image = fly_get_attachment_image_src($image_id, array(640, 298))['src'];
        $link = get_category_link($term_id);
        ?>
        <div class="col col-project <?php if(in_array($key, $arr_indexes)){echo 'short';}?>">
            <div class="img" style="background: url(<?php echo $image;?>); background-size: cover;">
                <a href="<?php echo $link;?>" class="title">
                    <h3><?php echo $term->name;?></h3>
                </a>
            </div>
        </div>
    <?php endforeach;?>
</div>
<div class="services">
    <?php
    $post_id = pll_get_post(49);
    $post = get_post($post_id);
    ?>
    <h2 class="title">
        <?php echo $post->post_title;?>
    </h2>
    <div class="container">
        <?php echo $post->post_content;?>
    </div>
</div>
<div class="about-us">
    <div class="container">
        <?php
        $post_id = pll_get_post(72);
        $post = get_post($post_id);
        ?>
        <div class="block block-about">
            <h2 class="title"><?php echo $post->post_title;?></h2>
            <div class="text"><?php echo $post->post_content;?></div>
            <a href="<?php echo $post->guid;?>" class="more">
                <?php
                if($lang == 'ru'){
                    echo 'Подробнее';
                }elseif($lang == 'kk'){
                    echo 'Подробнее kz';
                }else{
                    echo 'More';
                }
                ?>
            </a>
        </div>
        <div class="block block-form">
            <?php
            $post = 0;

            if($lang == 'ru'){
                $post = get_post(84);
            }elseif($lang == 'kk'){
                $post = get_post(90);
            }else{
                $post = get_post(89);
            }

            $name = $post->post_name;
            ?>
            <h2 class="title">
                <?php echo $post->post_title;?>
            </h2>
            <?php echo do_shortcode( '[cf7-form cf7key="' . $name . '"]' ); ?>
        </div>
    </div>
</div>
<div class="partners">
    <?php
    $post_id = pll_get_post(91);
    $post = get_post($post_id);
    ?>
    <h2 class="title">
        <?php echo $post->post_title;?>
    </h2>
    <div class="container"><?php echo $post->post_content;?></div>
</div>
<footer>
    <div class="logo"></div>
    <div class="container">
        <div class="socials">
            <?php
//            $post_id = pll_get_post(99);
            $post = get_post(99);
            echo $post->post_content;
            ?>
        </div>
        <div class="copyright"></div>
    </div>
</footer>
<?php get_footer();
// retrieves the attachment ID from the file URL
function pippin_get_image_id($image_url) {
    global $wpdb;
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ));
    return $attachment[0];
}
?>

