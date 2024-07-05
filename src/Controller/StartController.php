<?php

declare(strict_types=1);

namespace OxidAcademy\ProductPromotionBanner\Controller;

use OxidAcademy\ProductDataReader\DataReaderService;
use OxidAcademy\ProductPromotionBanner\Service\ModuleSettings;
use OxidEsales\EshopCommunity\Core\Di\ContainerFacade;

class StartController extends StartController_parent
{
    public function init()
    {
        parent::init();

        $this->setProductDataToTemplate();
    }

    private function setProductDataToTemplate(): void
    {
        $productData = $this->getProductData();

        $this->addTplParam('productMatch', $productData['match']);

        if ($productData['match']) {
            $this->addTplParam('productTitle', $productData['title']);
            $this->addTplParam('productPrice', $productData['price']);
            $this->addTplParam('productUrl', $productData['url']);
        }
    }

    private function getProductData(): array
    {
        return ContainerFacade::get(DataReaderService::class)->readDataByItemNumber($this->getItemNumber());
    }

    private function getItemNumber(): string
    {
        return ContainerFacade::get(ModuleSettings::class)->getItemNumber();
    }
}
