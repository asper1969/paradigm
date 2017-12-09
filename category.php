<?php get_header(); ?>
<ul><?php pll_the_languages();?></ul>

<?php
$current_cat = $wp_query->get_queried_object();
$current_cat_id = $current_cat->term_id;
$category_id = pll_get_term($current_cat_id);
$category = get_category($category_id);
$img_url = $image_url = get_wp_term_image($category_id);
$image_id =  pippin_get_image_id($image_url);
$image = fly_get_attachment_image_src($image_id, array(900, 600))['src'];
?>

<div class="info">
    <div class="container">
        <h1 class="title">
            <?php echo $category->name;?>
        </h1>
        <div class="text">
            <?php echo $category->description;?>
        </div>
    </div>
    <div class="img" style="background: url(<?php echo $image;?>); background-size: cover;">
        ffff
    </div>
</div>
<?php if($category->category_parent == 0):?>
    <?php
    $terms = get_term_children($category_id, 'category');
    foreach($terms as $key=>$term_id):
    ?>
    <?php
    $term = get_category($term_id);
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
    <pre>
        <?php print_r($category);?>
    </pre>
<?php endif;?>

<?php get_footer();

function pippin_get_image_id($image_url) {
    global $wpdb;
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ));
    return $attachment[0];
}
?>
