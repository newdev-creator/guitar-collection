<?php

namespace App\Entity;

use App\Repository\AestheticRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AestheticRepository::class)
 */
class Aesthetic
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
    private $wear;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $finition;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pickups;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $neckMaterial;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bodyMaterial;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $form;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity=Guitar::class, mappedBy="Aesthetic")
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

    public function getWear(): ?string
    {
        return $this->wear;
    }

    public function setWear(string $wear): self
    {
        $this->wear = $wear;

        return $this;
    }

    public function getFinition(): ?string
    {
        return $this->finition;
    }

    public function setFinition(string $finition): self
    {
        $this->finition = $finition;

        return $this;
    }

    public function getPickups(): ?string
    {
        return $this->pickups;
    }

    public function setPickups(string $pickups): self
    {
        $this->pickups = $pickups;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getNeckMaterial(): ?string
    {
        return $this->neckMaterial;
    }

    public function setNeckMaterial(string $neckMaterial): self
    {
        $this->neckMaterial = $neckMaterial;

        return $this;
    }

    public function getBodyMaterial(): ?string
    {
        return $this->bodyMaterial;
    }

    public function setBodyMaterial(string $bodyMaterial): self
    {
        $this->bodyMaterial = $bodyMaterial;

        return $this;
    }

    public function getForm(): ?string
    {
        return $this->form;
    }

    public function setForm(string $form): self
    {
        $this->form = $form;

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
            $guitar->setAesthetic($this);
        }

        return $this;
    }

    public function removeGuitar(Guitar $guitar): self
    {
        if ($this->guitars->removeElement($guitar)) {
            // set the owning side to null (unless already changed)
            if ($guitar->getAesthetic() === $this) {
                $guitar->setAesthetic(null);
            }
        }

        return $this;
    }
}
