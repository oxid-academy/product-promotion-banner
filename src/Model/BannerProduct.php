<?php

declare(strict_types=1);

namespace OxidAcademy\ProductPromotionBanner\Model;

use OxidEsales\Eshop\Core\Model\BaseModel;

class BannerProduct extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        
        $this->init('oxacbannerproducts');
    }
}
