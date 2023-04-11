<?php

declare(strict_types=1);

namespace OxidAcademy\ProductPromotionBanner\Controller;

use OxidAcademy\ProductDataReader\DataReaderService;
use OxidAcademy\ProductPromotionBanner\Service\ModuleSettings;
use OxidAcademy\ProductPromotionBanner\Traits\ServiceContainer;
use OxidEsales\EshopCommunity\Internal\Container\ContainerFactory;

class StartController extends StartController_parent
{
    use ServiceContainer;

    public function init()
    {
        parent::init();

        $this->setProductDataToTemplate();
    }

    private function setProductDataToTemplate(): void
    {
        $productData = $this->getProductData();

        $this->addTplParam('displayPrice', $this->displayProductPrice());
        $this->addTplParam('productMatch', $productData['match']);

        if ($productData['match']) {
            $this->addTplParam('productTitle', $productData['title']);
            $this->addTplParam('productPrice', $productData['price']);
            $this->addTplParam('productUrl', $productData['url']);
        }
    }

    private function getProductData(): array
    {
        return $this->getServiceFromContainer(DataReaderService::class)->readDataByItemNumber($this->getItemNumber());
    }

    private function getItemNumber(): string
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getItemNumber();
    }

    private function displayProductPrice(): bool
    {
        return $this->getServiceFromContainer(ModuleSettings::class)->getDisplayPrice();
    }
}
