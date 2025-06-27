<?php declare(strict_types=1);

namespace TeamPlugin\Core\Content\Employee;

use Shopware\Core\Content\Media\MediaDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslatedField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\LongTextField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslationsAssociationField;

class EmployeeDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'team_employee';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    public function getCollectionClass(): string
    {
        return EmployeeCollection::class;
    }

    public function getEntityClass(): string
    {
        return EmployeeEntity::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new PrimaryKey(), new Required()),
            (new TranslatedField('name'))->addFlags(new Required()),
            (new TranslatedField('position'))->addFlags(new Required()),
            (new FkField('background_image_id', 'backgroundImageId', MediaDefinition::class)),
            (new FkField('person_image_id', 'personImageId', MediaDefinition::class)),
            (new TranslatedField('text')),

            new ManyToOneAssociationField('backgroundImage', 'background_image_id', MediaDefinition::class, 'id', false, 'id'),
            new ManyToOneAssociationField('personImage', 'person_image_id', MediaDefinition::class, 'id', false, 'id'),
            new TranslationsAssociationField(EmployeeTranslationDefinition::class, 'team_employee_id'),
        ]);
    }

    public function getTranslationDefinitionClass(): string
    {
        return EmployeeTranslationDefinition::class;
    }
}
