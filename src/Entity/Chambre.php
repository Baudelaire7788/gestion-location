<?php

namespace App\Entity;

use App\Repository\ChambreRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChambreRepository::class)]
class Chambre extends BienImmobilier
{


    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $superficie = null;


    #[ORM\Column(type: Types::DECIMAL, precision: 3, scale: '0')]
    private ?string $place = null;

    #[ORM\Column]
    private ?bool $couche = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSuperficie(): ?string
    {
        return $this->superficie;
    }

    public function setSuperficie(string $superficie): self
    {
        $this->superficie = $superficie;

        return $this;
    }

    public function getCout(): ?string
    {
        return $this->cout;
    }

    public function setCout(string $cout): self
    {
        $this->cout = $cout;

        return $this;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(string $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function isCouche(): ?bool
    {
        return $this->couche;
    }

    public function setCouche(bool $couche): self
    {
        $this->couche = $couche;

        return $this;
    }
    public function __toString()
    {
        return $this->id;
    }
}
