<?php get_header(); ?>
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
$current_cat = $wp_query->get_queried_object();
$current_cat_id = $current_cat->term_id;
$category_id = pll_get_term($current_cat_id);
$category = get_category($current_cat_id);
$img_url = $image_url = get_wp_term_image($current_cat_id);
$image_id =  pippin_get_image_id($image_url);
$image = fly_get_attachment_image_src($image_id, array(1920, 600))['src'];
?>

<div class="info category page">

    <div class="block-text">
        <h1 class="title">
            <?php echo $category->name;?>
        </h1>
        <div class="text">
            <?php echo $category->description;?>
        </div>
    </div>
    <div class="img" style="background: url(<?php echo $image;?>); background-size: cover;"></div>
</div>
<div class="projects">
    <?php if($category->category_parent == 0):?>
        <?php
        $terms = get_term_children($current_cat_id, 'category');
        $proxy_arr = [];
        ?>
        <?php foreach($terms as $key=>$term_id){
            $term = get_category($term_id);
            $proxy_arr[$term->term_order] = $term;
        }
        ksort($proxy_arr);
        ?>
        <?php
        foreach($proxy_arr as $key=>$term):
            ?>
            <?php
            $term_id = $term->term_id;
            $image_url = get_wp_term_image($term_id);
            $image_id =  pippin_get_image_id($image_url);
            $image = fly_get_attachment_image_src($image_id, array(640, 298))['src'];
            $link = get_category_link($term_id);
            ?>
            <div class="col col-project">
                <div class="img" style="background: url(<?php echo $image;?>); background-size: cover;">
                    <a href="<?php echo $link;?>" class="title">
                        <h3><?php echo $term->name;?></h3>
                    </a>
                </div>
            </div>
        <?php endforeach;?>
    <?php else:?>
        <?php
        $projects = get_posts(array(
            'category' => $current_cat_id,
            'post_type' => 'projects'
        ));
        ?>
        <?php foreach($projects as $project):?>
            <?php
            $project_meta = get_post_meta($project->ID);
            $project_images = explode(',',$project_meta['images'][0]);
            $project_cover = fly_get_attachment_image_src($project_images[0], array(640, 298))['src'];
            ?>
            <div class="col col-project" style="background: url(<?php echo $project_cover;?>); background-size: cover;">
                <div class="img">
                    <a href="<?php echo $project->guid;?>" class="title">
                        <h3><?php echo $project->post_title;?></h3>
                    </a>
                </div>
            </div>
        <?php endforeach;?>
    <?php endif;?>
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
<?php get_footer();

function pippin_get_image_id($image_url) {
    global $wpdb;
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ));
    return $attachment[0];
}
?>
