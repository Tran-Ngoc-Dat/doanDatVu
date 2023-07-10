<?php

    /* Config type - Product */
    require_once LIBRARIES.'type/config-type-product.php';
    require_once LIBRARIES.'type/config-type-news.php';
    require_once LIBRARIES.'type/config-type-photo.php';

    /* Setting */
    $config['setting']['address'] = true;
    $config['setting']['phone'] = true;
    $config['setting']['hotline'] = true;
    $config['setting']['zalo'] = true;
    $config['setting']['oaidzalo'] = true;
    $config['setting']['email'] = true;
    $config['setting']['website'] = true;
    $config['setting']['fanpage'] = true;
    $config['setting']['coords'] = true;
    $config['setting']['coords_iframe'] = true;
    $config['setting']['name'] = true;

    /* Quản lý tài khoản */

$config['user']['active'] = true;

$config['user']['admin'] = true;

$config['user']['check_admin'] = array("hienthi" => "Kích hoạt");

$config['user']['member'] = true;

$config['user']['check_member'] = array("hienthi" => "Kích hoạt");
?>