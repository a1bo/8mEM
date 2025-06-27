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
        $sql = <<<SQL
CREATE TABLE IF NOT EXISTS `team_employee` (
    `id` BINARY(16) NOT NULL,
    `background_image_id` BINARY(16) NULL,
    `person_image_id` BINARY(16) NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `fk.team_employee.background_image_id` FOREIGN KEY (`background_image_id`) REFERENCES `media` (`id`) ON DELETE SET NULL,
    CONSTRAINT `fk.team_employee.person_image_id` FOREIGN KEY (`person_image_id`) REFERENCES `media` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
SQL;
        $connection->executeStatement($sql);
        $this->createTranslationTable($connection);
    }

    private function createTranslationTable(Connection $connection): void
    {
        $sql = <<<SQL
CREATE TABLE IF NOT EXISTS `team_employee_translation` (
    `team_employee_id` BINARY(16) NOT NULL,
    `language_id` BINARY(16) NOT NULL,
    `position` VARCHAR(255) NULL,
    `text` LONGTEXT NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`team_employee_id`, `language_id`),
    CONSTRAINT `fk.team_employee_translation.team_employee_id` FOREIGN KEY (`team_employee_id`) REFERENCES `team_employee` (`id`) ON DELETE CASCADE,
    CONSTRAINT `fk.team_employee_translation.language_id` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
SQL;
        $connection->executeStatement($sql);
    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
