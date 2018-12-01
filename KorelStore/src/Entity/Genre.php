<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GenreRepository")
 */
class Genre
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $genre;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Tshirt", mappedBy="genre")
     */
    private $tshirts;

    public function __construct()
    {
        $this->tshirts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection|Tshirt[]
     */
    public function getTshirts(): Collection
    {
        return $this->tshirts;
    }

    public function addTshirt(Tshirt $tshirt): self
    {
        if (!$this->tshirts->contains($tshirt)) {
            $this->tshirts[] = $tshirt;
            $tshirt->setGenre($this);
        }

        return $this;
    }

    public function removeTshirt(Tshirt $tshirt): self
    {
        if ($this->tshirts->contains($tshirt)) {
            $this->tshirts->removeElement($tshirt);
            // set the owning side to null (unless already changed)
            if ($tshirt->getGenre() === $this) {
                $tshirt->setGenre(null);
            }
        }

        return $this;
    }
}
