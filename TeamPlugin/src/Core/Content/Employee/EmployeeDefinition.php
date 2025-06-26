<?php declare(strict_types=1);

namespace TeamPlugin\Core\Content\Employee;

use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\LongTextField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\System\Media\MediaDefinition;

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
            (new IdField('id', 'id'))->addFlags(new Required(), new PrimaryKey()),
            new StringField('name', 'name'),
            new StringField('position', 'position'),
            new LongTextField('description', 'description'),
            (new FkField('background_image_id', 'backgroundImageId', MediaDefinition::class))->addFlags(new Required()),
            new OneToOneAssociationField('backgroundImage', 'background_image_id', 'id', MediaDefinition::class, false),
            (new FkField('person_image_id', 'personImageId', MediaDefinition::class))->addFlags(new Required()),
            new OneToOneAssociationField('personImage', 'person_image_id', 'id', MediaDefinition::class, false),
        ]);
    }
}
