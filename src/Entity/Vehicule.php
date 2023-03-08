<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehiculeRepository::class)]
class Vehicule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 9)]
    private ?string $immarticulation = null;

    #[ORM\Column]
    private ?int $kilometrage = null;

    #[ORM\Column(length: 4)]
    private ?string $annee = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImmarticulation(): ?string
    {
        return $this->immarticulation;
    }

    public function setImmarticulation(string $immarticulation): self
    {
        $this->immarticulation = $immarticulation;

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
}
