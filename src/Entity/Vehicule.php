<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: VehiculeRepository::class)]
class Vehicule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 9)]
    #[Assert\NotBlank(message: "Champ obligatoire")]
    #[Assert\Regex(pattern: '/^[A-Z][A-Z]-[0-9]{3}-[A-Z][A-Z]$/', message: 'Format incorrect')]
    private ?string $immatriculation = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "Champ obligatoire")]
    private ?int $kilometrage = null;

    #[ORM\Column(length: 4)]
    #[Assert\NotBlank(message: "Champ obligatoire")]
    private ?string $annee = null;

    #[ORM\ManyToOne(inversedBy: 'vehicules')]
    private ?Marque $marque = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(string $immatriculation): self
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    public function getKilometrage(): ?int
    {
        return $this->kilometrage;
    }

    public function setKilometrage(int $kilometrage): self
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getAnnee(): ?string
    {
        return $this->annee;
    }

    public function setAnnee(string $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getMarque(): ?Marque
    {
        return $this->marque;
    }

    public function setMarque(?Marque $marque): self
    {
        $this->marque = $marque;

        return $this;
    }
}
