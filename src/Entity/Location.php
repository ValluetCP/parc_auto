<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocationRepository::class)]
class Location
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_location = null;

    #[ORM\Column]
    private ?int $nb_jr_location = null;

    #[ORM\Column]
    private ?int $prix_location = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateLocation(): ?\DateTimeInterface
    {
        return $this->date_location;
    }

    public function setDateLocation(\DateTimeInterface $date_location): static
    {
        $this->date_location = $date_location;

        return $this;
    }

    public function getNbJrLocation(): ?int
    {
        return $this->nb_jr_location;
    }

    public function setNbJrLocation(int $nb_jr_location): static
    {
        $this->nb_jr_location = $nb_jr_location;

        return $this;
    }

    public function getPrixLocation(): ?int
    {
        return $this->prix_location;
    }

    public function setPrixLocation(int $prix_location): static
    {
        $this->prix_location = $prix_location;

        return $this;
    }
}
