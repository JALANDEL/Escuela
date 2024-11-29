<?php

namespace App\Entity;

use App\Repository\AulaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AulaRepository::class)]
class Aula
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 5)]
    private ?string $codigo = null;

    #[ORM\Column]
    private ?int $capacidad = null;

    /**
     * @var Collection<int, Idioma>
     */
    #[ORM\OneToMany(targetEntity: Idioma::class, mappedBy: 'aula')]
    private Collection $Aula;

    public function __construct()
    {
        $this->Aula = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): static
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getCapacidad(): ?int
    {
        return $this->capacidad;
    }

    public function setCapacidad(int $capacidad): static
    {
        $this->capacidad = $capacidad;

        return $this;
    }

    /**
     * @return Collection<int, Idioma>
     */
    public function getAula(): Collection
    {
        return $this->Aula;
    }

    public function addAula(Idioma $aula): static
    {
        if (!$this->Aula->contains($aula)) {
            $this->Aula->add($aula);
            $aula->setAula($this);
        }

        return $this;
    }

    public function removeAula(Idioma $aula): static
    {
        if ($this->Aula->removeElement($aula)) {
            // set the owning side to null (unless already changed)
            if ($aula->getAula() === $this) {
                $aula->setAula(null);
            }
        }

        return $this;
    }
}
