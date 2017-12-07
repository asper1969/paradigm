<?php
$lang = pll_current_language();
$args = array(
    'category' => pll_get_term(18)
);
$slides = get_posts($args);

get_header(); ?>
<ul><?php pll_the_languages();?></ul>
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
            <div class="text">
                <?php echo $slide->post_title;?>
            </div>
            <div class="text">
                <?php echo $slide->post_content;?>
            </div>
            <a href="<?php echo $slide_meta['more'][0];?>" class="more">
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
    </div>
    <?php endforeach;?>
</div>
<div class="portfolio">
    #PORTFOLIO#
</div>
<div class="services">#SERVICES#</div>
<div class="about-us">#ABOUT-US#</div>
<div class="partners">#PARTNERS#</div>
<?php get_footer(); ?>