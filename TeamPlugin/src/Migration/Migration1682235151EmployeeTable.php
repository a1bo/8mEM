<?php declare(strict_types=1);

namespace TeamPlugin\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1682235151EmployeeTable extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1682235151;
    }

    public function update(Connection $connection): void
    {
        $connection->executeStatement(
            'CREATE TABLE IF NOT EXISTS `team_employee` (
                `id` BINARY(16) NOT NULL,
                `name` VARCHAR(255) NOT NULL,
                `position` VARCHAR(255) NOT NULL,
                `description` LONGTEXT NULL,
                `background_image` LONGBLOB NULL,
                `person_image` LONGBLOB NULL,
                `created_at` DATETIME(3) NOT NULL,
                `updated_at` DATETIME(3) NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;'
        );
    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
