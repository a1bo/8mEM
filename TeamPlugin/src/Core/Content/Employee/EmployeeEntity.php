<?php declare(strict_types=1);

namespace TeamPlugin\Core\Content\Employee;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\System\Media\MediaEntity;

class EmployeeEntity extends Entity
{
    protected string $name;
    protected string $position;
    protected string $description;
    protected ?MediaEntity $backgroundImage = null;
    protected ?MediaEntity $personImage = null;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function setPosition(string $position): void
    {
        $this->position = $position;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getBackgroundImage(): ?MediaEntity
    {
        return $this->backgroundImage;
    }

    public function setBackgroundImage(?MediaEntity $backgroundImage): void
    {
        $this->backgroundImage = $backgroundImage;
    }

    public function getPersonImage(): ?MediaEntity
    {
        return $this->personImage;
    }

    public function setPersonImage(?MediaEntity $personImage): void
    {
        $this->personImage = $personImage;
    }
}
