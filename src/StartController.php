<?php

declare(strict_types = 1);

namespace OxidAcademy\ProductPromotionBanner;

use OxidAcademy\ProductDataReader\DataReaderService;
use OxidEsales\EshopCommunity\Internal\Container\ContainerFactory;

class StartController extends StartController_parent
{
    public function init()
    {
        parent::init();

        $this->setProductDataToTemplate();
    }

    private function setProductDataToTemplate(): void
    {
        $itemNumber = 1402;

        $serviceContainer = ContainerFactory::getInstance()->getContainer();
        $dataReaderService = $serviceContainer->get(DataReaderService::class);

        $productData = $dataReaderService->readDataByItemNumber($itemNumber);

        $this->addTplParam('productTitle', $productData['title']);
        $this->addTplParam('productPrice', $productData['price']);
        $this->addTplParam('productUrl', $productData['turl']);
    }
}
