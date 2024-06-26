<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

/**
 * Metadata version
 */
$sMetadataVersion = '2.1';

/**
 * Module information
 */
$aModule = [
    'id'          => 'oxacppb',
    'title'       => 'OXID Academy Product Promotion Banner',
    'description' => [
        'en' => 'Shows promotion banner on start page for a selected product.',
        'de' => 'Zeigt einen Werbebanner für ein ausgewähltes Produkt auf der Startseite an.',
    ],
    'thumbnail'   => 'pictures/logo.svg',
    'version'     => '1.0.0',
    'author'      => 'OXID Academy',
    'url'         => 'https://www.oxid-esales.com/ressourcen/academy/',
    'email'       => 'academy@oxid-esales.com',
    'extend'      => [
        OxidEsales\Eshop\Application\Controller\StartController::class => OxidAcademy\ProductPromotionBanner\Controller\StartController::class,
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
