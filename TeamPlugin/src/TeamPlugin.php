<?php declare(strict_types=1);

namespace TeamPlugin;

use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\InstallContext;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;

class TeamPlugin extends Plugin
{
    public function install(InstallContext $installContext): void
    {
        parent::install($installContext);
        // custom install logic
    }

    public function uninstall(UninstallContext $uninstallContext): void
    {
        parent::uninstall($uninstallContext);
        // custom uninstall logic
    }
}
