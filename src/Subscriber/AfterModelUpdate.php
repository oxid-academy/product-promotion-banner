<?php

declare(strict_types=1);

namespace OxidAcademy\ProductPromotionBanner\Subscriber;

use OxidAcademy\ProductPromotionBanner\Service\ModuleSettings;
use OxidEsales\Eshop\Application\Model\Article;
use OxidEsales\EshopCommunity\Internal\Transition\ShopEvents\AfterModelUpdateEvent;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AfterModelUpdate implements EventSubscriberInterface
{
    public function __construct(
        private ModuleSettings $moduleSettings,
        private LoggerInterface $logger
    ) {}
    
    public function handle(AfterModelUpdateEvent $event): AfterModelUpdateEvent
    {
        $model = $event->getModel();

        if (
            get_class($model) === Article::class
            && $model->getFieldData('oxartnum') == $this->moduleSettings->getItemNumber()
            && $model->getStock() < 1
        ) {
            $this->moduleSettings->resetItemNumber();
            $this->logger->info('Module Product Promotion Banner: item number was reset.');
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
