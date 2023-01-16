<?php

declare(strict_types = 1);

namespace OxidAcademy\ProductPromotionBanner\Controller;

use OxidAcademy\ProductDataReader\DataReaderService;
use OxidAcademy\ProductPromotionBanner\Service\ModuleSettings;
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
        $dataReaderService = ContainerFactory::getInstance()
            ->getContainer()
            ->get(DataReaderService::class);

        return $dataReaderService->readDataByItemNumber($this->getItemNumber());
    }

    private function getItemNumber(): int
    {
        return ContainerFactory::getInstance()
            ->getContainer()
            ->get(ModuleSettings::class)
            ->getItemNumber();
    }

    private function displayProductPrice(): bool
    {
        return ContainerFactory::getInstance()
            ->getContainer()
            ->get(ModuleSettings::class)
            ->getDisplayPrice();
    }
}
