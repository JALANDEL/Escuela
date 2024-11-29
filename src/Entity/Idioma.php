<?php

namespace App\Entity;

use App\Repository\IdiomaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IdiomaRepository::class)]
class Idioma
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 15)]
    private ?string $nombre = null;

    #[ORM\Column(length: 1)]
    private ?string $nivel = null;

    #[ORM\Column]
    private ?int $subnivel = null;

    #[ORM\ManyToOne(inversedBy: 'Aula')]
    #[ORM\JoinColumn(nullable: false)]
    private ?aula $aula = null;

    /**
     * @var Collection<int, Alumno>
     */
    #[ORM\OneToMany(targetEntity: Alumno::class, mappedBy: 'Idioma')]
    private Collection $alumnos;

    public function __construct()
    {
        $this->alumnos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getNivel(): ?string
    {
        return $this->nivel;
    }

    public function setNivel(string $nivel): static
    {
        $this->nivel = $nivel;

        return $this;
    }

    public function getSubnivel(): ?int
    {
        return $this->subnivel;
    }

    public function setSubnivel(int $subnivel): static
    {
        $this->subnivel = $subnivel;

        return $this;
    }

    public function getAula(): ?aula
    {
        return $this->aula;
    }

    public function setAula(?aula $aula): static
    {
        $this->aula = $aula;

        return $this;
    }

    /**
     * @return Collection<int, Alumno>
     */
    public function getAlumnos(): Collection
    {
        return $this->alumnos;
    }

    public function addAlumno(Alumno $alumno): static
    {
        if (!$this->alumnos->contains($alumno)) {
            $this->alumnos->add($alumno);
            $alumno->setIdioma($this);
        }

        return $this;
    }

    public function removeAlumno(Alumno $alumno): static
    {
        if ($this->alumnos->removeElement($alumno)) {
            // set the owning side to null (unless already changed)
            if ($alumno->getIdioma() === $this) {
                $alumno->setIdioma(null);
            }
        }

        return $this;
    }
}
