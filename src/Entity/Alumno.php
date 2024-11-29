<?php

namespace App\Entity;

use App\Repository\AlumnoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlumnoRepository::class)]
class Alumno
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $Nombre = null;

    #[ORM\Column(length: 20)]
    private ?string $Apellido = null;

    #[ORM\Column(length: 9)]
    private ?string $DId = null;

    #[ORM\ManyToOne(inversedBy: 'alumnos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Idioma $Idioma = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->Nombre;
    }

    public function setNombre(string $Nombre): static
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    public function getApellido(): ?string
    {
        return $this->Apellido;
    }

    public function setApellido(string $Apellido): static
    {
        $this->Apellido = $Apellido;

        return $this;
    }

    public function getDId(): ?string
    {
        return $this->DId;
    }

    public function setDId(string $DId): static
    {
        $this->DId = $DId;

        return $this;
    }

    public function getIdioma(): ?Idioma
    {
        return $this->Idioma;
    }

    public function setIdioma(?Idioma $Idioma): static
    {
        $this->Idioma = $Idioma;

        return $this;
    }
}
