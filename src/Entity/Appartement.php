<?php

namespace App\Entity;

use App\Repository\AppartementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppartementRepository::class)]
class Appartement extends BienImmobilier
{



    #[ORM\ManyToOne(inversedBy: 'appartements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TypeAppart $typeAppart = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getTypeAppart(): ?TypeAppart
    {
        return $this->typeAppart;
    }

    public function setTypeAppart(?TypeAppart $typeAppart): self
    {
        $this->typeAppart = $typeAppart;

        return $this;
    }
    public function __toString()
    {
        return $this->id;
    }
}
