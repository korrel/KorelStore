<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MotifRepository")
 */
class Motif
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
    private $Name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $link;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Tshirt", mappedBy="motif")
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

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

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
            $tshirt->setMotif($this);
        }

        return $this;
    }

    public function removeTshirt(Tshirt $tshirt): self
    {
        if ($this->tshirts->contains($tshirt)) {
            $this->tshirts->removeElement($tshirt);
            // set the owning side to null (unless already changed)
            if ($tshirt->getMotif() === $this) {
                $tshirt->setMotif(null);
            }
        }

        return $this;
    }
}
