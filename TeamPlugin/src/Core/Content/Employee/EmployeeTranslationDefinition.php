<?php declare(strict_types=1);

namespace TeamPlugin\Core\Content\Employee;

use Shopware\Core\Framework\DataAbstractionLayer\EntityTranslationDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\LongTextField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class EmployeeTranslationDefinition extends EntityTranslationDefinition
{
    public const ENTITY_NAME = 'team_employee_translation';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    public function getCollectionClass(): string
    {
        return EmployeeTranslationCollection::class;
    }

    public function getEntityClass(): string
    {
        return EmployeeTranslationEntity::class;
    }

    protected function getParentDefinitionClass(): string
    {
        return EmployeeDefinition::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            new StringField('name', 'name'), // Added missing name field
            new StringField('position', 'position'),
            new LongTextField('text', 'text'),
        ]);
    }
}
