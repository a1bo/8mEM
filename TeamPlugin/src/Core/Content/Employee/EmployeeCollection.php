<?php declare(strict_types=1);

namespace TeamPlugin\Core\Content\Employee;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @method void              add(EmployeeEntity $entity)
 * @method void              set(string $key, EmployeeEntity $entity)
 * @method EmployeeEntity[]    getIterator()
 * @method EmployeeEntity[]    getElements()
 * @method EmployeeEntity|null get(string $key)
 * @method EmployeeEntity|null first()
 * @method EmployeeEntity|null last()
 */
class EmployeeCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return EmployeeEntity::class;
    }
}
