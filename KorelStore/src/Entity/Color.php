<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ColorRepository")
 */
class Color
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
    private $color;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Tshirt", mappedBy="color")
     */
    private $tshirts;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $link;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $link_woman;

    public function __construct()
    {
        $this->tshirts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

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
            $tshirt->setColor($this);
        }

        return $this;
    }

    public function removeTshirt(Tshirt $tshirt): self
    {
        if ($this->tshirts->contains($tshirt)) {
            $this->tshirts->removeElement($tshirt);
            // set the owning side to null (unless already changed)
            if ($tshirt->getColor() === $this) {
                $tshirt->setColor(null);
            }
        }

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

    public function getLinkWoman(): ?string
    {
        return $this->link_woman;
    }

    public function setLinkWoman(string $link_woman): self
    {
        $this->link_woman = $link_woman;

        return $this;
    }
}
