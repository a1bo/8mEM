<?php declare(strict_types=1);

namespace TeamPlugin\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1682235152AddNameColumn extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1682235152;
    }

    public function update(Connection $connection): void
    {
        $connection->executeStatement(
            'ALTER TABLE `team_employee_translation` ADD COLUMN `name` VARCHAR(255) NULL;'
        );
    }

    public function updateDestructive(Connection $connection): void
    {
        // no destructive update required
    }
}
