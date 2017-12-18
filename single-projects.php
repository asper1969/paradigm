<?php get_header(); ?>
<?php $lang = pll_current_language();
?>
<div class="main-menu">
    <img src="<?php echo get_template_directory_uri(); ?>/prod/images/elements/logo.png" alt="Paradigm Projects Kazakhstan">
    <?php
    if($lang == 'ru' || $lang == ''){
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
$project = $wp_query->get_queried_object();
$project_meta = get_post_meta($project->ID);
$project_images = explode(',',$project_meta['images'][0]);
?>
<div class="info page project">
    <h1 class="title">
        <?php echo $project->post_title;?>
    </h1>
    <div class="text">
        <?php echo $project->post_content;?>
    </div>
</div>
<div class="slider">
    <div class="wrapper">
        <?php foreach($project_images as $image_id):?>
            <?php
            $img = fly_get_attachment_image_src($image_id, array(1920, 600))['src'];
            ?>
            <div class="slide" style="background: url(<?php echo $img;?>); background-size: cover;">
            </div>
        <?php endforeach;?>
    </div>
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
