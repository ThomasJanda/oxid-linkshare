<?php

$sMetadataVersion = '2.0';

$aModule = array(
    'id'          => 'rs-linkshare',
    'title'       => '*RS Link Share',
    'description' => 'Display better preview if you share a link (whatsapp, skype...)',
    'thumbnail'   => '',
    'version'     => '1.0.0',
    'author'      => '',
    'url'         => '',
    'email'       => '',
    'controllers' => array(
        'rs_linkshare_article' => \rs\linkshare\Application\Controller\Admin\rs_linkshare_article::class,
        'rs_linkshare_category' => \rs\linkshare\Application\Controller\Admin\rs_linkshare_category::class,
        'rs_linkshare_content' => \rs\linkshare\Application\Controller\Admin\rs_linkshare_content::class,
    ),
    'extend'           => array(
        \OxidEsales\Eshop\Core\Config::class => rs\linkshare\Core\Config::class,
        \OxidEsales\Eshop\Core\Language::class => rs\linkshare\Core\Language::class,
        \OxidEsales\Eshop\Application\Model\Content::class => rs\linkshare\Application\Model\Content::class,
        \OxidEsales\Eshop\Application\Model\Article::class => rs\linkshare\Application\Model\Article::class,
        \OxidEsales\Eshop\Application\Model\Category::class => rs\linkshare\Application\Model\Category::class,
    ),
    'templates' => array(
        'rs_linkshare_article.tpl'   => 'rs/linkshare/views/admin/tpl/rs_linkshare_article.tpl',
        'rs_linkshare_category.tpl'   => 'rs/linkshare/views/admin/tpl/rs_linkshare_category.tpl',
        'rs_linkshare_content.tpl'   => 'rs/linkshare/views/admin/tpl/rs_linkshare_content.tpl',
    ),
    'blocks'      => array(
        array(
            'template' => 'layout/base.tpl',
            'block'    => 'head_meta_open_graph',
            'file'     => '/views/blocks/layout/base__head_meta_open_graph.tpl',
        ),
    ),
    'settings'    => array(
        array(
            'group' => 'rs-linkshare_main',
            'name'  => 'rs-linkshare_main_logo_url',
            'type'  => 'str',
            'value' => '',
        ),
    ),
);