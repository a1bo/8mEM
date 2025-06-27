<?php declare(strict_types=1);

namespace TeamPlugin\Core\Content\Cms\SalesChannel;

use Shopware\Core\Cms\CmsPageEntity;
use Shopware\Core\Content\Cms\Aggregate\CmsSlot\CmsSlotEntity;
use Shopware\Core\Content\Cms\SalesChannel\Resolver\CmsElementResolver;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\System\SalesChannel\SalesChannelContext;
use TeamPlugin\Core\Content\Cms\SalesChannel\Struct\TeamEmployeeStruct;
use TeamPlugin\Core\Content\Employee\EmployeeCollection;

class TeamEmployeeCmsElementResolver extends CmsElementResolver
{
    private EntityRepository $employeeRepository;

    public function __construct(EntityRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function getType(): string
    {
        return 'team-employee';
    }

    public function enrich(CmsSlotEntity $slot, SalesChannelContext $context, CmsPageEntity $page): void
    {
        $config = $slot->getFieldConfig();
        $employeesConfig = $config->get('employees');

        if (!$employeesConfig || $employeesConfig->getValue() === null) {
            return;
        }

        $criteria = new Criteria($employeesConfig->getValue());
        $criteria->addAssociation('backgroundImage');
        $criteria->addAssociation('personImage');

        /** @var EmployeeCollection $employees */
        $employees = $this->employeeRepository->search($criteria, $context)->getEntities();

        $slot->setData(new TeamEmployeeStruct($employees));
    }
}
