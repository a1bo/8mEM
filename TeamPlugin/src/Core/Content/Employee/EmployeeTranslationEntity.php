<?php declare(strict_types=1);

namespace TeamPlugin\Core\Content\Employee;

use Shopware\Core\Framework\DataAbstractionLayer\TranslationEntity;

class EmployeeTranslationEntity extends TranslationEntity
{
    protected ?string $text = null;

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): void
    {
        $this->text = $text;
    }
}
