<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidAcademy\ProductPromotionBanner\Core;

final class Module
{
    // METADATA
    public const MODULE_ID = 'oxacppb';

    // SETTINGS
    public const SETTING_GROUP_PROMOTION_MESSAGE = 'oxacppb_promotionMessage';
    public const SETTING_DISPLAY_PRICE = 'oxacppb_displayPrice';
    public const SETTING_GROUP_PRODUCT_SELECTION = 'oxacppb_productSelection';
    public const SETTING_ITEM_NUMBER = 'oxacppb_itemNumber';
}
