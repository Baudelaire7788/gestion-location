<?php

namespace App\Entity;

use App\Repository\BienImmobilierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\InheritanceType('JOINED')]
#[ORM\DiscriminatorColumn(name: 'discr', type: 'string')]
#[ORM\DiscriminatorMap(['appartement' => Appartement::class, 'chambre' => Chambre::class])]

#[ORM\Entity(repositoryClass: BienImmobilierRepository::class)]
abstract class BienImmobilier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    protected ?int $id = null;

    #[ORM\Column(length: 80)]
    protected ?string $libelle = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 9, scale: 1)]
    protected ?string $cout = null;

    #[ORM\ManyToMany(targetEntity: Commande::class, inversedBy: 'bienImmobiliers')]
    protected Collection $Commande;

    public function __construct()
    {
        $this->Commande = new ArrayCollection();
    }

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

    public function getCout(): ?string
    {
        return $this->cout;
    }

    public function setCout(string $cout): self
    {
        $this->cout = $cout;

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommande(): Collection
    {
        return $this->Commande;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->Commande->contains($commande)) {
            $this->Commande->add($commande);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        $this->Commande->removeElement($commande);

        return $this;
    }
}
