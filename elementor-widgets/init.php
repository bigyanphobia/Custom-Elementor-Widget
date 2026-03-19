<?php

add_action('elementor/widgets/register', function ($widgets_manager) {

    require_once __DIR__ . '/widgets/card-widgets.php';

    $widgets_manager->register(new \MyTheme_Card_Widget());
});
