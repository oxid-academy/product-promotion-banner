<?php

declare(strict_types=1);

namespace OxidAcademy\ProductPromotionBanner\Service;

use OxidAcademy\ProductPromotionBanner\Core\Module;
use OxidEsales\EshopCommunity\Internal\Framework\Module\Facade\ModuleSettingServiceInterface;
use Symfony\Component\String\UnicodeString;

class ModuleSettings
{
    public function __construct(private ModuleSettingServiceInterface $moduleSettingService) {}

    public function getItemNumber(): string
    {
        return (string) $this->moduleSettingService->getString(Module::SETTING_ITEM_NUMBER, Module::MODULE_ID);
    }

    public function getDisplayPrice(): bool
    {
        return (bool) $this->moduleSettingService->getBoolean(Module::SETTING_DISPLAY_PRICE, Module::MODULE_ID);
    }

    public function resetItemNumber(): void
    {
        $this->moduleSettingService->saveString(Module::SETTING_ITEM_NUMBER, '', Module::MODULE_ID);
    }
}
