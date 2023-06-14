<?php

namespace App\Entity;

use App\Repository\HoraireRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HoraireRepository::class)]
class Horaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $ouverture = null;

    #[ORM\Column(length: 255)]
    private ?string $fermeture = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $jourSemaine = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOuverture(): ?string
    {
        return $this->ouverture;
    }

    public function setOuverture(string $ouverture): self
    {
        $this->ouverture = $ouverture;

        return $this;
    }

    public function getFermeture(): ?string
    {
        return $this->fermeture;
    }

    public function setFermeture(string $fermeture): self
    {
        $this->fermeture = $fermeture;

        return $this;
    }

    public function getJourSemaine(): ?string
    {
        return $this->jourSemaine;
    }

    public function setJourSemaine(?string $jourSemaine): self
    {
        $this->jourSemaine = $jourSemaine;

        return $this;
    }
}
