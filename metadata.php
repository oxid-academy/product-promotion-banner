<?php

/**
 * Metadata version
 */
$sMetadataVersion = '2.1';

/**
 * Module information
 */
$aModule = [
    'id' => 'oxacppb',
    'title' => 'OXID Academy Product Promotion Banner',
    'description' => [
        'en' => 'Shows promotion banner on start page for a selected product.',
        'de' => 'Zeigt einen Werbebanner für ein ausgewähltes Produkt auf der Startseite an.',
    ],
    'thumbnail' => 'pictures/logo.svg',
    'version' => '2.2.1',
    'author' => 'OXID Academy',
    'url' => 'https://www.oxid-esales.com/ressourcen/academy/',
    'email' => 'academy@oxid-esales.com',
    'extend' => [
        \OxidEsales\Eshop\Application\Controller\StartController::class => \OxidAcademy\ProductPromotionBanner\Controller\StartController::class,
    ],
    'controllers' => [
        'oxacppbproductselection' => \OxidAcademy\ProductPromotionBanner\Controller\Admin\ProductSelectionController::class,
    ],
    'settings' => [
        [
            'group' => 'oxacppb_productSelection',
            'name'  => 'oxacppb_itemNumber',
            'type'  => 'str',
            'value' => ''
        ],
    ],
];
