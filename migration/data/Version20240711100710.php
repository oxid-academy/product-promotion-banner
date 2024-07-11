<?php

declare(strict_types=1);

namespace OxidAcademy\ProductPromotionBanner\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240711100710 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `oxacbannerproducts` (
            `OXID` CHAR(32) COLLATE utf8_general_ci NOT NULL,
            `OXACITEMNUMBER` VARCHAR(255) COLLATE utf8_general_ci NOT NULL,
            PRIMARY KEY (`OXID`)
        ) ENGINE=InnoDB COLLATE utf8_general_ci';
        
        $this->addSql($sql);
    }

    public function down(Schema $schema): void
    {}
}
