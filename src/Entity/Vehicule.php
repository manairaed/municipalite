<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: VehiculeRepository::class)]
class Vehicule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'vehicules')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorie $categorie = null;

    #[ORM\ManyToOne(inversedBy: 'vehicules')]
    private ?User $users = null;

    #[ORM\Column(length: 255)]
    #[Groups("vehicules")]
    /**
     * @Assert\NotBlank(message="Veuiller ajouter la marque S'il vous plait")
     *@Assert\Length(
     * min = 4,
     * max = 8,
     * minMessage="la marque doit etre superieure a 4",
     * maxMessage="la marque doit inférieure a 8"
     *   )
     
     */ 
    private ?string $marque = null;

    #[ORM\Column]
    #[Groups("vehicules")]
    private ?bool $disponible = null;

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function isDisponible(): ?bool
    {
        return $this->disponible;
    }

    public function setDisponible(bool $disponible): self
    {
        $this->disponible = $disponible;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getUsers(): ?User
    {
        return $this->users;
    }

    public function setUsers(?User $users): self
    {
        $this->users = $users;

        return $this;
    }
    public function __toString(): string
    {
        return $this->id; 
    }
    
}
