<?php declare(strict_types=1);

namespace TeamPlugin\Core\Content\Employee;

use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\BlobField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\LongTextField;

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
            new BlobField('background_image', 'backgroundImage'),
            new BlobField('person_image', 'personImage'),
        ]);
    }
}
