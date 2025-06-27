<?php declare(strict_types=1);

namespace TeamPlugin\Core\Content\Employee;

use Shopware\Core\Framework\DataAbstractionLayer\TranslationEntity;

class EmployeeTranslationEntity extends TranslationEntity
{
    protected ?string $name = null;
    protected ?string $text = null;

    public static function getTranslatedFields(): array
    {
        return ['name', 'position', 'text'];
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): void
    {
        $this->text = $text;
    }
}
