<?php declare(strict_types=1);

namespace TeamPlugin\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1703000000CreateEmployeeTable extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1703000000;
    }

    public function update(Connection $connection): void
    {
        $sql = <<<SQL
CREATE TABLE IF NOT EXISTS `team_employee` (
    `id` BINARY(16) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `position` VARCHAR(255) NOT NULL,
    `description` LONGTEXT NULL,
    `background_image_id` BINARY(16) NULL,
    `person_image_id` BINARY(16) NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    KEY `fk.team_employee.background_image_id` (`background_image_id`),
    KEY `fk.team_employee.person_image_id` (`person_image_id`),
    CONSTRAINT `fk.team_employee.background_image_id` FOREIGN KEY (`background_image_id`) REFERENCES `media` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.team_employee.person_image_id` FOREIGN KEY (`person_image_id`) REFERENCES `media` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
SQL;

        $connection->executeStatement($sql);
    }

    public function updateDestructive(Connection $connection): void
    {
        // implement destructive changes
    }
}
