<?php declare(strict_types=1);

namespace TeamPlugin\Core\Content\Employee;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @method void add(EmployeeTranslationEntity $entity)
 * @method void set(string $key, EmployeeTranslationEntity $entity)
 * @method EmployeeTranslationEntity[] getIterator()
 * @method EmployeeTranslationEntity[] getElements()
 * @method EmployeeTranslationEntity|null get(string $key)
 * @method EmployeeTranslationEntity|null first()
 * @method EmployeeTranslationEntity|null last()
 */
class EmployeeTranslationCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return EmployeeTranslationEntity::class;
    }
}
