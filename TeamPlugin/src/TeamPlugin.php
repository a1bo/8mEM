<?php declare(strict_types=1);

namespace TeamPlugin;

use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\InstallContext;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;
use Shopware\Core\Framework\Plugin\Context\UpdateContext;

class TeamPlugin extends Plugin
{
    public function install(InstallContext $installContext): void
    {
        parent::install($installContext);
        $this->updateDatabase($installContext->getContext());
    }

    public function update(UpdateContext $updateContext): void
    {
        parent::update($updateContext);
        $this->updateDatabase($updateContext->getContext());
    }

    public function uninstall(UninstallContext $uninstallContext): void
    {
        parent::uninstall($uninstallContext);
        if (!$uninstallContext->keepUserData()) {
            $this->updateDatabase($uninstallContext->getContext());
        }
    }
}
