<?php

namespace App\Entity;

use App\Repository\ModeleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModeleRepository::class)]
class Modele
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type_modele = null;

    #[ORM\Column]
    private ?int $annee_modele = null;

    #[ORM\Column(length: 255)]
    private ?string $conso = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeModele(): ?string
    {
        return $this->type_modele;
    }

    public function setTypeModele(string $type_modele): static
    {
        $this->type_modele = $type_modele;

        return $this;
    }

    public function getAnneeModele(): ?int
    {
        return $this->annee_modele;
    }

    public function setAnneeModele(int $annee_modele): static
    {
        $this->annee_modele = $annee_modele;

        return $this;
    }

    public function getConso(): ?string
    {
        return $this->conso;
    }

    public function setConso(string $conso): static
    {
        $this->conso = $conso;

        return $this;
    }
}
