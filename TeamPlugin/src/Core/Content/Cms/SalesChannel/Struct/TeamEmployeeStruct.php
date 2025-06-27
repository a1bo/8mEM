<?php declare(strict_types=1);

namespace TeamPlugin\Core\Content\Cms\SalesChannel\Struct;

use Shopware\Core\Framework\Struct\Struct;
use TeamPlugin\Core\Content\Employee\EmployeeCollection;

class TeamEmployeeStruct extends Struct
{
    /**
     * @var EmployeeCollection|null
     */
    protected $employees;

    public function getEmployees(): ?EmployeeCollection
    {
        return $this->employees;
    }

    public function setEmployees(?EmployeeCollection $employees): void
    {
        $this->employees = $employees;
    }
}
