<?php get_header(); ?>
<ul><?php pll_the_languages();?></ul>

<?php
$project = $wp_query->get_queried_object();
$project_meta = get_post_meta($project->ID);
$project_images = explode(',',$project_meta['images'][0]);
?>
<div class="info project">
    <h1 class="title">
        <?php echo $project->post_title;?>
    </h1>
    <div class="text">
        <?php echo $project->post_content;?>
    </div>
</div>
<div class="images">
    <?php foreach($project_images as $image_id):?>
        <?php
            $img = fly_get_attachment_image_src($image_id, array(1920, 600))['src'];
        ?>
        <div class="img">
            <img src="<?php echo $img?>" alt="">
        </div>
    <?php endforeach;?>
</div>

<?php get_footer(); ?>
