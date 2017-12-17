<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php echo get_bloginfo('name'); ?> / <?php echo get_bloginfo('description'); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/prod/style/style.css" />
    <?php wp_head(); ?>
</head>
<?php
$lang = pll_current_language();
?>
<body class="<?php echo $lang;?>
<?php
    if(is_front_page()){
        echo ' front';
    }else{
        echo ' not-front';
    }
?>">