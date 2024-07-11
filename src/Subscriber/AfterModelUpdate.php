<?php

declare(strict_types=1);

namespace OxidAcademy\ProductPromotionBanner\Subscriber;

use OxidAcademy\ProductPromotionBanner\Service\ModuleSettings;
use OxidAcademy\ProductPromotionBanner\Service\ProductSelector;
use OxidEsales\Eshop\Application\Model\Article;
use OxidEsales\EshopCommunity\Internal\Transition\ShopEvents\AfterModelUpdateEvent;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AfterModelUpdate implements EventSubscriberInterface
{
    public function __construct(
        private ModuleSettings $moduleSettings,
        private ProductSelector $productSelector,
        private LoggerInterface $logger
    ) {}
    
    public function handle(AfterModelUpdateEvent $event): AfterModelUpdateEvent
    {
        $model = $event->getModel();

        if (
            get_class($model) === Article::class
            && $model->getFieldData('oxartnum') == $this->moduleSettings->getItemNumber()
            && $model->getStock() < 10
        ) {
            $this->productSelector->removeProduct($model->getFieldData('oxartnum'));
            $this->productSelector->setProduct();
            $this->logger->info('Module Product Promotion Banner: item was changed.');
        }

        return $event;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            AfterModelUpdateEvent::class => 'handle',
        ];
    }
}
