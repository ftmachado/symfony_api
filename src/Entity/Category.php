<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 * @ApiResource()
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Movie", mappedBy="category")
     */
    private $fkMovies;

    public function __construct()
    {
        $this->fkMovies = new ArrayCollection();
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

    /**
     * @return Collection|Movie[]
     */
    public function getFkMovies(): Collection
    {
        return $this->fkMovies;
    }

    public function addFkMovie(Movie $fkMovie): self
    {
        if (!$this->fkMovies->contains($fkMovie)) {
            $this->fkMovies[] = $fkMovie;
            $fkMovie->setCategory($this);
        }

        return $this;
    }

    public function removeFkMovie(Movie $fkMovie): self
    {
        if ($this->fkMovies->contains($fkMovie)) {
            $this->fkMovies->removeElement($fkMovie);
            // set the owning side to null (unless already changed)
            if ($fkMovie->getCategory() === $this) {
                $fkMovie->setCategory(null);
            }
        }

        return $this;
    }
}
