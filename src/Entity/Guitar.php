<?php

namespace App\Entity;

use App\Repository\GuitarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GuitarRepository::class)
 */
class Guitar
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $year;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $acquisitionAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $dominationHang;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbString;

    /**
     * @ORM\Column(type="boolean")
     */
    private $fixation;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=Aesthetic::class, inversedBy="guitars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $aesthetic;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="guitars")
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity=Brand::class, mappedBy="guitar")
     */
    private $brand;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="guitars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    public function __construct()
    {
        $this->category = new ArrayCollection();
        $this->brand = new ArrayCollection();
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

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(?int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getAcquisitionAt(): ?\DateTimeImmutable
    {
        return $this->acquisitionAt;
    }

    public function setAcquisitionAt(?\DateTimeImmutable $acquisitionAt): self
    {
        $this->acquisitionAt = $acquisitionAt;

        return $this;
    }

    public function getDominationHang(): ?bool
    {
        return $this->dominationHang;
    }

    public function setDominationHang(bool $dominationHang): self
    {
        $this->dominationHang = $dominationHang;

        return $this;
    }

    public function getNbString(): ?int
    {
        return $this->nbString;
    }

    public function setNbString(int $nbString): self
    {
        $this->nbString = $nbString;

        return $this;
    }

    public function getFixation(): ?bool
    {
        return $this->fixation;
    }

    public function setFixation(bool $fixation): self
    {
        $this->fixation = $fixation;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getAesthetic(): ?Aesthetic
    {
        return $this->aesthetic;
    }

    public function setAesthetic(?Aesthetic $aesthetic): self
    {
        $this->aesthetic = $aesthetic;

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->category->contains($category)) {
            $this->category[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        $this->category->removeElement($category);

        return $this;
    }

    /**
     * @return Collection<int, Brand>
     */
    public function getBrand(): Collection
    {
        return $this->brand;
    }

    public function addBrand(Brand $brand): self
    {
        if (!$this->brand->contains($brand)) {
            $this->brand[] = $brand;
            $brand->setGuitar($this);
        }

        return $this;
    }

    public function removeBrand(Brand $brand): self
    {
        if ($this->brand->removeElement($brand)) {
            // set the owning side to null (unless already changed)
            if ($brand->getGuitar() === $this) {
                $brand->setGuitar(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

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
}
