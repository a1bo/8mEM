<?php declare(strict_types=1);

namespace TeamPlugin\Core\Content\Employee;

use Shopware\Core\Content\Media\MediaEntity;
use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityCustomFieldsTrait;
use Shopware\Core\Framework\DataAbstractionLayer\TranslationEntity;

class EmployeeEntity extends Entity
{
    use EntityCustomFieldsTrait;

    protected ?string $position = null;
    protected ?string $backgroundImageId = null;
    protected ?MediaEntity $backgroundImage = null;
    protected ?string $personImageId = null;
    protected ?MediaEntity $personImage = null;
    protected ?string $text = null;

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(?string $position): void
    {
        $this->position = $position;
    }

    public function getBackgroundImageId(): ?string
    {
        return $this->backgroundImageId;
    }

    public function setBackgroundImageId(?string $backgroundImageId): void
    {
        $this->backgroundImageId = $backgroundImageId;
    }

    public function getBackgroundImage(): ?MediaEntity
    {
        return $this->backgroundImage;
    }

    public function setBackgroundImage(?MediaEntity $backgroundImage): void
    {
        $this->backgroundImage = $backgroundImage;
    }

    public function getPersonImageId(): ?string
    {
        return $this->personImageId;
    }

    public function setPersonImageId(?string $personImageId): void
    {
        $this->personImageId = $personImageId;
    }

    public function getPersonImage(): ?MediaEntity
    {
        return $this->personImage;
    }

    public function setPersonImage(?MediaEntity $personImage): void
    {
        $this->personImage = $personImage;
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
