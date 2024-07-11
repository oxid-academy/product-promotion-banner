<?php

declare(strict_types=1);

namespace OxidAcademy\ProductPromotionBanner\Service;

use OxidAcademy\ProductPromotionBanner\Model\BannerProduct;
use OxidEsales\EshopCommunity\Internal\Framework\Database\QueryBuilderFactoryInterface;

class ProductSelector
{
    public function __construct(
        private QueryBuilderFactoryInterface $queryBuilderFactory,
        private ModuleSettings $moduleSettings        
    ) {}

    public function removeProduct(string $itemNumber): void
    {
        $queryBuilder = $this->queryBuilderFactory->create();
        $queryBuilder
            ->select('OXID')
            ->from('oxacbannerproducts')
            ->where('OXACITEMNUMBER = :itemNumber')
            ->setParameter('itemNumber', $itemNumber);
        $result = $queryBuilder->execute()->fetchOne();

        $bannerProduct = oxNew(BannerProduct::class);
        $bannerProduct->load($result);
        $bannerProduct->delete();     
    }    

    public function setProduct(): void
    {
        $queryBuilder = $this->queryBuilderFactory->create();
        $queryBuilder
            ->select('OXACITEMNUMBER')
            ->from('oxacbannerproducts');
        $result = $queryBuilder->execute()->fetchOne();

        if ($result !== false) {
            $this->moduleSettings->setItemNumber($result);
        } else {
            $this->moduleSettings->resetItemNumber();
        }
    } 
}
