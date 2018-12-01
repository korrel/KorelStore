<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TshirtRepository")
 */
class Tshirt
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Color", inversedBy="tshirts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $color;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Genre", inversedBy="tshirts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $genre;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Size", inversedBy="tshirts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Size;

    /**
     * @ORM\Column(type="float")
     */
    private $initialPrice;

    /**
     * @ORM\Column(type="float")
     */
    private $addPrice;

    /**
     * @ORM\Column(type="integer")
     */
    private $PriceInit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getColor(): ?Color
    {
        return $this->color;
    }

    public function setColor(?Color $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getGenre(): ?Genre
    {
        return $this->genre;
    }

    public function setGenre(?Genre $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getSize(): ?Size
    {
        return $this->Size;
    }

    public function setSize(?Size $Size): self
    {
        $this->Size = $Size;

        return $this;
    }

    public function getInitialPrice(): ?float
    {
        return $this->initialPrice;
    }

    public function setInitialPrice(float $initialPrice): self
    {
        $this->initialPrice = $initialPrice;

        return $this;
    }

    public function getAddPrice(): ?float
    {
        return $this->addPrice;
    }

    public function setAddPrice(float $addPrice): self
    {
        $this->addPrice = $addPrice;

        return $this;
    }

    public function getPriceInit(): ?int
    {
        return $this->PriceInit;
    }

    public function setPriceInit(int $PriceInit): self
    {
        $this->PriceInit = $PriceInit;

        return $this;
    }

}
