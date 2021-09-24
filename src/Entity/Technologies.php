<?php

namespace App\Entity;

use App\Repository\TechnologiesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TechnologiesRepository::class)
 */
class Technologies
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity=Experiences::class, mappedBy="technologies")
     */
    private $experiences;

    public function __construct()
    {
        $this->experiences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|Experiences[]
     */
    public function getExperiences(): Collection
    {
        return $this->experiences;
    }

    public function addExperience(Experiences $experience): self
    {
        if (!$this->experiences->contains($experience)) {
            $this->experiences[] = $experience;
            $experience->addTechnology($this);
        }

        return $this;
    }

    public function removeExperience(Experiences $experience): self
    {
        if ($this->experiences->removeElement($experience)) {
            $experience->removeTechnology($this);
        }

        return $this;
    }
}
