<?php

namespace App\Entity;

use App\Repository\BrandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BrandRepository::class)
 */
class Brand
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity=Guitar::class, mappedBy="brand")
     */
    private $guitars;

    public function __construct()
    {
        $this->guitars = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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
     * @return Collection<int, Guitar>
     */
    public function getGuitars(): Collection
    {
        return $this->guitars;
    }

    public function addGuitar(Guitar $guitar): self
    {
        if (!$this->guitars->contains($guitar)) {
            $this->guitars[] = $guitar;
            $guitar->setBrand($this);
        }

        return $this;
    }

    public function removeGuitar(Guitar $guitar): self
    {
        if ($this->guitars->removeElement($guitar)) {
            // set the owning side to null (unless already changed)
            if ($guitar->getBrand() === $this) {
                $guitar->setBrand(null);
            }
        }

        return $this;
    }
}
