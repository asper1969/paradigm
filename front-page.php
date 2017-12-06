<?php
$lang = pll_current_language();
$args = array(
    'category' => 18
);
$slides = get_posts($args);

get_header(); ?>
<ul><?php pll_the_languages();?></ul>
<pre>
    <?php echo $lang;?>
</pre>
<div class="slider">
<!--TODO: slider-->
    <?php foreach($slides as $slide): ?>
    <pre>
        <?php
        $slide_id = $slide->ID;
        $slide_meta = get_post_meta($slide_id);
        $slide_img_id = $slide_meta['slide'][0];
        $slide_img = fly_get_attachment_image_src($slide_img_id, array(1920, 600))['src'];
        print_r($slide);
        ?>
    </pre>
    <div class="slide" style="background: url(<?php echo $slide_img;?>); background-size: cover;">
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
    <?php endforeach;?>
</div>
<div class="portfolio">
    #PORTFOLIO#
</div>
<div class="services">#SERVICES#</div>
<div class="about-us">#ABOUT-US#</div>
<div class="partners">#PARTNERS#</div>
<?php get_footer(); ?>