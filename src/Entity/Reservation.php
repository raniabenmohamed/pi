<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $coderes;

    /**
     * @ORM\Column(type="date")
     */
    private $dateres;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbjours;

    /**
     * @ORM\Column(type="float")
     */
    private $prixres;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enable;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCoderes(): ?string
    {
        return $this->coderes;
    }

    public function setCoderes(string $coderes): self
    {
        $this->coderes = $coderes;

        return $this;
    }

    public function getDateres(): ?\DateTimeInterface
    {
        return $this->dateres;
    }

    public function setDateres(\DateTimeInterface $dateres): self
    {
        $this->dateres = $dateres;

        return $this;
    }

    public function getNbjours(): ?int
    {
        return $this->nbjours;
    }

    public function setNbjours(int $nbjours): self
    {
        $this->nbjours = $nbjours;

        return $this;
    }

    public function getPrixres(): ?float
    {
        return $this->prixres;
    }

    public function setPrixres(float $prixres): self
    {
        $this->prixres = $prixres;

        return $this;
    }

    public function getEnable(): ?bool
    {
        return $this->enable;
    }

    public function setEnable(bool $enable): self
    {
        $this->enable = $enable;

        return $this;
    }
}
