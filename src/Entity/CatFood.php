<?php

namespace App\Entity;

use App\Repository\CatFoodRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CatFoodRepository::class)
 */
class CatFood
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $Menu;

    /**
     * @ORM\Column(type="text")
     */
    private $Description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMenu(): ?string
    {
        return $this->Menu;
    }

    public function setMenu(string $Menu): self
    {
        $this->Menu = $Menu;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }
}
