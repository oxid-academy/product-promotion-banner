<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

use OxidAcademy\ProductPromotionBanner\Core\Module;

$aLang = [
    'charset' => 'UTF-8',
    'SHOP_MODULE_GROUP_' . Module::SETTING_GROUP_PROMOTION_MESSAGE => 'Werbenachricht',
    'SHOP_MODULE_' . Module::SETTING_DISPLAY_PRICE => 'Artikelpreis anzeigen',
    'SHOP_MODULE_GROUP_' . Module::SETTING_GROUP_PRODUCT_SELECTION => 'Artikelauswahl',
    'SHOP_MODULE_' . Module::SETTING_ITEM_NUMBER => 'Artikelnummer',
    'HELP_SHOP_MODULE_' . Module::SETTING_ITEM_NUMBER => 'Es muss eine Artikelnummer eines bestehenden Artikels hinterlegt werden. Die Daten dieses Artikels werden im Werbebanner angezeigt.',
];
