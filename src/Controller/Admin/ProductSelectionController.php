<?php

declare(strict_types=1);

namespace OxidAcademy\ProductPromotionBanner\Controller\Admin;

use OxidAcademy\ProductDataReader\Service\DataReader;
use OxidAcademy\ProductPromotionBanner\Model\BannerProduct;
use OxidEsales\Eshop\Application\Controller\Admin\AdminController;
use OxidEsales\Eshop\Core\Field;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\EshopCommunity\Core\Di\ContainerFacade;
use OxidEsales\EshopCommunity\Internal\Framework\Database\QueryBuilderFactoryInterface;

class ProductSelectionController extends AdminController
{
    private string $template = '@oxacppb/templates/productselection';
    
    public function render(): string
    {
        parent::render();

        $this->addTplParam('products', $this->getSelectedProducts());

        return $this->template;
    }

    public function save(): void
    {
        $param = Registry::getRequest()->getRequestEscapedParameter('param');

        $dataReader = ContainerFacade::get(DataReader::class);
        $result = $dataReader->readDataByItemNumber($param['item-number']);

        if ($result['match']) {
            $bannerProduct = oxNew(BannerProduct::class);
            $bannerProduct->oxacbannerproducts__oxid = $bannerProduct->getId();
            $bannerProduct->oxacbannerproducts__oxacitemnumber = new Field($param['item-number']);
            $bannerProduct->save();
        } else {
            $this->addTplParam('error', true);
        }
    }

    private function getSelectedProducts(): array
    {
        $queryBuilder = (ContainerFacade::get(QueryBuilderFactoryInterface::class))->create();
        $queryBuilder
            ->select('OXACITEMNUMBER')
            ->from('oxacbannerproducts');
        
        return $queryBuilder->execute()->fetchAllAssociative();
    }
}
