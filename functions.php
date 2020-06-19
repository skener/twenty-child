<?php

function bootstrapStyle (){
    wp_enqueue_style('parent-theme', get_template_directory_uri() .'/style.css');
    wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
}


add_action('wp_enqueue_scripts', 'bootstrapStyle', 99);

